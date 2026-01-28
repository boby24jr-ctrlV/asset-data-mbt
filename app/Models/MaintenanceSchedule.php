<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceSchedule extends Model
{
    protected $fillable = [
        'item_id',
        'jenis_maintenance',
        'interval_hari',
        'last_maintenance',
        'next_maintenance',
        'status',
        'catatan'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}

