<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // 📌 INDEX (LIST DATA)
    public function index()
    {
        $items = Item::latest()->get();
        return view('items.index', compact('items'));
    }

    // 📌 FORM TAMBAH
    public function create()
    {
        return view('items.create');
    }

    // 📌 SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'kondisi' => 'required',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')->with('success','Data berhasil ditambahkan');
    }

    // 📌 DETAIL
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    // 📌 FORM EDIT
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    // 📌 UPDATE
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'kondisi' => 'required',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')->with('success','Data berhasil diupdate');
    }

    // 📌 HAPUS
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success','Data berhasil dihapus');
    }
}
