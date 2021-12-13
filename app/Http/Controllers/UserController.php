<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {

        $users = User::getAllUser();

        return view('page.user.KelolaUser', [
            'users' => $users
        ]);
    }

    public function create() {
        return view('page.user.TambahUser');
    }

    public function store(Request $request) {
        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'nomor_induk' => $data['nomor_induk'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'agama' => $data['agama'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat' => $data['alamat'],
        ]);

        $user->assignRole($data['jabatan']);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');

    }

    public function edit($id) {
        return view('page.user.EditUser', [
            'user' => User::find($id)
        ]);
    }

    public function update(Request $request, $id) {
        $data = $request->all();

        $user = User::find($id);

        $user->update([
            'name' => $data['name'],
            'nomor_induk' => $data['nomor_induk'],
            'email' => $data['email'],
            'agama' => $data['agama'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat' => $data['alamat'],
        ]);

        if($user['password'] !== null) {
            $user->update(['password' => bcrypt($data['password'])]);
        }

        $user->syncRoles($data['jabatan']);

        return redirect()->route('user.index')->with('update', 'User berhasil diperbarui');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('user.index')->with('delete', 'User berhasil dihapus');
    }
}
