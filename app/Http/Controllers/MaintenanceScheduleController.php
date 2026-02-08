<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceSchedule;
use App\Models\Item;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MaintenanceScheduleController extends Controller
{
    public function index()
    {
        $today = now();

        $maintenances = MaintenanceSchedule::with('item')->get();

        $mendekati = $maintenances->filter(fn($m) =>
            $m->next_maintenance <= $today->copy()->addDays(3)
            && $m->status !== 'selesai'
        );

        $terlambat = $maintenances->filter(fn($m) =>
            $m->next_maintenance < $today
            && $m->status !== 'selesai'
        );

        return view('maintenance.index', compact(
            'maintenances','mendekati','terlambat'
        ));
    }

    // ✅ INI YANG KURANG (PENYEBAB ERROR)
    public function create()
    {
        $items = Item::all();
        return view('maintenance.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required',
            'jenis_maintenance' => 'required',
            'interval_hari' => 'required|integer',
            'last_maintenance' => 'required|date'
        ]);

        MaintenanceSchedule::create([
            'item_id' => $request->item_id,
            'jenis_maintenance' => $request->jenis_maintenance,
            'interval_hari' => $request->interval_hari,
            'last_maintenance' => $request->last_maintenance,
            'status' => 'dijadwalkan',
            'catatan' => $request->catatan
        ]);

        return redirect()->route('maintenance.index')
            ->with('success','Jadwal maintenance berhasil ditambahkan');
    }

    public function edit($id)
    {
        $maintenance = MaintenanceSchedule::findOrFail($id);
        $items = Item::all();

        return view('maintenance.edit', compact('maintenance','items'));
    }

    public function update(Request $request, $id)
    {
        $maintenance = MaintenanceSchedule::findOrFail($id);

        $request->validate([
            'status' => 'required|in:dijadwalkan,proses,selesai'
        ]);

        $maintenance->update($request->all());

        return redirect()->route('maintenance.index')
            ->with('success','Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $maintenance = MaintenanceSchedule::findOrFail($id);
        $maintenance->delete();

        return redirect()->route('maintenance.index')
            ->with('success','Data berhasil dihapus');
    }
}
