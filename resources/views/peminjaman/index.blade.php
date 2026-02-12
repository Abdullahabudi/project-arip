<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 font-weight-bold text-dark mb-0">
                <i class="bi bi-card-checklist me-2"></i> {{ __('Data Peminjaman') }}
            </h2>
            <a href="{{ route('peminjaman.create') }}"
                class="btn btn-primary d-flex align-items-center gap-2 shadow-sm">
                <i class="bi bi-plus-lg"></i> Tambah Peminjaman
            </a>
        </div>
    </x-slot>

    <div class="card shadow border-0 rounded-4">
        <div class="card-body p-4">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-3" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive rounded-3">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-secondary">
                        <tr>
                            <th class="py-3 ps-4 rounded-start-3">No</th>
                            <th class="py-3">Peminjam</th>
                            <th class="py-3">Motor</th>
                            <th class="py-3">Tanggal Mulai</th>
                            <th class="py-3">Tanggal Selesai</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 pe-4 text-center rounded-end-3" width="200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peminjamans as $peminjaman)
                            <tr>
                                <td class="ps-4 fw-bold text-secondary">{{ $loop->iteration }}</td>
                                <td class="fw-medium">{{ $peminjaman->borrower_name }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-light rounded p-1 me-2 text-secondary">
                                            <i class="bi bi-bicycle"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark">{{ $peminjaman->motor->brand }}
                                                {{ $peminjaman->motor->model }}</div>
                                            <small class="text-muted">{{ $peminjaman->motor->plate_number }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $peminjaman->start_date }}</td>
                                <td>{{ $peminjaman->end_date }}</td>
                                <td>
                                    @if($peminjaman->status == 'active')
                                        <span
                                            class="badge bg-primary-subtle text-primary border border-primary px-3 py-2 rounded-pill">
                                            <i class="bi bi-hourglass-split me-1"></i> Aktif
                                        </span>
                                    @else
                                        <span
                                            class="badge bg-secondary-subtle text-secondary border border-secondary px-3 py-2 rounded-pill">
                                            <i class="bi bi-check-all me-1"></i> Dikembalikan
                                        </span>
                                    @endif
                                </td>
                                <td class="pe-4 text-center">
                                    <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="POST">
                                        <div class="btn-group shadow-sm" role="group">
                                            <a class="btn btn-outline-info btn-sm"
                                                href="{{ route('peminjaman.show', $peminjaman->id) }}" title="Lihat">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a class="btn btn-outline-primary btn-sm"
                                                href="{{ route('peminjaman.edit', $peminjaman->id) }}" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="bi bi-clipboard-x fs-1 d-block mb-3"></i>
                                    Belum ada data peminjaman.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-4">
                {!! $peminjamans->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
</x-app-layout>