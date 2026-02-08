<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceSchedule;
use App\Models\MaintenanceHistory;
use App\Models\Item;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required',
            'jenis_maintenance' => 'required',
            'interval_hari' => 'required|integer',
            'last_maintenance' => 'required|date'
        ]);

        MaintenanceSchedule::create($request->all());

        return redirect()->route('maintenance.index');
    }

    public function update(Request $request, MaintenanceSchedule $maintenance)
    {
        $request->validate([
            'status' => 'required|in:dijadwalkan,proses,selesai'
        ]);

        $maintenance->update($request->all());

        return redirect()->route('maintenance.index');
    }
}
