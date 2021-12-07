@extends('layouts.template')

@section('title', 'Kelola User')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('user.create') }}" class="btn btn-primary">+ Tambah User</a>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span>{{ $message }}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif ($message = Session::get('update'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <span>{{ $message }}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif ($message = Session::get('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
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
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Email</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
        <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->roles[0]->name }}</td>
            <td>
                <button type="button" class="btn btn-sm btn-info" title="Detail" data-toggle="modal"
                    data-target="#userDetail-{{ $user->id }}">
                    <i class="fas fa-eye"></i>
                </button>
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning" title="Edit"><i
                        class="fas fa-edit"></i></a>
                <form class="d-inline" action="{{ route('user.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus"><i
                            class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center p-3">User Tidak Tersedia</td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- User Detail -->
@foreach ($users as $user)
<div class="modal fade" id="userDetail-{{ $user->id }}" tabindex="-1" aria-labelledby="userDetailLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userDetailLabel">User Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Induk</th>
                            <td>{{ $user->nomor_induk }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td>{{ $user->roles[0]->name }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $user->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td>{{ $user->agama }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>{{ str_replace('-', ' ', date('d-F-Y', strtotime($user->tanggal_lahir))) }}</td>
                        </tr>
                        <tr>
                            <th>Tempat Lahir</th>
                            <td>{{ $user->tempat_lahir }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $user->alamat }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection