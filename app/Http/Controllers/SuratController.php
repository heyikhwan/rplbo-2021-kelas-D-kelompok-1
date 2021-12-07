<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\User;
use App\Models\UserSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    public function create() {
        $user = User::findOrFail(Auth::user()->id);

        return view('page.pengajuan.pengajuan-surat', [
            'user' => $user
        ]);
    }

    public function store(Request $request) {
        $data = $request->all();

        $surat = Surat::create([
            'kelas' => $data['kelas'],
            'jenis_surat' => $data['jenis_surat'],
            'status' => 'pengajuan dikirim',
            'tujuan' => $data['tujuan'],
        ]);

        UserSurat::create([
            'user_id' => Auth::user()->id,
            'surat_id' => $surat->id
        ]);

        return redirect()->route('riwayat.index')->with('success', 'Pengajuan Berhasil');
    }
}
