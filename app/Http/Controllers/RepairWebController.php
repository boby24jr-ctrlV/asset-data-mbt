<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\TempatService;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class RepairWebController extends Controller
{
    // Menampilkan semua data repair
    public function index()
    {
        $repairs = Repair::with(['item', 'user', 'tempatService'])->latest()->get();
        return view('repairs.index', compact('repairs'));
    }

    // Menampilkan form create
    public function create()
    {
        $services = TempatService::all();
        $items = Item::all();
        $users = User::all();
        
        return view('repairs.create', compact('services', 'items', 'users'));
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'user_id' => 'required|exists:users,id',
            'tempat_services_id' => 'nullable|exists:tempat_services,id',
            'tanggal_rusak' => 'required|date',
            'deskripsi_kerusakan' => 'required|string',
            'status' => 'required|in:dilaporkan,proses,selesai',
            'biaya' => 'nullable|numeric',
            'tanggal_selesai' => 'nullable|date',
            'catatan' => 'nullable|string',
        ]);

        Repair::create($validated);

        return redirect()->route('repairs.index')->with('success', 'Data repair berhasil ditambahkan');
    }

    // Menampilkan detail
    public function show($id)
    {
        $repair = Repair::with(['item', 'user', 'tempatService'])->findOrFail($id);
        return view('repairs.show', compact('repair'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $repair = Repair::findOrFail($id);
        $services = TempatService::all();
        $items = Item::all();
        $users = User::all();
        
        return view('repairs.edit', compact('repair', 'services', 'items', 'users'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $repair = Repair::findOrFail($id);

        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'user_id' => 'required|exists:users,id',
            'tempat_services_id' => 'nullable|exists:tempat_services,id',
            'tanggal_rusak' => 'required|date',
            'deskripsi_kerusakan' => 'required|string',
            'status' => 'required|in:dilaporkan,proses,selesai',
            'biaya' => 'nullable|numeric',
            'tanggal_selesai' => 'nullable|date',
            'catatan' => 'nullable|string',
        ]);

        $repair->update($validated);

        return redirect()->route('repairs.index')->with('success', 'Data repair berhasil diupdate');
    }

    // Hapus data
    public function destroy($id)
    {
        $repair = Repair::findOrFail($id);
        $repair->delete();

        return redirect()->route('repairs.index')->with('success', 'Data repair berhasil dihapus');
    }
}