<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Session;
use App\Requests\BookingRequest;
use App\Services\BookingService;

final class BookingController extends Controller
{
    public function __construct(
        private readonly BookingService $service = new BookingService(),
    ) {
    }

    public function index(Request $request): string
    {
        return $this->view('bookings.index', [
            'title' => 'Bookings',
            'items' => $this->service->all(),
        ]);
    }

    public function show(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Booking not found');
        }
        return $this->view('bookings.show', ['title' => 'Booking', 'item' => $item]);
    }

    public function create(Request $request): string
    {
        return $this->view('bookings.create', ['title' => 'New Booking']);
    }

    public function store(Request $request): string
    {
        $data = $request->only(['hire_request_id', 'start_date', 'end_date', 'status']);
        $validator = BookingRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/bookings/create');
        }
        $this->service->create($data);
        Session::flash('_success', 'Booking created.');
        return $this->redirect('/bookings');
    }

    public function edit(Request $request, string $id): string
    {
        $item = $this->service->find((int) $id);
        if ($item === null) {
            return $this->abort(404, 'Booking not found');
        }
        return $this->view('bookings.edit', ['title' => 'Edit Booking', 'item' => $item]);
    }

    public function update(Request $request, string $id): string
    {
        $data = $request->only(['hire_request_id', 'start_date', 'end_date', 'status']);
        $validator = BookingRequest::validate($data);
        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/bookings/' . $id . '/edit');
        }
        $this->service->update((int) $id, $data);
        Session::flash('_success', 'Booking updated.');
        return $this->redirect('/bookings');
    }

    public function destroy(Request $request, string $id): string
    {
        $this->service->delete((int) $id);
        Session::flash('_success', 'Booking deleted.');
        return $this->redirect('/bookings');
    }
}
