<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    // 📄 LIST / HISTORY NOTIFIKASI
    public function index()
    {
        $notifikasis = Notifikasi::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('notifikasi.index', compact('notifikasis'));
    }

    // ✅ TANDAI SUDAH DIBACA
    public function markAsRead($id)
    {
        $notif = Notifikasi::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $notif->update(['is_read' => true]);

        return back();
    }

    // 🗑️ HAPUS (OPTIONAL – HISTORY CLEANUP)
    public function destroy($id)
    {
        $notif = Notifikasi::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $notif->delete();

        return back();
    }
}
