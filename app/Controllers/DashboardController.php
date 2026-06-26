<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;

final class DashboardController extends Controller
{
    public function index(Request $request): string
    {
        $user = auth();

        return $this->view('dashboard.index', [
            'title' => 'Dashboard',
            'user'  => $user,
        ]);
    }
}
