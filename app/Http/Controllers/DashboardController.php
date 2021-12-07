<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\User;
use App\Models\UserSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {

        $jml_pengajuan_surat = UserSurat::jmlPengajuanSurat();

        $jml_pengajuan_legalisir = UserSurat::jmlPengajuanLegalisir();

        $jml_pengajuan_selesai = UserSurat::jmlPengajuanSelesai();

        $jml_permintaan_surat = UserSurat::getAllLetter()->count();
        $jml_permintaan_legalisir = UserSurat::getAllLegalization()->count();

        $jml_user = User::all()->count();

        return view('page.dashboard', [
            'jml_pengajuan_surat' => $jml_pengajuan_surat,
            'jml_pengajuan_legalisir' => $jml_pengajuan_legalisir,
            'jml_pengajuan_selesai' => $jml_pengajuan_selesai,
            'jml_permintaan_surat' => $jml_permintaan_surat,
            'jml_permintaan_legalisir' => $jml_permintaan_legalisir,
            'jml_user' => $jml_user
        ]);
    }
}
