<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\Item;
use App\Models\TempatService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepairWebController extends Controller
{
    // ======================
    // INDEX
    // ======================
    public function index()
    {
        $repairs = Repair::with(['item', 'user', 'tempatService'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('repairs.index', compact('repairs'));
    }

    // ======================
    // CREATE
    // ======================
    public function create()
    {
        $items = Item::all();
        $services = TempatService::all();

        return view('repairs.create', compact('items', 'services'));
    }

    // ======================
    // STORE
    // ======================
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'tempat_services_id' => 'nullable|exists:tempat_services,id',
            'tanggal_rusak' => 'required|date',
            'deskripsi_kerusakan' => 'required',
        ]);

        // Repair::create([
        //     'item_id' => $request->item_id,
        //     'user_id' => auth()->id(),
        //     'tempat_services_id' => $request->tempat_services_id,
        //     'tanggal_rusak' => $request->tanggal_rusak,
        //     'deskripsi_kerusakan' => $request->deskripsi_kerusakan,
        //     'status' => 'dilaporkan',
        // ]);
        Repair::create([
    'item_id' => $request->item_id,
    'user_id' => Auth::id(),
    'tempat_services_id' => $request->tempat_services_id ?? null,
    'tanggal_rusak' => $request->tanggal_rusak,
    'deskripsi_kerusakan' => $request->deskripsi_kerusakan,
    'status' => 'dilaporkan',
]);




        return redirect()->route('repairs.index')
            ->with('success', 'Laporan kerusakan berhasil ditambahkan');
    }

    // ======================
    // SHOW
    // ======================
    public function show($id)
    {
        $repair = Repair::with(['item', 'user', 'tempatService'])
            ->findOrFail($id);

        return view('repairs.show', compact('repair'));
    }

    // ======================
    // EDIT
    // ======================
    public function edit($id)
    {
        $repair = Repair::findOrFail($id);
        $services = TempatService::all();

        return view('repairs.edit', compact('repair', 'services'));
    }

    // ======================
    // UPDATE
    // ======================
    public function update(Request $request, $id)
    {
        $repair = Repair::findOrFail($id);

        $request->validate([
            'tempat_services_id' => 'nullable|exists:tempat_services,id',
            'status' => 'required|in:dilaporkan,proses,selesai',
            'biaya' => 'nullable|integer',
            'tanggal_selesai' => 'nullable|date',
            'catatan' => 'nullable',
        ]);

        $repair->update([
            'tempat_services_id' => $request->tempat_services_id,
            'status' => $request->status,
            'biaya' => $request->biaya,
            'tanggal_selesai' => $request->tanggal_selesai,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('repairs.index')
            ->with('success', 'Data repair berhasil diperbarui');
    }

    // ======================
    // DESTROY
    // ======================
    public function destroy($id)
    {
        Repair::findOrFail($id)->delete();

        return redirect()->route('repairs.index')
            ->with('success', 'Data repair berhasil dihapus');
    }
}
