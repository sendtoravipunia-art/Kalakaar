<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;

final class HomeController extends Controller
{
    public function index(Request $request): string
    {
        $fields = [
            'Music', 'Dance', 'Acting', 'Photography', 'Painting',
            'Writing', 'Film', 'Design', 'Comedy', 'Voice-over',
        ];

        return $this->view('home', [
            'title'  => 'Kalakaar — Where talent meets opportunity',
            'fields' => $fields,
        ]);
    }

    public function about(Request $request): string
    {
        return $this->view('about', ['title' => 'About Kalakaar']);
    }
}
