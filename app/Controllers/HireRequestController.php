<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Session;
use App\Requests\HireRequestRequest;
use App\Services\HireRequestService;

final class HireRequestController extends Controller
{
    public function __construct(
        private readonly HireRequestService $service = new HireRequestService(),
    ) {
    }

    public function index(Request $request): string
    {
        return $this->view('hire_requests.index', [
            'title' => 'Hire Requests',
            'items' => $this->service->all(),
        ]);
    }

    public function show(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Hire Request not found');
        }
        return $this->view('hire_requests.show', ['title' => 'Hire Request', 'item' => $item]);
    }

    public function create(Request $request): string
    {
        return $this->view('hire_requests.create', ['title' => 'New Hire Request']);
    }

    public function store(Request $request): string
    {
        $data = $request->only(['producer_id', 'artist_id', 'title', 'message', 'budget', 'status']);
        $validator = HireRequestRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/hire-requests/create');
        }
        $this->service->create($data);
        Session::flash('_success', 'Hire Request created.');
        return $this->redirect('/hire-requests');
    }

    public function edit(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Hire Request not found');
        }
        return $this->view('hire_requests.edit', ['title' => 'Edit Hire Request', 'item' => $item]);
    }

    public function update(Request $request, string $id): string
    {
        $data = $request->only(['producer_id', 'artist_id', 'title', 'message', 'budget', 'status']);
        $validator = HireRequestRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/hire-requests/' . $id . '/edit');
        }
        $this->service->update((int) $id, $data);
        Session::flash('_success', 'Hire Request updated.');
        return $this->redirect('/hire-requests');
    }

    public function destroy(Request $request, string $id): string
    {
        $this->service->delete((int) $id);
        Session::flash('_success', 'Hire Request deleted.');
        return $this->redirect('/hire-requests');
    }
}
