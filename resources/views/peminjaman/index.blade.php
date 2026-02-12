<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold text-dark mb-0">
            {{ __('Data Peminjaman') }}
        </h2>
    </x-slot>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">Daftar Peminjaman</h5>
                <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">Buat Peminjaman Baru</a>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Pengguna</th>
                            <th>Motor</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th width="280px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjamans as $peminjaman)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $peminjaman->borrower_name }}</td>
                                <td>{{ $peminjaman->motor->brand }} - {{ $peminjaman->motor->plate_number }}</td>
                                <td>{{ $peminjaman->start_date }}</td>
                                <td>{{ $peminjaman->end_date }}</td>
                                <td>
                                    @if($peminjaman->status == 'active')
                                        <span class="badge bg-primary">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Dikembalikan</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="POST">
                                        <a class="btn btn-info btn-sm text-white"
                                            href="{{ route('peminjaman.show', $peminjaman->id) }}">
                                            Lihat
                                        </a>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('peminjaman.edit', $peminjaman->id) }}">
                                            Edit
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3">
                {!! $peminjamans->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
</x-app-layout>