@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="container-fluid px-4 pt-3">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Create Alumni</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('alumni.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="nama_alumni">Nama Alumni</label>
                            <input type="text" class="form-control" id="nama_alumni" name="nama_alumni"
                                value="{{ old('nama_alumni') }}">
                            @error('nama_alumni')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="foto_alumni">Foto Alumni</label>
                            <input type="file" class="form-control" id="foto_alumni" name="foto_alumni" accept="image/*"
                                onchange="loadFile(event)">
                            @error('foto_alumni')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="col-lg-12 justify-content-center d-flex">
                                <img id="output" width="50%" height="50%" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tahun_kelulusan">Tahun Kelulusan</label>
                            <input type="text" class="form-control" id="tahun_kelulusan" name="tahun_kelulusan"
                                value="{{ old('tahun_kelulusan') }}">
                            @error('tahun_kelulusan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tahun_kelulusan">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas"
                                value="{{ old('kelas') }}">
                            @error('kelas')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kelahiran">Tanggal Kelahiran</label>
                            <input type="date" class="form-control" id="kelahiran" name="kelahiran"
                                value="{{ old('kelahiran') }}">
                            @error('kelahiran')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="link_instagram">Link Instagram</label>
                            <input type="text" class="form-control" id="link_instagram" name="link_instagram"
                                value="{{ old('link_instagram') }}">
                            @error('link_instagram')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary my-3">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
