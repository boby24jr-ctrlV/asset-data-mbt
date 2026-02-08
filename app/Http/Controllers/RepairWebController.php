<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\TempatService;
use App\Models\MaintenanceSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepairWebController extends Controller
{
    // ===============================
    // INDEX
    // ===============================
    public function index()
    {
        $repairs = Repair::with([
            'schedule.item',
            'user',
            'tempatService'
        ])->latest()->get();

        return view('repairs.index', compact('repairs'));
    }

    // ===============================
    // CREATE
    // ===============================
    public function create()
    {
        $maintenanceSchedules = MaintenanceSchedule::with('item')->get();
        $services = TempatService::all();

        return view('repairs.create', compact(
            'maintenanceSchedules',
            'services'
        ));
    }

    // ===============================
    // STORE
    // ===============================
    public function store(Request $request)
    {
        $validated = $request->validate([
            'maintenance_schedule_id' => 'required|exists:maintenance_schedules,id',
            'tempat_services_id'      => 'nullable|exists:tempat_services,id',
            'tanggal_rusak'           => 'required|date',
            'deskripsi_kerusakan'     => 'required|string',
        ]);

        Repair::create([
            'maintenance_schedule_id' => $validated['maintenance_schedule_id'],
            'user_id'                 => Auth::id(),
            'tempat_services_id'      => $validated['tempat_services_id'] ?? null,
            'tanggal_rusak'           => $validated['tanggal_rusak'],
            'deskripsi_kerusakan'     => $validated['deskripsi_kerusakan'],
            'status'                  => 'dilaporkan',
        ]);

        return redirect()
            ->route('repairs.index')
            ->with('success', 'Data repair berhasil ditambahkan');
    }

    // ===============================
    // SHOW
    // ===============================
    public function show($id)
    {
        $repair = Repair::with([
            'schedule.item',
            'user',
            'tempatService'
        ])->findOrFail($id);

        return view('repairs.show', compact('repair'));
    }

    // ===============================
    // EDIT
    // ===============================
    public function edit($id)
    {
        $repair = Repair::findOrFail($id);
        $maintenanceSchedules = MaintenanceSchedule::with('item')->get();
        $services = TempatService::all();

        return view('repairs.edit', compact(
            'repair',
            'maintenanceSchedules',
            'services'
        ));
    }

    // ===============================
    // UPDATE
    // ===============================
    public function update(Request $request, $id)
    {
        $repair = Repair::findOrFail($id);

        $validated = $request->validate([
            'maintenance_schedule_id' => 'required|exists:maintenance_schedules,id',
            'tempat_services_id'      => 'nullable|exists:tempat_services,id',
            'tanggal_rusak'           => 'required|date',
            'deskripsi_kerusakan'     => 'required|string',
            'status'                  => 'required|in:dilaporkan,proses,selesai',
            'biaya'                   => 'nullable|numeric',
            'tanggal_selesai'         => 'nullable|date',
            'catatan'                 => 'nullable|string',
        ]);

        $repair->update($validated);

        return redirect()
            ->route('repairs.index')
            ->with('success', 'Data repair berhasil diupdate');
    }

    // ===============================
    // DESTROY
    // ===============================
    public function destroy($id)
    {
        Repair::findOrFail($id)->delete();

        return redirect()
            ->route('repairs.index')
            ->with('success', 'Data repair berhasil dihapus');
    }
}
