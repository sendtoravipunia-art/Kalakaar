<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Session;
use App\Models\User;
use App\Services\HireRequestService;
use App\Services\NotificationService;

final class HireController extends Controller
{
    public function __construct(
        private readonly HireRequestService $hires = new HireRequestService(),
        private readonly NotificationService $notifications = new NotificationService(),
    ) {
    }

    public function store(Request $request, string $id): string
    {
        $user = auth();

        if ($user === null || ($user['role'] ?? null) !== User::ROLE_PRODUCER) {
            Session::flash('_errors', ['role' => ['Only producers can hire artists.']]);
            return $this->redirect('/artists/' . $id);
        }

        $title = trim((string) $request->input('title', ''));
        if ($title === '') {
            Session::flash('_errors', ['title' => ['Please add a project title.']]);
            return $this->redirect('/artists/' . $id);
        }

        $this->hires->create([
            'producer_id' => (int) $user['id'],
            'artist_id'   => (int) $id,
            'title'       => $title,
            'message'     => (string) $request->input('message', ''),
            'budget'      => $request->input('budget') !== '' ? $request->input('budget') : null,
            'status'      => 'pending',
        ]);

        $this->notifications->create([
            'user_id' => (int) $id,
            'type'    => 'hire',
            'message' => $user['name'] . ' sent you a hire request: ' . $title,
        ]);

        Session::flash('_success', 'Hire request sent! The artist has been notified.');
        return $this->redirect('/artists/' . $id);
    }
}
