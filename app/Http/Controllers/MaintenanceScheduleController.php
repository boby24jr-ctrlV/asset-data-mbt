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
        $today = Carbon::today();

        $maintenances = MaintenanceSchedule::with('item')->get();

        $mendekati = MaintenanceSchedule::whereDate('next_maintenance','<=',$today->copy()->addDays(3))
                        ->where('status','!=','selesai')
                        ->get();

        $terlambat = MaintenanceSchedule::whereDate('next_maintenance','<',$today)
                        ->where('status','!=','selesai')
                        ->get();

        return view('maintenance.index', compact('maintenances','mendekati','terlambat'));
    }

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

        $next = Carbon::parse($request->last_maintenance)
                    ->addDays((int)$request->interval_hari);

        MaintenanceSchedule::create([
            'item_id' => $request->item_id,
            'jenis_maintenance' => $request->jenis_maintenance,
            'interval_hari' => (int)$request->interval_hari,
            'last_maintenance' => $request->last_maintenance,
            'next_maintenance' => $next,
            'status' => 'dijadwalkan',
            'catatan' => $request->catatan
        ]);

        return redirect()->route('maintenance.index');
    }

    public function edit(MaintenanceSchedule $maintenance)
    {
        $items = Item::all();
        return view('maintenance.edit', compact('maintenance','items'));
    }

    public function update(Request $request, MaintenanceSchedule $maintenance)
    {
        $request->validate([
            'item_id' => 'required',
            'jenis_maintenance' => 'required',
            'interval_hari' => 'required|integer',
            'last_maintenance' => 'required|date',
            'status' => 'required|in:dijadwalkan,proses,selesai'
        ]);

        $next = Carbon::parse($request->last_maintenance)
                ->addDays((int)$request->interval_hari);

        // ✅ JIKA STATUS = SELESAI → PINDAH KE HISTORY
        if ($request->status === 'selesai') {

            MaintenanceHistory::create([
    'item_id' => $maintenance->item_id,
    'jenis_maintenance' => $maintenance->jenis_maintenance,
    'technician_id' => Auth::id(),
    'tanggal_service' => now(),
    'biaya' => null,
    'catatan' => $request->catatan
]);


            // hapus dari schedule
            $maintenance->delete();

            return redirect()
                ->route('maintenance.index')
                ->with('success','Maintenance selesai & dipindahkan ke history');
        }

        // ✅ JIKA BELUM SELESAI → UPDATE BIASA
        $maintenance->update([
            'item_id' => $request->item_id,
            'jenis_maintenance' => $request->jenis_maintenance,
            'interval_hari' => (int)$request->interval_hari,
            'last_maintenance' => $request->last_maintenance,
            'next_maintenance' => $next,
            'status' => $request->status,
            'catatan' => $request->catatan
        ]);

        return redirect()->route('maintenance.index');
    }

    public function destroy(MaintenanceSchedule $maintenance)
    {
        $maintenance->delete();
        return back();
    }
}
