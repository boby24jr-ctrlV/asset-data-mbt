<?php

namespace App\Http\Controllers;

use App\Models\TempatService;
use Illuminate\Http\Request;

class TempatServiceController extends Controller
{
    public function index()
    {
        $tempatServices = TempatService::all();
        return view('tempat_services.index', compact('tempatServices'));
    }

    public function create()
    {
        return view('tempat_services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tempat' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        TempatService::create($request->all());

        return redirect()->route('tempat-services.index')
            ->with('success', 'Tempat service berhasil ditambahkan');
    }

    public function edit(TempatService $tempatService)
    {
        return view('tempat_services.edit', compact('tempatService'));
    }

    public function update(Request $request, TempatService $tempatService)
    {
        $request->validate([
            'nama_tempat' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        $tempatService->update($request->all());

        return redirect()->route('tempat-services.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(TempatService $tempatService)
    {
        $tempatService->delete();

        return redirect()->route('tempat-services.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
