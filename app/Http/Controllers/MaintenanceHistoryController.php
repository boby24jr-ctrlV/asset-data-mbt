<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaintenanceHistory;
use App\Models\MaintenanceSchedule;
use App\Models\User;

class MaintenanceHistoryController extends Controller
{
    public function index()
    {
        $histories = MaintenanceHistory::with(['maintenanceSchedule','technician'])
            ->latest()
            ->get();

        return view('maintenance_histories.index', compact('histories'));
    }

    public function create()
    {
        $schedules = MaintenanceSchedule::all();
        $technicians = User::all();

        return view('maintenance_histories.create', compact('schedules','technicians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'maintenance_schedule_id' => 'required',
            'technician_id' => 'nullable',
            'tanggal_service' => 'required|date',
            'biaya' => 'nullable|integer',
            'catatan' => 'nullable|string',
        ]);

        MaintenanceHistory::create($request->all());

        return redirect()
            ->route('maintenance.histories.index')
            ->with('success','History maintenance berhasil ditambahkan');
    }
}
