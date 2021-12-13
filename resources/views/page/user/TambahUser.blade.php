@extends('layouts.template')

@section('title', 'Tambah User')

@section('content')

<form action="{{ route('user.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Nama Lengkap</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group">
        <label for="nomor_induk">Nomor Induk</label>
        <input type="text" class="form-control" id="nomor_induk" name="nomor_induk" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>

    <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <select class="form-control" id="jabatan" name="jabatan" required>
            <option value="Siswa">Siswa</option>
            <option value="Alumni">Alumni</option>
            <option value="Resepsionis">Resepsionis</option>
            <option value="Staff Tata Usaha">Staff Tata Usaha</option>
            <option value="Kepala Tata Usaha">Kepala Tata Usaha</option>
            <option value="Kepala Sekolah">Kepala Sekolah</option>
        </select>
    </div>

    <div class="form-group">
        <label class="d-block">Jenis Kelamin</label>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="pria" name="jenis_kelamin" value="Pria" class="custom-control-input" required>
            <label class="custom-control-label" for="pria">Pria</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="wanita" value="Wanita" name="jenis_kelamin" class="custom-control-input" required>
            <label class="custom-control-label" for="wanita">Wanita</label>
        </div>
    </div>

    <div class="form-group">
        <label for="agama">Agama</label>
        <select class="form-control" id="agama" name="agama" required>
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Katolik">Katolik</option>
            <option value="Buddha">Buddha</option>
            <option value="Hindu">Hindu</option>
            <option value="Konghucu">Konghucu</option>
        </select>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" required>
        </div>
        <div class="form-group col-md-6">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required>
        </div>
    </div>

    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" style="resize: none" name="alamat" id="alamat" cols="3" required></textarea>
    </div>

    <div class="d-flex justify-content-end my-3">
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="ml-2 btn btn-primary">Tambah</button>
    </div>
</form>

@endsection