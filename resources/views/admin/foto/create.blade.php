@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Tambah Foto</h4>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('foto.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label for="galery_id" class="form-label">Galeri</label>
                <select name="galery_id" id="galery_id" class="form-control" required>
                    <option value="">Pilih Galeri</option>
                    @foreach($galeris as $galeri)
                        <option value="{{ $galeri->id }}">
                            {{ $galeri->post->judul ?? 'Galeri #' . $galeri->id }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Foto</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">File Foto</label>
                <input type="file" class="form-control" id="file" name="file" accept="image/*" required>
                <small class="text-muted">Format: JPG, JPEG, PNG, GIF. Maksimal 2MB</small>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('foto.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
