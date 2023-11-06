@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="container-fluid px-4 pt-3">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Edit Alumni</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('alumni.update', $alumni->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_alumni">Nama Alumni</label>
                            <input type="text" class="form-control" id="nama_alumni" name="nama_alumni"
                                value="{{ old('nama_alumni', $alumni->nama_alumni) }}">
                            @error('nama_alumni')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="foto_alumni">Foto Alumni</label>
                            <input type="file" class="form-control" id="foto_alumni" name="foto_alumni"
                                onchange="loadFile(event)">
                            @error('foto_alumni')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="col-lg-12 justify-content-center d-flex">
                                <img id="output" width="50%" height="50%"
                                    src="{{ asset('storage/' . $alumni->foto_alumni) }}" alt="{{ $alumni->nama_alumni }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tahun_kelulusan">Tahun Kelulusan</label>
                            <input type="text" class="form-control" id="tahun_kelulusan" name="tahun_kelulusan"
                                value="{{ old('tahun_kelulusan', $alumni->tahun_kelulusan) }}">
                            @error('tahun_kelulusan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas"
                                value="{{ old('kelas', $alumni->kelas) }}">
                            @error('kelas')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kelahiran">Tanggal Kelahiran</label>
                            <input type="date" class="form-control" id="kelahiran" name="kelahiran"
                                value="{{ old('kelahiran', $alumni->kelahiran) }}">
                            @error('kelahiran')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="link_instagram">Link Instagram</label>
                            <input type="text" class="form-control" id="link_instagram" name="link_instagram"
                                value="{{ old('link_instagram', $alumni->link_instagram) }}">
                            @error('link_instagram')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary my-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
