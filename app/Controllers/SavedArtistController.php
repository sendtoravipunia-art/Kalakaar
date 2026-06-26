<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Session;
use App\Requests\SavedArtistRequest;
use App\Services\SavedArtistService;

final class SavedArtistController extends Controller
{
    public function __construct(
        private readonly SavedArtistService $service = new SavedArtistService(),
    ) {
    }

    public function index(Request $request): string
    {
        return $this->view('saved_artists.index', [
            'title' => 'Saved Artists',
            'items' => $this->service->all(),
        ]);
    }

    public function show(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Saved Artist not found');
        }
        return $this->view('saved_artists.show', ['title' => 'Saved Artist', 'item' => $item]);
    }

    public function create(Request $request): string
    {
        return $this->view('saved_artists.create', ['title' => 'New Saved Artist']);
    }

    public function store(Request $request): string
    {
        $data = $request->only(['producer_id', 'artist_id']);
        $validator = SavedArtistRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/saved-artists/create');
        }
        $this->service->create($data);
        Session::flash('_success', 'Saved Artist created.');
        return $this->redirect('/saved-artists');
    }

    public function edit(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Saved Artist not found');
        }
        return $this->view('saved_artists.edit', ['title' => 'Edit Saved Artist', 'item' => $item]);
    }

    public function update(Request $request, string $id): string
    {
        $data = $request->only(['producer_id', 'artist_id']);
        $validator = SavedArtistRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/saved-artists/' . $id . '/edit');
        }
        $this->service->update((int) $id, $data);
        Session::flash('_success', 'Saved Artist updated.');
        return $this->redirect('/saved-artists');
    }

    public function destroy(Request $request, string $id): string
    {
        $this->service->delete((int) $id);
        Session::flash('_success', 'Saved Artist deleted.');
        return $this->redirect('/saved-artists');
    }
}
