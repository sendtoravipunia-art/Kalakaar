<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Session;
use App\Requests\MessageRequest;
use App\Services\MessageService;

final class MessageController extends Controller
{
    public function __construct(
        private readonly MessageService $service = new MessageService(),
    ) {
    }

    public function index(Request $request): string
    {
        return $this->view('messages.index', [
            'title' => 'Messages',
            'items' => $this->service->all(),
        ]);
    }

    public function show(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Message not found');
        }
        return $this->view('messages.show', ['title' => 'Message', 'item' => $item]);
    }

    public function create(Request $request): string
    {
        return $this->view('messages.create', ['title' => 'New Message']);
    }

    public function store(Request $request): string
    {
        $data = $request->only(['conversation_id', 'sender_id', 'body']);
        $validator = MessageRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/messages/create');
        }
        $this->service->create($data);
        Session::flash('_success', 'Message created.');
        return $this->redirect('/messages');
    }

    public function edit(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Message not found');
        }
        return $this->view('messages.edit', ['title' => 'Edit Message', 'item' => $item]);
    }

    public function update(Request $request, string $id): string
    {
        $data = $request->only(['conversation_id', 'sender_id', 'body']);
        $validator = MessageRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/messages/' . $id . '/edit');
        }
        $this->service->update((int) $id, $data);
        Session::flash('_success', 'Message updated.');
        return $this->redirect('/messages');
    }

    public function destroy(Request $request, string $id): string
    {
        $this->service->delete((int) $id);
        Session::flash('_success', 'Message deleted.');
        return $this->redirect('/messages');
    }
}
