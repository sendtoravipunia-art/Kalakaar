<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Session;
use App\Requests\SkillRequest;
use App\Services\SkillService;

final class SkillController extends Controller
{
    public function __construct(
        private readonly SkillService $service = new SkillService(),
    ) {
    }

    public function index(Request $request): string
    {
        return $this->view('skills.index', [
            'title' => 'Skills',
            'items' => $this->service->all(),
        ]);
    }

    public function show(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Skill not found');
        }
        return $this->view('skills.show', ['title' => 'Skill', 'item' => $item]);
    }

    public function create(Request $request): string
    {
        return $this->view('skills.create', ['title' => 'New Skill']);
    }

    public function store(Request $request): string
    {
        $data = $request->only(['name', 'category_id']);
        $validator = SkillRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/skills/create');
        }
        $this->service->create($data);
        Session::flash('_success', 'Skill created.');
        return $this->redirect('/skills');
    }

    public function edit(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Skill not found');
        }
        return $this->view('skills.edit', ['title' => 'Edit Skill', 'item' => $item]);
    }

    public function update(Request $request, string $id): string
    {
        $data = $request->only(['name', 'category_id']);
        $validator = SkillRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/skills/' . $id . '/edit');
        }
        $this->service->update((int) $id, $data);
        Session::flash('_success', 'Skill updated.');
        return $this->redirect('/skills');
    }

    public function destroy(Request $request, string $id): string
    {
        $this->service->delete((int) $id);
        Session::flash('_success', 'Skill deleted.');
        return $this->redirect('/skills');
    }
}
