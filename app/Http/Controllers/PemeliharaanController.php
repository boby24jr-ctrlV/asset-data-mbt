<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceSchedule;
use App\Models\Item;
use Illuminate\Http\Request;

class PemeliharaanController extends Controller
{
    public function index()
{
    return view('pemeliharaan.index', [
        // 🔽 ini yang KURANG tadi
        'items' => Item::orderBy('nama_barang')->get(),

        // 🔐 hanya data milik user login
        'maintenances' => MaintenanceSchedule::where('user_id', auth()->id())
            ->latest()
            ->get(),
    ]);
}

    public function create()
    {
        $items = Item::all();
        return view('pemeliharaan.create', compact('items'));
    }

    public function store(Request $request)
{
    $request->validate([
        'item_id' => 'required|exists:items,id',
        'jenis_maintenance' => 'required|string|max:255',
        'catatan' => 'nullable|string',
    ]);

    MaintenanceSchedule::create([
        'user_id' => auth()->id(),     // 🔐 student pemilik laporan
        'item_id' => $request->item_id,
        'jenis_maintenance' => $request->jenis_maintenance,
        'catatan' => $request->catatan,

        // ✅ SESUAI ENUM
        'status' => 'dijadwalkan',

        // 🔒 hanya admin yg set
        'interval_hari' => null,
        'last_maintenance' => null,
    ]);

    return redirect()
        ->route('pemeliharaan.index')
        ->with('success', 'Laporan maintenance berhasil dikirim.');
}

}
