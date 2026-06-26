<?php

declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;
use RuntimeException;

/**
 * Lazy PDO singleton plus a few query helpers used by repositories.
 */
final class Database
{
    private static ?PDO $pdo = null;

    public static function connection(): PDO
    {
        if (self::$pdo instanceof PDO) {
            return self::$pdo;
        }

        $config = Config::get('database');
        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=%s',
            $config['host'],
            $config['port'],
            $config['database'],
            $config['charset'],
        );

        try {
            self::$pdo = new PDO($dsn, $config['username'], $config['password'], [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            throw new RuntimeException('Database connection failed: ' . $e->getMessage(), (int) $e->getCode(), $e);
        }

        return self::$pdo;
    }

    /** @return array<int, array<string, mixed>> */
    public static function select(string $sql, array $bindings = []): array
    {
        $statement = self::connection()->prepare($sql);
        $statement->execute($bindings);
        return $statement->fetchAll();
    }

    /** @return array<string, mixed>|null */
    public static function selectOne(string $sql, array $bindings = []): ?array
    {
        $statement = self::connection()->prepare($sql);
        $statement->execute($bindings);
        $row = $statement->fetch();
        return $row === false ? null : $row;
    }

    public static function statement(string $sql, array $bindings = []): bool
    {
        return self::connection()->prepare($sql)->execute($bindings);
    }

    public static function insert(string $sql, array $bindings = []): int
    {
        self::statement($sql, $bindings);
        return (int) self::connection()->lastInsertId();
    }
}
