<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Session;
use App\Requests\ReviewRequest;
use App\Services\ReviewService;

final class ReviewController extends Controller
{
    public function __construct(
        private readonly ReviewService $service = new ReviewService(),
    ) {
    }

    public function index(Request $request): string
    {
        return $this->view('reviews.index', [
            'title' => 'Reviews',
            'items' => $this->service->all(),
        ]);
    }

    public function show(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Review not found');
        }
        return $this->view('reviews.show', ['title' => 'Review', 'item' => $item]);
    }

    public function create(Request $request): string
    {
        return $this->view('reviews.create', ['title' => 'New Review']);
    }

    public function store(Request $request): string
    {
        $data = $request->only(['artist_id', 'producer_id', 'rating', 'comment']);
        $validator = ReviewRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/reviews/create');
        }
        $this->service->create($data);
        Session::flash('_success', 'Review created.');
        return $this->redirect('/reviews');
    }

    public function edit(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Review not found');
        }
        return $this->view('reviews.edit', ['title' => 'Edit Review', 'item' => $item]);
    }

    public function update(Request $request, string $id): string
    {
        $data = $request->only(['artist_id', 'producer_id', 'rating', 'comment']);
        $validator = ReviewRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/reviews/' . $id . '/edit');
        }
        $this->service->update((int) $id, $data);
        Session::flash('_success', 'Review updated.');
        return $this->redirect('/reviews');
    }

    public function destroy(Request $request, string $id): string
    {
        $this->service->delete((int) $id);
        Session::flash('_success', 'Review deleted.');
        return $this->redirect('/reviews');
    }
}
