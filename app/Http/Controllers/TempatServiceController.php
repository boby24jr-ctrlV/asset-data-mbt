<?php

namespace App\Http\Controllers;

use App\Models\TempatService;
use Illuminate\Http\Request;

class TempatServiceController extends Controller
{
    /**
     * Tampilkan list tempat service
     */
    public function index()
    {
        $tempatServices = TempatService::latest()->get();

        return view('tempat_services.index', compact('tempatServices'));
    }

    /**
     * Form tambah tempat service
     */
    public function create()
    {
        return view('tempat_services.create');
    }

    /**
     * Simpan data tempat service
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'alamat'      => 'required|string',
            'no_telepon'  => 'required|string|max:20',
        ]);

        TempatService::create([
            'nama_tempat' => $request->nama_tempat,
            'alamat'      => $request->alamat,
            'no_telepon'  => $request->no_telepon,
        ]);

        return redirect()
            ->route('tempat_services.index')
            ->with('success', 'Tempat service berhasil ditambahkan');
    }

    /**
     * Form edit tempat service
     */
    public function edit(TempatService $tempatService)
    {
        return view('tempat_services.edit', compact('tempatService'));
    }

    /**
     * Update data tempat service
     */
    public function update(Request $request, TempatService $tempatService)
    {
        $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'alamat'      => 'required|string',
            'no_telepon'  => 'required|string|max:20',
        ]);

        $tempatService->update([
            'nama_tempat' => $request->nama_tempat,
            'alamat'      => $request->alamat,
            'no_telepon'  => $request->no_telepon,
        ]);

        return redirect()
            ->route('tempat_services.index')
            ->with('success', 'Data tempat service berhasil diperbarui');
    }

    /**
     * Hapus tempat service
     */
    public function destroy(TempatService $tempatService)
    {
        $tempatService->delete();

        return redirect()
            ->route('tempat_services.index')
            ->with('success', 'Data tempat service berhasil dihapus');
    }
}
