@extends('layouts.template')

@section('title', 'Pengajuan Legalisir')

@section('content')

<form action="{{ route('pengajuan-legalisir.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Nama Lengkap</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $user->name }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?? $user->email }}" required>
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
            <input type="hidden" name="jenis_surat" value="Legalisir">
            <select class="form-control" id="jenis_surat" name="jenis_surat" disabled>
                <option value="Legalisir" selected>Legalisir</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="tujuan">Tujuan</label>
        <textarea class="form-control" style="resize: none" name="tujuan" id="tujuan" rows="1">{{ old('tujuan') ?? '' }}</textarea>
        </div>
    </div>

    <div class="d-flex justify-content-end my-3">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="ml-2 btn btn-primary">Ajukan Legalisir</button>
    </div>
</form>

@endsection