<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::latest()->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:items,kode_barang',
            'nama_barang' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'kondisi' => 'required',
            'status_pemakaian' => 'required',
            'harga_barang' => 'nullable|numeric',
            'tahun_pengadaan' => 'nullable|digits:4',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')
            ->with('success','Data barang berhasil ditambahkan');
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'kode_barang' => 'required|unique:items,kode_barang,'.$item->id,
            'nama_barang' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'kondisi' => 'required',
            'status_pemakaian' => 'required',
            'harga_barang' => 'nullable|numeric',
            'tahun_pengadaan' => 'nullable|digits:4',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')
            ->with('success','Data barang berhasil diupdate');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')
            ->with('success','Data barang berhasil dihapus');
    }
}
