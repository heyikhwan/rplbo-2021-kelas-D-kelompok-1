@extends('layouts.template')

@section('title', 'Pengajuan Surat')

@section('content')

<form action="{{ route('pengajuan-surat.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Nama Lengkap</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $user->name }}" required>
    </div>

    <div class="form-group">
        <label for="nomor_induk">Nomor Induk</label>
        <input type="text" class="form-control" id="nomor_induk" name="nomor_induk" value="{{ old('nomor_induk') ?? $user->nomor_induk }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?? $user->email }}" required>
    </div>

    <div class="form-group">
        <label for="kelas">Kelas</label>
        <select class="form-control" id="kelas" name="kelas" required>
            <option value="VII" {{ old('kelas') == 'VII' ? 'selected' : '' }}>VII</option>
            <option value="VIII" {{ old('kelas') == 'VIII' ? 'selected' : '' }}>VIII</option>
            <option value="IX" {{ old('kelas') == 'IX' ? 'selected' : '' }}>IX</option>
        </select>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') ?? $user->tempat_lahir }}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') ?? $user->tanggal_lahir }}" required>
        </div>
    </div>

    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" style="resize: none" name="alamat" id="alamat" rows="2" required>{{ old('alamat') ?? $user->alamat }}</textarea>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="jenis_surat">Jenis Surat</label>
            <select class="form-control" id="jenis_surat" name="jenis_surat" required>
                <option value="Surat Keterangan Aktif Sekolah">Surat Keterangan Aktif Sekolah</option>
                <option value="Surat Keterangan Masih Sekolah">Surat Keterangan Masih Sekolah</option>
                <option value="Surat Keterangan Berkelakuan Baik">Surat Keterangan Berkelakuan Baik</option>
                <option value="Surat Keterangan Tidak Menerima Beasiswa">Surat Keterangan Tidak Menerima Beasiswa</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="tujuan">Tujuan</label>
        <textarea class="form-control" style="resize: none" name="tujuan" id="tujuan" rows="1">{{ old('tujuan') ?? '' }}</textarea>
        </div>
    </div>

    

    <div class="d-flex justify-content-end my-3">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="ml-2 btn btn-primary">Ajukan Surat</button>
    </div>
</form>

@endsection