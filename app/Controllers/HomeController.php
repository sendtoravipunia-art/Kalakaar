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
            return Database::select('SELECT name, icon FROM categories ORDER BY name');
        } catch (Throwable) {
            return array_map(
                static fn (string $n) => ['name' => $n, 'icon' => '🎭'],
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
            ['icon' => '🎨', 'title' => 'Rich artist profiles',
             'desc' => 'Artists present themselves with a headline, field, bio, city, hourly rate, years of experience and live availability — everything a producer needs to judge fit at a glance.'],
            ['icon' => '🔍', 'title' => 'Smart search & discovery',
             'desc' => 'Producers filter talent by field, keyword and city to build a shortlist in seconds, instead of scrolling endless feeds.'],
            ['icon' => '🤝', 'title' => 'Structured hiring',
             'desc' => 'Send a hire request with a clear project title, brief and budget. The artist is notified instantly and can accept, decline or discuss.'],
            ['icon' => '🎬', 'title' => 'Portfolio showcase',
             'desc' => 'Each artist attaches real work — audio, video, images or links — so producers evaluate proven output, not just claims.'],
            ['icon' => '⭐', 'title' => 'Ratings & reviews',
             'desc' => 'After a project, producers leave a star rating and written feedback, building a transparent reputation that rewards great work.'],
            ['icon' => '💬', 'title' => 'Built-in messaging',
             'desc' => 'Producers and artists coordinate in a single conversation thread — briefs, timelines and details stay in one place.'],
            ['icon' => '📊', 'title' => 'Role-based dashboards',
             'desc' => 'Artists and producers each get a focused dashboard tailored to what they actually do — manage a profile, or manage hires.'],
            ['icon' => '🔔', 'title' => 'Instant notifications',
             'desc' => 'Hire requests, new reviews and messages surface immediately, so opportunities are never missed.'],
        ];
    }
}
