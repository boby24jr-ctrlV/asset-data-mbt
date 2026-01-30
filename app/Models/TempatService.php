<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatService extends Model
{
    use HasFactory;

    protected $table = 'tempat_services';

    protected $fillable = [
        'nama_tempat',
        'alamat',
        'no_telepon',
    ];

    // relasi ke repair
    public function repairs()
    {
        return $this->hasMany(Repair::class);
    }
}
