@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="container-fluid px-4">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                    <span class="d-block">{{ session('success') }}</span>
                </div>
            @endif

            <h1 class="mt-4">Alumni</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Alumni</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-list"></i> Alumni
                </div>
                <div class="card-body">
                    <a href="{{ route('alumni.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i>
                        Tambahkan Data Alumni</a>
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Alumni</th>
                                    <th>Foto Alumni</th>
                                    <th>Tahun Kelulusan</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Kelahiran</th>
                                    <th>Link Instagram</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alumnis as $alumni)
                                    <tr>
                                        <td>{{ $alumni->id }}</td>
                                        <td>{{ $alumni->nama_alumni }}</td>
                                        <td>
                                            @if ($alumni->foto_alumni)
                                                <img src="{{ asset('storage/' . $alumni->foto_alumni) }}"
                                                    alt="{{ $alumni->nama_alumni }}" width="50">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>{{ $alumni->tahun_kelulusan }}</td>
                                        <td>{{ $alumni->kelas }}</td>
                                        <td>{{ $alumni->kelahiran }}</td>
                                        <td>
                                            @if ($alumni->link_instagram)
                                                <a href="{{ $alumni->link_instagram }}"
                                                    target="_blank">{{ $alumni->link_instagram }}</a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('alumni.edit', $alumni->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('alumni.destroy', $alumni->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
