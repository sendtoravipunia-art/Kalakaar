<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Session;
use App\Requests\ArtistProfileRequest;
use App\Services\ArtistProfileService;

final class ArtistProfileController extends Controller
{
    public function __construct(
        private readonly ArtistProfileService $service = new ArtistProfileService(),
    ) {
    }

    public function index(Request $request): string
    {
        return $this->view('artist_profiles.index', [
            'title' => 'Artist Profiles',
            'items' => $this->service->all(),
        ]);
    }

    public function show(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Artist Profile not found');
        }
        return $this->view('artist_profiles.show', ['title' => 'Artist Profile', 'item' => $item]);
    }

    public function create(Request $request): string
    {
        return $this->view('artist_profiles.create', ['title' => 'New Artist Profile']);
    }

    public function store(Request $request): string
    {
        $data = $request->only(['user_id', 'category_id', 'headline', 'bio', 'city', 'hourly_rate', 'experience_years', 'available']);
        $validator = ArtistProfileRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/artist-profiles/create');
        }
        $this->service->create($data);
        Session::flash('_success', 'Artist Profile created.');
        return $this->redirect('/artist-profiles');
    }

    public function edit(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Artist Profile not found');
        }
        return $this->view('artist_profiles.edit', ['title' => 'Edit Artist Profile', 'item' => $item]);
    }

    public function update(Request $request, string $id): string
    {
        $data = $request->only(['user_id', 'category_id', 'headline', 'bio', 'city', 'hourly_rate', 'experience_years', 'available']);
        $validator = ArtistProfileRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/artist-profiles/' . $id . '/edit');
        }
        $this->service->update((int) $id, $data);
        Session::flash('_success', 'Artist Profile updated.');
        return $this->redirect('/artist-profiles');
    }

    public function destroy(Request $request, string $id): string
    {
        $this->service->delete((int) $id);
        Session::flash('_success', 'Artist Profile deleted.');
        return $this->redirect('/artist-profiles');
    }
}
