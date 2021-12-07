<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'surat_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function surat() {
        return $this->belongsTo(Surat::class, 'surat_id', 'id');
    }

    public function scopeGetAll($query) {
        return $query->with('surat')->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
    }

    public function scopeGetAllLetter($query) {
        return $query->with(['surat', 'user'])->whereHas('surat', function($query) {
            return $query->where('jenis_surat', '!=', 'Legalisir');
        })->orderBy('created_at', 'desc')->get();
    }

    public function scopeGetAllLegalization($query) {
        return $query->with(['surat', 'user'])->whereHas('surat', function($query) {
            return $query->where('jenis_surat', '=', 'Legalisir');
        })->orderBy('created_at', 'desc')->get();
    }

    public function scopeJmlPengajuanSurat($query) {
        return $query->where('user_id', '=', Auth::user()->id)->whereHas('surat', function ($q) {
            return $q->where('jenis_surat', '!=', 'legalisir');
        })->count();
    }

    public function scopeJmlPengajuanLegalisir($query) {
        return $query->where('user_id', '=', Auth::user()->id)->whereHas('surat', function ($q) {
            return $q->where('jenis_surat', '=', 'legalisir');
        })->count();
    }

    public function scopeJmlPengajuanSelesai($query) {
        return $query->where('user_id', '=', Auth::user()->id)->whereHas('surat', function ($q) {
            return $q->where('status', '=', 'selesai');
        })->count();
    }
}
