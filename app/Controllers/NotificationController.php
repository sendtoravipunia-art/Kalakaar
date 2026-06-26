<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Session;
use App\Requests\NotificationRequest;
use App\Services\NotificationService;

final class NotificationController extends Controller
{
    public function __construct(
        private readonly NotificationService $service = new NotificationService(),
    ) {
    }

    public function index(Request $request): string
    {
        return $this->view('notifications.index', [
            'title' => 'Notifications',
            'items' => $this->service->all(),
        ]);
    }

    public function show(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Notification not found');
        }
        return $this->view('notifications.show', ['title' => 'Notification', 'item' => $item]);
    }

    public function create(Request $request): string
    {
        return $this->view('notifications.create', ['title' => 'New Notification']);
    }

    public function store(Request $request): string
    {
        $data = $request->only(['user_id', 'type', 'message']);
        $validator = NotificationRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/notifications/create');
        }
        $this->service->create($data);
        Session::flash('_success', 'Notification created.');
        return $this->redirect('/notifications');
    }

    public function edit(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Notification not found');
        }
        return $this->view('notifications.edit', ['title' => 'Edit Notification', 'item' => $item]);
    }

    public function update(Request $request, string $id): string
    {
        $data = $request->only(['user_id', 'type', 'message']);
        $validator = NotificationRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/notifications/' . $id . '/edit');
        }
        $this->service->update((int) $id, $data);
        Session::flash('_success', 'Notification updated.');
        return $this->redirect('/notifications');
    }

    public function destroy(Request $request, string $id): string
    {
        $this->service->delete((int) $id);
        Session::flash('_success', 'Notification deleted.');
        return $this->redirect('/notifications');
    }
}
