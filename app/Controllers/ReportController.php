<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Session;
use App\Requests\ReportRequest;
use App\Services\ReportService;

final class ReportController extends Controller
{
    public function __construct(
        private readonly ReportService $service = new ReportService(),
    ) {
    }

    public function index(Request $request): string
    {
        return $this->view('reports.index', [
            'title' => 'Reports',
            'items' => $this->service->all(),
        ]);
    }

    public function show(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Report not found');
        }
        return $this->view('reports.show', ['title' => 'Report', 'item' => $item]);
    }

    public function create(Request $request): string
    {
        return $this->view('reports.create', ['title' => 'New Report']);
    }

    public function store(Request $request): string
    {
        $data = $request->only(['reporter_id', 'target_type', 'target_id', 'reason']);
        $validator = ReportRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/reports/create');
        }
        $this->service->create($data);
        Session::flash('_success', 'Report created.');
        return $this->redirect('/reports');
    }

    public function edit(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Report not found');
        }
        return $this->view('reports.edit', ['title' => 'Edit Report', 'item' => $item]);
    }

    public function update(Request $request, string $id): string
    {
        $data = $request->only(['reporter_id', 'target_type', 'target_id', 'reason']);
        $validator = ReportRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/reports/' . $id . '/edit');
        }
        $this->service->update((int) $id, $data);
        Session::flash('_success', 'Report updated.');
        return $this->redirect('/reports');
    }

    public function destroy(Request $request, string $id): string
    {
        $this->service->delete((int) $id);
        Session::flash('_success', 'Report deleted.');
        return $this->redirect('/reports');
    }
}
