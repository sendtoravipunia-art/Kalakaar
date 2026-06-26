<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Session;
use App\Requests\ProducerProfileRequest;
use App\Services\ProducerProfileService;

final class ProducerProfileController extends Controller
{
    public function __construct(
        private readonly ProducerProfileService $service = new ProducerProfileService(),
    ) {
    }

    public function index(Request $request): string
    {
        return $this->view('producer_profiles.index', [
            'title' => 'Producer Profiles',
            'items' => $this->service->all(),
        ]);
    }

    public function show(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Producer Profile not found');
        }
        return $this->view('producer_profiles.show', ['title' => 'Producer Profile', 'item' => $item]);
    }

    public function create(Request $request): string
    {
        return $this->view('producer_profiles.create', ['title' => 'New Producer Profile']);
    }

    public function store(Request $request): string
    {
        $data = $request->only(['user_id', 'company', 'bio', 'city', 'website']);
        $validator = ProducerProfileRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/producer-profiles/create');
        }
        $this->service->create($data);
        Session::flash('_success', 'Producer Profile created.');
        return $this->redirect('/producer-profiles');
    }

    public function edit(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Producer Profile not found');
        }
        return $this->view('producer_profiles.edit', ['title' => 'Edit Producer Profile', 'item' => $item]);
    }

    public function update(Request $request, string $id): string
    {
        $data = $request->only(['user_id', 'company', 'bio', 'city', 'website']);
        $validator = ProducerProfileRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/producer-profiles/' . $id . '/edit');
        }
        $this->service->update((int) $id, $data);
        Session::flash('_success', 'Producer Profile updated.');
        return $this->redirect('/producer-profiles');
    }

    public function destroy(Request $request, string $id): string
    {
        $this->service->delete((int) $id);
        Session::flash('_success', 'Producer Profile deleted.');
        return $this->redirect('/producer-profiles');
    }
}
