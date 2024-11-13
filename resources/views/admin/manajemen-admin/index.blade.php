@extends('admin.layout')

@section('content')

<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('petugas.create') }}" class="btn btn-primary">+ Tambah Petugas / Admin</a>
        </div>

        <h4 class="card-title">Admin Management</h4>
        <h6 class="card-subtitle mb-3">Lihat data admin / petugas yang tersedia disini.</h6>

        <div class="table-responsive">
            <table class="table table-striped table-bordered text-nowrap">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Dibuat pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($petugas as $index => $item)
                        <tr>
                            <td>{{ $petugas->firstItem() + $index }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->created_at->format('Y-m-d') ?? 'N/A' }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('petugas.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('petugas.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus petugas ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $petugas->links() }}
        </div>
    </div>
</div>

@endsection
