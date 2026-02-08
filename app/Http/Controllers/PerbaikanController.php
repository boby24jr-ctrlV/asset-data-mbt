<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\MaintenanceSchedule;
use App\Models\TempatService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerbaikanController extends Controller
{
    // INDEX - Student melihat data perbaikan mereka sendiri
    public function index()
    {
        // Ambil item melalui maintenance schedule
        $maintenanceItems = MaintenanceSchedule::with('item')
            ->whereHas('item')
            ->get();

        $tempatServices = TempatService::all();

        // Ambil repair milik user login (gunakan guard student)
        $repairs = Repair::with('maintenanceSchedule.item', 'tempatService')
            ->where('user_id', Auth::guard('student')->id())
            ->latest()
            ->get();

        return view('perbaikan.index', [
            'repairs' => $repairs,
            'maintenanceItems' => $maintenanceItems,
            'tempatServices' => $tempatServices,
        ]);
    }

    // STORE - Student membuat laporan perbaikan
    public function store(Request $request)
    {
        $request->validate([
            'maintenance_schedule_id' => 'required|exists:maintenance_schedules,id',
            'tempat_services_id' => 'required|exists:tempat_services,id',
            'tanggal_rusak' => 'required|date',
            'deskripsi_kerusakan' => 'required|string',
        ]);

        Repair::create([
            'maintenance_schedule_id' => $request->maintenance_schedule_id,
            'user_id' => Auth::guard('student')->id(),
            'tempat_services_id' => $request->tempat_services_id,
            'tanggal_rusak' => $request->tanggal_rusak,
            'deskripsi_kerusakan' => $request->deskripsi_kerusakan,
            'status' => 'dilaporkan', // ✅ Sesuai dengan ENUM migration
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('perbaikan.index')->with('success', '✅ Laporan perbaikan berhasil dikirim!');
    }
}