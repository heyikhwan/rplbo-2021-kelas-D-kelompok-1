@extends('layouts.template')

@section('title', 'Edit User')

@section('content')

<form action="{{ route('user.update', $user->id) }}" method="POST">
    @csrf
    @method('put')

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
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>

    <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <select class="form-control" id="jabatan" name="jabatan" required>
            <option value="Siswa" {{ old('jabatan') == 'Siswa' | $user->roles[0]->name == 'Siswa' ? 'selected' : '' }}>Siswa</option>
            <option value="Alumni" {{ old('jabatan') == 'Alumni' | $user->roles[0]->name == 'Alumni' ? 'selected' : '' }}>Alumni</option>
            <option value="Resepsionis" {{ old('jabatan') == 'Resepsionis' | $user->roles[0]->name == 'Resepsionis' ? 'selected' : '' }}>Resepsionis</option>
            <option value="Staff Tata Usaha" {{ old('jabatan') == 'Staff Tata Usaha' | $user->roles[0]->name == 'Staff Tata Usaha' ? 'selected' : '' }}>Staff Tata Usaha</option>
            <option value="Kepala Tata Usaha" {{ old('jabatan') == 'Kepala Tata Usaha' | $user->roles[0]->name == 'Kepala Tata Usaha' ? 'selected' : '' }}>Kepala Tata Usaha</option>
            <option value="Kepala Sekolah" {{ old('jabatan') == 'Kepala Sekolah' | $user->roles[0]->name == 'Kepala Sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
        </select>
    </div>

    <div class="form-group">
        <label class="d-block">Jenis Kelamin</label>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="pria" name="jenis_kelamin" value="Pria" class="custom-control-input" {{ old('jenis_kelamin') == 'Pria' | $user->jenis_kelamin == 'Pria' ? 'checked' : '' }} required>
            <label class="custom-control-label" for="pria">Pria</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="wanita" value="Wanita" name="jenis_kelamin" class="custom-control-input" {{ old('jenis_kelamin') == 'Wanita' | $user->jenis_kelamin == 'Wanita' ? 'checked' : '' }} required>
            <label class="custom-control-label" for="wanita">Wanita</label>
        </div>
    </div>

    <div class="form-group">
        <label for="agama">Agama</label>
        <select class="form-control" id="agama" name="agama" required>
            <option value="Islam" {{ old('agama') == 'Islam' | $user->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
            <option value="Kristen" {{ old('agama') == 'Kristen' | $user->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
            <option value="Katolik" {{ old('agama') == 'Katolik' | $user->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
            <option value="Buddha" {{ old('agama') == 'Buddha' | $user->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
            <option value="Hindu" {{ old('agama') == 'Hindu' | $user->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
            <option value="Konghucu" {{ old('agama') == 'Konghucu' | $user->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
        </select>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="{{ old('tempat_lahir') ?? $user->tempat_lahir }}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ old('tanggal_lahir') ?? $user->tanggal_lahir }}" required>
        </div>
    </div>

    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" style="resize: none" name="alamat" id="alamat" cols="3" required>{{ old('alamat') ?? $user->alamat }}</textarea>
    </div>

    <div class="d-flex justify-content-end my-3">
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="ml-2 btn btn-primary">Simpan</button>
    </div>
</form>

@endsection