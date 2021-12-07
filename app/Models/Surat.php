<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas',
        'jenis_surat',
        'status',
        'tujuan',
        'disposisi',
    ];

    public function user_surats() {
        return $this->hasMany(UserSurat::class, 'surat_id');
    }
}
