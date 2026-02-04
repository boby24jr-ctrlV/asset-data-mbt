<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'merk',
        'tahun_pengadaan',
        'harga_barang',
        'lokasi',
        'kondisi',
        'status_pemakaian',
        'catatan',
    ];

    public function maintenances()
    {
        return $this->hasMany(MaintenanceSchedule::class);
    }

    public function repairs()
    {
        return $this->hasMany(Repair::class);
    }
}
