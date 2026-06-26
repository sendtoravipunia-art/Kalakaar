<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Services\ArtistDirectoryService;

final class ArtistController extends Controller
{
    public function __construct(
        private readonly ArtistDirectoryService $artists = new ArtistDirectoryService(),
    ) {
    }

    public function index(Request $request): string
    {
        return $this->view('artists.index', [
            'title'   => 'Browse Artists',
            'artists' => $this->artists->all(),
        ]);
    }

    public function show(Request $request, string $id): string
    {
        $artist = $this->artists->find((int) $id);

        if ($artist === null) {
            return $this->abort(404, 'Artist not found');
        }

        return $this->view('artists.show', [
            'title'     => (string) ($artist['artist_name'] ?? 'Artist'),
            'artist'    => $artist,
            'portfolio' => $this->artists->portfolio((int) $id),
            'reviews'   => $this->artists->reviews((int) $id),
        ]);
    }
}
