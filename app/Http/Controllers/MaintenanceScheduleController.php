<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceSchedule;
use App\Models\Item;
use Illuminate\Http\Request;
use Carbon\Carbon;


class MaintenanceScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * INDEX (ADMIN)
     */
    public function index()
    {
        $today = now();

        $maintenances = MaintenanceSchedule::with('item', 'user')
            ->latest()
            ->get();

        $mendekati = $maintenances->filter(fn ($m) =>
            $m->next_maintenance &&
            $m->next_maintenance <= $today->copy()->addDays(3) &&
            $m->status !== 'selesai'
        );

        $terlambat = $maintenances->filter(fn ($m) =>
            $m->next_maintenance &&
            $m->next_maintenance < $today &&
            $m->status !== 'selesai'
        );

        return view('maintenance.index', compact(
            'maintenances',
            'mendekati',
            'terlambat'
        ));
    }

    /**
     * EDIT (ADMIN)
     */
   public function edit($id)
{
    $items = Item::all();

    $maintenance = MaintenanceSchedule::with('item','user')
        ->findOrFail($id);

    return view('maintenance.edit', compact('maintenance', 'items'));
}


    /**
     * UPDATE (ADMIN)
     */
    public function update(Request $request, $id)
    {
        $maintenance = MaintenanceSchedule::findOrFail($id);

        $request->validate([
            'interval_hari' => 'required|integer|min:1',
            'last_maintenance' => 'required|date',
            'status' => 'required|in:dijadwalkan,proses,selesai',
            'catatan' => 'nullable|string'
        ]);

        $maintenance->update([
            'interval_hari' => $request->interval_hari,
            'last_maintenance' => $request->last_maintenance,
            'status' => $request->status,
            'catatan' => $request->catatan
        ]);

        return redirect()
            ->route('maintenance.index')
            ->with('success', 'Maintenance berhasil diperbarui');
    }

    /**
     * DELETE (ADMIN)
     */
    public function destroy($id)
    {
        MaintenanceSchedule::findOrFail($id)->delete();

        return redirect()
            ->route('maintenance.index')
            ->with('success', 'Data maintenance dihapus');
    }
}

