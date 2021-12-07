<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\UserSurat;
use Illuminate\Http\Request;

class PermintaanLegalisirController extends Controller
{
    public function index() {
        $surats = UserSurat::getAllLegalization();

        return view('page.permintaan.permintaan-legalisir', [
            'surats' => $surats
        ]);
    }

    public function accLegalization($id) {
        $surat = Surat::findOrFail($id);

        $surat->update(['status' => 'sedang diproses']);

        return redirect()->back();
    }

    public function rejectLegalization($id) {
        $surat = Surat::findOrFail($id);

        $surat->update(['status' => 'dibatalkan']);

        return redirect()->back();
    }

    public function ktuAccLegalization($id) {
        $surat = Surat::findOrFail($id);

        $surat->update(['status' => 'menunggu persetujuan kepala sekolah']);

        return redirect()->back();
    }

    public function updateDisposition(Request $request, $id) {
        $disposisi = $request->disposisi;
        $surat = Surat::findOrFail($id);

        $surat->update([
            'disposisi' => $disposisi
        ]);

        return redirect()->back();
    }

    public function batalkan($id) {
        $surat = Surat::findOrFail($id);

        $surat->update(['status' => 'dibatalkan']);

        return redirect()->back();
    }

    public function completeSubmission($id) {
        $surat = Surat::findOrFail($id);

        $surat->update(['status' => 'selesai']);

        return redirect()->back();
    }
}
