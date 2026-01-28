<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Maintenance;
use App\Models\Repair;
use App\Models\Repair as ModelsRepair;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'kategori',
        'lokasi',
        'kondisi',
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
