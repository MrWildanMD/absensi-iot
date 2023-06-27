<?php

namespace App\Models;

use App\Models\Absensi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = ['uid', 'nim', 'nik', 'nama', 'kelas', 'jurusan'];

    public function absensi(): HasMany
    {
        return $this->hasMany(Absensi::class);
    }
}
