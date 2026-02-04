<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaintenanceHistory;
use App\Models\Item;
use App\Models\User;

class MaintenanceHistoryController extends Controller
{
    public function index()
    {
        $histories = MaintenanceHistory::with(['item','technician'])
            ->latest()
            ->get();

        return view('maintenance_histories.index', compact('histories'));
    }

    public function create()
    {
        $items = Item::all();
        $technicians = User::all();

        return view('maintenance_histories.create', compact('items','technicians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required',
            'jenis_maintenance' => 'required',
            'technician_id' => 'nullable',
            'tanggal_service' => 'required|date',
            'biaya' => 'nullable|integer',
            'catatan' => 'nullable|string',
        ]);

        MaintenanceHistory::create([
            'item_id' => $request->item_id,
            'jenis_maintenance' => $request->jenis_maintenance,
            'technician_id' => $request->technician_id,
            'tanggal_service' => $request->tanggal_service,
            'biaya' => $request->biaya,
            'catatan' => $request->catatan,
        ]);

        return redirect()
            ->route('maintenance.histories.index')
            ->with('success','History maintenance berhasil ditambahkan');
    }
}
