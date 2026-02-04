<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceSchedule extends Model
{
    protected $fillable = [
        'item_id',
        'jenis_maintenance',
        'interval_bulan',
        'last_maintenance',
        'next_maintenance',
        'status'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function histories()
    {
        return $this->hasMany(MaintenanceHistory::class);
    }
}

