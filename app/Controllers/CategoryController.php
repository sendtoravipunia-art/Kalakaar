<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Session;
use App\Requests\CategoryRequest;
use App\Services\CategoryService;

final class CategoryController extends Controller
{
    public function __construct(
        private readonly CategoryService $service = new CategoryService(),
    ) {
    }

    public function index(Request $request): string
    {
        return $this->view('categories.index', [
            'title' => 'Categories',
            'items' => $this->service->all(),
        ]);
    }

    public function show(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Category not found');
        }
        return $this->view('categories.show', ['title' => 'Category', 'item' => $item]);
    }

    public function create(Request $request): string
    {
        return $this->view('categories.create', ['title' => 'New Category']);
    }

    public function store(Request $request): string
    {
        $data = $request->only(['name', 'slug', 'icon']);
        $validator = CategoryRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/categories/create');
        }
        $this->service->create($data);
        Session::flash('_success', 'Category created.');
        return $this->redirect('/categories');
    }

    public function edit(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Category not found');
        }
        return $this->view('categories.edit', ['title' => 'Edit Category', 'item' => $item]);
    }

    public function update(Request $request, string $id): string
    {
        $data = $request->only(['name', 'slug', 'icon']);
        $validator = CategoryRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/categories/' . $id . '/edit');
        }
        $this->service->update((int) $id, $data);
        Session::flash('_success', 'Category updated.');
        return $this->redirect('/categories');
    }

    public function destroy(Request $request, string $id): string
    {
        $this->service->delete((int) $id);
        Session::flash('_success', 'Category deleted.');
        return $this->redirect('/categories');
    }
}
