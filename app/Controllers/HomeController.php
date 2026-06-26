<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;
use App\Core\Request;
use Throwable;

final class HomeController extends Controller
{
    public function index(Request $request): string
    {
        return $this->view('home', [
            'title'    => 'Kalakaar — Hire talented artists across every field',
            'stats'    => $this->stats(),
            'fields'   => $this->fields(),
            'features' => $this->features(),
        ]);
    }

    public function about(Request $request): string
    {
        return $this->view('about', [
            'title'    => 'About Kalakaar',
            'features' => $this->features(),
        ]);
    }

    /**
     * Live platform numbers. Falls back to sensible defaults so the landing
     * page never breaks if the database is unavailable.
     *
     * @return array<string, int>
     */
    private function stats(): array
    {
        try {
            return [
                'artists'    => (int) (Database::selectOne('SELECT COUNT(*) c FROM artist_profiles')['c'] ?? 0),
                'producers'  => (int) (Database::selectOne('SELECT COUNT(*) c FROM producer_profiles')['c'] ?? 0),
                'categories' => (int) (Database::selectOne('SELECT COUNT(*) c FROM categories')['c'] ?? 0),
                'hires'      => (int) (Database::selectOne('SELECT COUNT(*) c FROM hire_requests')['c'] ?? 0),
            ];
        } catch (Throwable) {
            return ['artists' => 0, 'producers' => 0, 'categories' => 0, 'hires' => 0];
        }
    }

    /** @return array<int, array<string, mixed>> */
    private function fields(): array
    {
        try {
            return Database::select('SELECT name FROM categories ORDER BY name');
        } catch (Throwable) {
            return array_map(
                static fn (string $n) => ['name' => $n],
                ['Music', 'Dance', 'Acting', 'Photography', 'Painting', 'Writing', 'Film', 'Design'],
            );
        }
    }

    /**
     * Professional description of every core feature, shown on the landing
     * and about pages.
     *
     * @return array<int, array{icon:string, title:string, desc:string}>
     */
    private function features(): array
    {
        return [
            ['icon' => 'user', 'title' => 'Artist profiles',
             'desc' => 'Artists list a headline, field, bio, city, hourly rate, years of experience and current availability, so producers can judge fit quickly.'],
            ['icon' => 'search', 'title' => 'Search and discovery',
             'desc' => 'Producers filter talent by field, keyword and city to build a shortlist, instead of scrolling through long feeds.'],
            ['icon' => 'briefcase', 'title' => 'Hiring requests',
             'desc' => 'Send a hire request with a project title, brief and budget. The artist is notified and can accept, decline or reply.'],
            ['icon' => 'image', 'title' => 'Portfolios',
             'desc' => 'Artists attach work samples (audio, video, images or links) so producers can review real output before hiring.'],
            ['icon' => 'star', 'title' => 'Ratings and reviews',
             'desc' => 'After a project, producers leave a star rating and feedback, which builds an artist\'s reputation over time.'],
            ['icon' => 'message', 'title' => 'Messaging',
             'desc' => 'Producers and artists talk in a single thread, so briefs, timelines and details stay in one place.'],
            ['icon' => 'grid', 'title' => 'Role-based dashboards',
             'desc' => 'Artists and producers each get their own dashboard for managing a profile or managing hires.'],
            ['icon' => 'bell', 'title' => 'Notifications',
             'desc' => 'Hire requests, new reviews and messages show up as notifications so nothing gets missed.'],
        ];
    }
}
