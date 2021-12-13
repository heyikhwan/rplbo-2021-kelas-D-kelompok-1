<?php

namespace App\Http\Controllers;

use App\Models\UserSurat;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index() {

        $surats = UserSurat::getAll();

        return view('page.riwayat.LacakRiwayatSurat', [
            'surats' => $surats
        ]);
    }
}
