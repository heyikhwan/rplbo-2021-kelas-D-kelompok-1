@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                @hasrole('Siswa|Alumni')
                    <h3>{{ $jml_pengajuan_surat }}</h3>
                    <p>Pengajuan Surat</p>
                @endhasrole

                @unlessrole('Siswa|Alumni')
                    <h3>{{ $jml_permintaan_surat }}</h3>
                    <p>Permintaan Surat</p>
                @endunlessrole
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                @hasrole('Siswa|Alumni')
                    <h3>{{ $jml_pengajuan_legalisir }}</h3>
                    <p>Pengajuan Legalisir</p>
                @endhasrole

                @unlessrole('Siswa|Alumni')
                    <h3>{{ $jml_permintaan_legalisir }}</h3>
                    <p>Permintaan Legalisir</p>
                @endunlessrole
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                @hasrole('Siswa|Alumni')
                    <h3>{{ $jml_pengajuan_surat + $jml_pengajuan_legalisir }}</h3>
                    <p>Total Pengajuan</p>
                @endhasrole

                @unlessrole('Siswa|Alumni')
                    <h3>{{ $jml_permintaan_surat + $jml_permintaan_legalisir }}</h3>
                    <p>Total Permintaan</p>
                @endunlessrole
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                @hasrole('Siswa|Alumni')
                    <h3>{{ $jml_pengajuan_selesai }}</h3>
                    <p>Pengajuan Selesai</p>
                @endhasrole

                @unlessrole('Siswa|Alumni')
                    <h3>{{ $jml_user }}</h3>
                    <p>User</p>
                @endunlessrole
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>
@endsection