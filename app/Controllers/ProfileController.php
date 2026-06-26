<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;
use App\Core\Request;
use App\Core\Session;
use App\Models\User;
use App\Repositories\ArtistProfileRepository;
use App\Repositories\ProducerProfileRepository;

/**
 * "My Profile" — lets the signed-in user edit their own artist or producer
 * profile. Creates the row on first save, updates it afterwards.
 */
final class ProfileController extends Controller
{
    public function __construct(
        private readonly ArtistProfileRepository $artists = new ArtistProfileRepository(),
        private readonly ProducerProfileRepository $producers = new ProducerProfileRepository(),
    ) {
    }

    public function edit(Request $request): string
    {
        $user = auth();
        $isArtist = ($user['role'] ?? '') === User::ROLE_ARTIST;

        return $this->view('profile.edit', [
            'title'      => 'My Profile',
            'role'       => $user['role'] ?? '',
            'profile'    => $isArtist
                ? $this->artists->findBy('user_id', (int) $user['id'])
                : $this->producers->findBy('user_id', (int) $user['id']),
            'categories' => $isArtist ? Database::select('SELECT * FROM categories ORDER BY name') : [],
        ]);
    }

    public function update(Request $request): string
    {
        $user = auth();
        $userId = (int) $user['id'];

        if (($user['role'] ?? '') === User::ROLE_ARTIST) {
            $errors = [];
            if (trim((string) $request->input('headline', '')) === '') {
                $errors['headline'][] = 'Headline is required.';
            }
            if ((string) $request->input('category_id', '') === '') {
                $errors['category_id'][] = 'Please pick a field.';
            }
            if ($errors !== []) {
                $this->withErrors($errors, $request->all());
                return $this->redirect('/profile/edit');
            }

            $data = [
                'category_id'      => (int) $request->input('category_id'),
                'headline'         => (string) $request->input('headline'),
                'bio'              => (string) $request->input('bio', ''),
                'city'             => (string) $request->input('city', ''),
                'hourly_rate'      => $this->nullableNumber($request->input('hourly_rate')),
                'experience_years' => $this->nullableNumber($request->input('experience_years')),
                'available'        => $request->input('available') ? 1 : 0,
            ];
            $this->upsert($this->artists, $userId, $data);
        } else {
            if (trim((string) $request->input('company', '')) === '') {
                $this->withErrors(['company' => ['Company name is required.']], $request->all());
                return $this->redirect('/profile/edit');
            }

            $data = [
                'company' => (string) $request->input('company'),
                'bio'     => (string) $request->input('bio', ''),
                'city'    => (string) $request->input('city', ''),
                'website' => (string) $request->input('website', ''),
            ];
            $this->upsert($this->producers, $userId, $data);
        }

        Session::flash('_success', 'Profile saved.');
        return $this->redirect('/dashboard');
    }

    private function upsert(object $repository, int $userId, array $data): void
    {
        $existing = $repository->findBy('user_id', $userId);
        if ($existing !== null) {
            $repository->update((int) $existing->id, $data);
        } else {
            $data['user_id'] = $userId;
            $repository->create($data);
        }
    }

    private function nullableNumber(mixed $value): ?string
    {
        return ($value === null || $value === '') ? null : (string) $value;
    }
}
