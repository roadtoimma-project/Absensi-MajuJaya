@extends('layouts.app')

@section('content')

<h2>Data Karyawan</h2>

<a href="/karyawan/create" class="btn btn-primary mb-3">Tambah Karyawan</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jabatan</th>
        <th>No HP</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>

    @foreach($karyawan as $k)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $k->user->nama }}</td>
        <td>{{ $k->user->email }}</td>
        <td>{{ $k->jabatan }}</td>
        <td>{{ $k->no_hp }}</td>
        <td>{{ $k->alamat }}</td>
        <td>
            <a href="/karyawan/edit/{{ $k->id }}" class="btn btn-warning btn-sm">Edit</a>

            <form action="/karyawan/delete/{{ $k->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection