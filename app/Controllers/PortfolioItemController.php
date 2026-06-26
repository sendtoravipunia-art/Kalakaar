<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Session;
use App\Requests\PortfolioItemRequest;
use App\Services\PortfolioItemService;

final class PortfolioItemController extends Controller
{
    public function __construct(
        private readonly PortfolioItemService $service = new PortfolioItemService(),
    ) {
    }

    public function index(Request $request): string
    {
        return $this->view('portfolio_items.index', [
            'title' => 'Portfolio',
            'items' => $this->service->all(),
        ]);
    }

    public function show(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Portfolio Item not found');
        }
        return $this->view('portfolio_items.show', ['title' => 'Portfolio Item', 'item' => $item]);
    }

    public function create(Request $request): string
    {
        return $this->view('portfolio_items.create', ['title' => 'New Portfolio Item']);
    }

    public function store(Request $request): string
    {
        $data = $request->only(['artist_id', 'title', 'media_type', 'url', 'description']);
        $validator = PortfolioItemRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/portfolio/create');
        }
        $this->service->create($data);
        Session::flash('_success', 'Portfolio Item created.');
        return $this->redirect('/portfolio');
    }

    public function edit(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Portfolio Item not found');
        }
        return $this->view('portfolio_items.edit', ['title' => 'Edit Portfolio Item', 'item' => $item]);
    }

    public function update(Request $request, string $id): string
    {
        $data = $request->only(['artist_id', 'title', 'media_type', 'url', 'description']);
        $validator = PortfolioItemRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/portfolio/' . $id . '/edit');
        }
        $this->service->update((int) $id, $data);
        Session::flash('_success', 'Portfolio Item updated.');
        return $this->redirect('/portfolio');
    }

    public function destroy(Request $request, string $id): string
    {
        $this->service->delete((int) $id);
        Session::flash('_success', 'Portfolio Item deleted.');
        return $this->redirect('/portfolio');
    }
}
