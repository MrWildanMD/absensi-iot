<?php

namespace App\Models;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $fillable = ['jam', 'tanggal', 'uid', 'status','id_jadwal','kelas','jurusan'];

    public function mhs(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'uid');
    }
    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }

    
}
