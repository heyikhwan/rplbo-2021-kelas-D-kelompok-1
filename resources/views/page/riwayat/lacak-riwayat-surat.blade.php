@extends('layouts.template')

@section('title', 'Lacak Riwayat Surat')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span>{{ $message }}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Jenis Surat</th>
            <th scope="col">Tujuan</th>
            <th scope="col">Status</th>
            <th scope="col">Tanggal Pengajuan</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($surats as $q)
            <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ $q->surat->jenis_surat }}</td>
                <td>{{ $q->surat->tujuan }}</td>
                <td>
                    @if ($q->surat->status === 'selesai')
                        <span class="badge badge-success">{{ $q->surat->status }}</span>
                    @elseif ($q->surat->status === 'dibatalkan')
                        <span class="badge badge-danger">{{ $q->surat->status }}</span>
                    @elseif ($q->surat->status === 'pengajuan dikirim')
                        <span class="badge badge-secondary">{{ $q->surat->status }}</span>
                    @else
                        <span class="badge badge-warning">{{ $q->surat->status }}</span>
                    @endif
                </td>
                <td>{{ str_replace('-', ' ', date('d-F-Y', strtotime($q->surat->created_at))) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center p-3">Belum ada surat yang diajukan</td>
            </tr>
            
        @endforelse
    </tbody>
</table>
@endsection