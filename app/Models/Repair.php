<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;

    protected $fillable = [
        'maintenance_schedule_id',
        'user_id',
        'tempat_services_id',
        'tanggal_rusak',
        'deskripsi_kerusakan',
        'status',
        'biaya',
        'tanggal_selesai',
        'catatan',
    ];

    protected $casts = [
        'tanggal_rusak' => 'date',
        'tanggal_selesai' => 'date',
        'biaya' => 'integer',
    ];

    // Relasi ke MaintenanceSchedule
    public function maintenanceSchedule()
    {
        return $this->belongsTo(MaintenanceSchedule::class, 'maintenance_schedule_id');
    }

    // Alias untuk kompatibilitas dengan RepairWebController
    public function schedule()
    {
        return $this->maintenanceSchedule();
    }

    // Relasi ke TempatService
    public function tempatService()
    {
        return $this->belongsTo(TempatService::class, 'tempat_services_id');
    }

    // Relasi ke User (Student/Admin yang melaporkan)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}