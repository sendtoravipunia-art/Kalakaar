<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Services\ArtistDirectoryService;

final class SearchController extends Controller
{
    public function __construct(
        private readonly ArtistDirectoryService $artists = new ArtistDirectoryService(),
    ) {
    }

    public function index(Request $request): string
    {
        $filters = [
            'field' => (string) $request->input('field', ''),
            'q'     => (string) $request->input('q', ''),
            'city'  => (string) $request->input('city', ''),
        ];

        return $this->view('search.index', [
            'title'      => 'Find Talent',
            'filters'    => $filters,
            'results'    => $this->artists->search($filters),
            'categories' => $this->artists->categories(),
        ]);
    }
}
