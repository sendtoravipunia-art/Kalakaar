<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Session;
use App\Requests\ConversationRequest;
use App\Services\ConversationService;

final class ConversationController extends Controller
{
    public function __construct(
        private readonly ConversationService $service = new ConversationService(),
    ) {
    }

    public function index(Request $request): string
    {
        return $this->view('conversations.index', [
            'title' => 'Conversations',
            'items' => $this->service->all(),
        ]);
    }

    public function show(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Conversation not found');
        }
        return $this->view('conversations.show', ['title' => 'Conversation', 'item' => $item]);
    }

    public function create(Request $request): string
    {
        return $this->view('conversations.create', ['title' => 'New Conversation']);
    }

    public function store(Request $request): string
    {
        $data = $request->only(['producer_id', 'artist_id', 'subject']);
        $validator = ConversationRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/conversations/create');
        }
        $this->service->create($data);
        Session::flash('_success', 'Conversation created.');
        return $this->redirect('/conversations');
    }

    public function edit(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Conversation not found');
        }
        return $this->view('conversations.edit', ['title' => 'Edit Conversation', 'item' => $item]);
    }

    public function update(Request $request, string $id): string
    {
        $data = $request->only(['producer_id', 'artist_id', 'subject']);
        $validator = ConversationRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/conversations/' . $id . '/edit');
        }
        $this->service->update((int) $id, $data);
        Session::flash('_success', 'Conversation updated.');
        return $this->redirect('/conversations');
    }

    public function destroy(Request $request, string $id): string
    {
        $this->service->delete((int) $id);
        Session::flash('_success', 'Conversation deleted.');
        return $this->redirect('/conversations');
    }
}
