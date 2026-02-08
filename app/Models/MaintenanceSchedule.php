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
        'status',
        'catatan'
    ];

    protected $appends = ['next_maintenance'];

    public function getNextMaintenanceAttribute()
    {
        return \Carbon\Carbon::parse($this->last_maintenance)
            ->addDays($this->interval_hari);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function repairs()
    {
        return $this->hasMany(Repair::class);
    }
}
