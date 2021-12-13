<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\UserSurat;
use Illuminate\Http\Request;

class PermintaanSuratController extends Controller
{
    public function index() {
        $surats = UserSurat::getAllLetter();

        return view('page.permintaan.PermintaanSurat', [
            'surats' => $surats
        ]);
    }

    public function accLetter($id) {
        $surat = Surat::findOrFail($id);

        $surat->update(['status' => 'sedang diproses']);

        return redirect()->back();
    }

    public function rejectLetter($id) {
        $surat = Surat::findOrFail($id);

        $surat->update(['status' => 'dibatalkan']);

        return redirect()->back();
    }

    public function ktuAccLetter($id) {
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

    public function revisi($id) {
        $surat = Surat::findOrFail($id);

        $surat->update(['status' => 'sedang diproses']);

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
