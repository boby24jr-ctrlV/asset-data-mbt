<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'maintenance_schedule_id',
        'technician_id',
        'tanggal_service',
        'biaya',
        'catatan'
    ];

    public function schedule()
    {
        return $this->belongsTo(MaintenanceSchedule::class,'maintenance_schedule_id');
    }

    public function technician()
    {
        return $this->belongsTo(User::class,'technician_id');
    }
}
