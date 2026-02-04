<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'jenis_maintenance',
        'technician_id',
        'tanggal_service',
        'biaya',
        'catatan'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function technician()
    {
        return $this->belongsTo(User::class,'technician_id');
    }
}
