<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'user_id',
        'tempat_services_id',
        'tanggal_rusak',
        'deskripsi_kerusakan',
        'status',
        'biaya',
        'tanggal_selesai',
        'catatan'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tempatService()
    {
        return $this->belongsTo(TempatService::class, 'tempat_services_id');
    }
}