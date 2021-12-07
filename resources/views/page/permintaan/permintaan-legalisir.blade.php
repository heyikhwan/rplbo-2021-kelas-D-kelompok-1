@extends('layouts.template')

@section('title', 'Permintaan Legalisir')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal Diajukan</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Status</th>
            <th scope="col">Disposisi</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($surats as $q)
        <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{ str_replace('-', ' ', date('d-F-Y', strtotime($q->surat->created_at))) }}</td>
            <td>{{ $q->user->name }}</td>
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
            <td>{{ $q->surat->disposisi }}</td>
            <td>
                <button type="button" class="btn btn-sm btn-info" title="Detail" data-toggle="modal"
                    data-target="#legalisir-{{ $q->id }}">
                    <i class="fas fa-eye"></i>
                </button>

                @role('Kepala Sekolah')
                @if ($q->surat->status === 'menunggu persetujuan kepala sekolah')
                <button type="button" class="btn btn-sm btn-primary" title="Disposisi" data-toggle="modal"
                    data-target="#disposisi-{{ $q->id }}">
                    Disposisi
                </button>
                @endif
                @endrole
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- User Detail -->
@foreach ($surats as $q)
<div class="modal fade" id="legalisir-{{ $q->id }}" tabindex="-1" aria-labelledby="legalisirLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="legalisirLabel">Detail Pengajuan Legalisir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>{{ $q->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $q->user->email }}</td>
                        </tr>
                        <tr>
                            <th>Tempat Lahir</th>
                            <td>{{ $q->user->tempat_lahir }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>{{ str_replace('-', ' ', date('d-F-Y', strtotime($q->user->tanggal_lahir))) }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $q->user->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Tujuan</th>
                            <td>{{ $q->surat->tujuan }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                @role('Resepsionis')
                @if ($q->surat->status === 'pengajuan dikirim')
                <form action="{{ route('resepsionis.rejectLetter', $q->surat_id) }}" method="POST">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-danger">Tolak</button>
                </form>

                <form action="{{ route('resepsionis.accLetter', $q->surat_id) }}" method="POST">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-success">Proses</button>
                </form>
                @endif

                @if ($q->surat->status === 'menunggu persetujuan kepala sekolah')
                <form action="{{ route('resepsionis.legalisir.complete', $q->surat_id) }}" method="POST">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-success">Legalisir Selesai</button>
                </form>
                @endif
                @endrole

                @role('Kepala Tata Usaha')
                    @if ($q->surat->status === 'sedang diproses')
                        <form action="{{ route('ktu.ktuAccLegalization', $q->surat_id) }}" method="POST">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-success">Setujui Legalisir</button>
                        </form>
                    @endif
                @endrole
                
                @role('Kepala Sekolah')
                    @if ($q->surat->status === 'menunggu persetujuan kepala sekolah')
                        <form action="{{ route('ks.legalisir.batalkan', $q->surat_id) }}" method="POST">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-danger">Batalkan</button>
                        </form>
                    @endif
                @endrole
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($surats as $q)
<div class="modal fade" id="disposisi-{{ $q->id }}" tabindex="-1" aria-labelledby="disposisiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="disposisiLabel">Disposisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dispotition.legalisir.update', $q->surat_id) }}" method="POST">
                    @csrf
                    @method('put')

                    <textarea class="form-control" id="disposisi" style="resize: none" 
                        placeholder="Masukkan Disposisi" name="disposisi">{{ $q->surat->disposisi ?? '' }}</textarea>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah Disposisi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection