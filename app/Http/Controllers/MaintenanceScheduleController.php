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
        $today = Carbon::today();

        $maintenances = MaintenanceSchedule::with('item')->get();

        $mendekati = MaintenanceSchedule::whereDate('next_maintenance','<=',$today->copy()->addDays(3))
                        ->where('status','!=','selesai')->get();

        $terlambat = MaintenanceSchedule::whereDate('next_maintenance','<',$today)
                        ->where('status','!=','selesai')->get();

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
            'item_id'=>'required',
            'jenis_maintenance'=>'required',
            'interval_hari'=>'required|integer',
            'last_maintenance'=>'required|date'
        ]);

        $next = Carbon::parse($request->last_maintenance)
                    ->addDays((int)$request->interval_hari);

        MaintenanceSchedule::create([
            'item_id'=>$request->item_id,
            'jenis_maintenance'=>$request->jenis_maintenance,
            'interval_hari'=>$request->interval_hari,
            'last_maintenance'=>$request->last_maintenance,
            'next_maintenance'=>$next,
            'status'=>'dijadwalkan',
            'catatan'=>$request->catatan
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
        $next = Carbon::parse($request->last_maintenance)
                ->addDays($request->interval_hari);

        $maintenance->update([
            'item_id'=>$request->item_id,
            'jenis_maintenance'=>$request->jenis_maintenance,
            'interval_hari'=>$request->interval_hari,
            'last_maintenance'=>$request->last_maintenance,
            'next_maintenance'=>$next,
            'status'=>$request->status,
            'catatan'=>$request->catatan
        ]);

        return redirect()->route('maintenance.index');
    }

    public function destroy(MaintenanceSchedule $maintenance)
    {
        $maintenance->delete();
        return back();
    }
}
