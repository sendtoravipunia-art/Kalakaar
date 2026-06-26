<?php

declare(strict_types=1);

namespace App\Services;

use App\Core\Database;

/**
 * Read-side queries for browsing and searching artists. Joins artist_profiles
 * with their user and category so views get a flat, display-ready row.
 */
final class ArtistDirectoryService
{
    private const BASE = '
        SELECT ap.*, u.name AS artist_name, u.email AS artist_email, c.name AS category_name
        FROM artist_profiles ap
        JOIN users u ON u.id = ap.user_id
        LEFT JOIN categories c ON c.id = ap.category_id
    ';

    /** @return array<int, array<string, mixed>> */
    public function all(): array
    {
        return Database::select(self::BASE . ' ORDER BY ap.available DESC, ap.id DESC');
    }

    /** @return array<string, mixed>|null */
    public function find(int $id): ?array
    {
        return Database::selectOne(self::BASE . ' WHERE ap.id = ? LIMIT 1', [$id]);
    }

    /**
     * @param array{field?:string, q?:string, city?:string} $filters
     * @return array<int, array<string, mixed>>
     */
    public function search(array $filters): array
    {
        $sql = self::BASE . ' WHERE 1 = 1';
        $bindings = [];

        if (!empty($filters['field'])) {
            $sql .= ' AND c.name = ?';
            $bindings[] = $filters['field'];
        }
        if (!empty($filters['city'])) {
            $sql .= ' AND ap.city LIKE ?';
            $bindings[] = '%' . $filters['city'] . '%';
        }
        if (!empty($filters['q'])) {
            $sql .= ' AND (ap.headline LIKE ? OR ap.bio LIKE ?)';
            $bindings[] = '%' . $filters['q'] . '%';
            $bindings[] = '%' . $filters['q'] . '%';
        }

        $sql .= ' ORDER BY ap.available DESC, ap.id DESC';

        return Database::select($sql, $bindings);
    }

    /** @return array<int, array<string, mixed>> */
    public function categories(): array
    {
        return Database::select('SELECT * FROM categories ORDER BY name');
    }

    /** @return array<int, array<string, mixed>> */
    public function portfolio(int $artistId): array
    {
        return Database::select('SELECT * FROM portfolio_items WHERE artist_id = ? ORDER BY id DESC', [$artistId]);
    }

    /** @return array<int, array<string, mixed>> */
    public function reviews(int $artistId): array
    {
        return Database::select(
            'SELECT r.*, u.name AS producer_name
             FROM reviews r
             LEFT JOIN users u ON u.id = r.producer_id
             WHERE r.artist_id = ?
             ORDER BY r.id DESC',
            [$artistId],
        );
    }
}
