<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

/**
 * @property int    $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role      one of: artist, producer
 * @property string $created_at
 */
final class User extends Model
{
    public const ROLE_ARTIST   = 'artist';
    public const ROLE_PRODUCER = 'producer';

    protected string $table = 'users';

    protected array $fillable = ['name', 'email', 'password', 'role'];

    public function isArtist(): bool
    {
        return $this->role === self::ROLE_ARTIST;
    }

    public function isProducer(): bool
    {
        return $this->role === self::ROLE_PRODUCER;
    }

    public function initials(): string
    {
        $parts = preg_split('/\s+/', trim((string) $this->name)) ?: [];
        $letters = array_map(static fn ($p) => mb_substr($p, 0, 1), array_slice($parts, 0, 2));
        return mb_strtoupper(implode('', $letters)) ?: '?';
    }
}
