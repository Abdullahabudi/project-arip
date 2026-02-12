<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 font-weight-bold text-dark mb-0">
                <i class="bi bi-speedometer2 me-2"></i>{{ __('Data Motor') }}
            </h2>
            <a href="{{ route('motors.create') }}" class="btn btn-primary d-flex align-items-center gap-2 shadow-sm">
                <i class="bi bi-plus-lg"></i> Tambah Motor
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
                            <th class="py-3">Plat Nomor</th>
                            <th class="py-3">Merk</th>
                            <th class="py-3">Model</th>
                            <th class="py-3">Tahun</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 pe-4 text-center rounded-end-3" width="200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($motors as $motor)
                            <tr>
                                <td class="ps-4 fw-bold text-secondary">{{ $loop->iteration }}</td>
                                <td class="fw-medium">{{ $motor->plate_number }}</td>
                                <td>{{ $motor->brand }}</td>
                                <td>{{ $motor->model }}</td>
                                <td><span class="badge bg-light text-dark border">{{ $motor->year }}</span></td>
                                <td>
                                    @if($motor->status == 'available')
                                        <span
                                            class="badge bg-success-subtle text-success border border-success px-3 py-2 rounded-pill">
                                            <i class="bi bi-check-circle me-1"></i> Tersedia
                                        </span>
                                    @else
                                        <span
                                            class="badge bg-warning-subtle text-warning border border-warning px-3 py-2 rounded-pill">
                                            <i class="bi bi-clock-history me-1"></i> Dipinjam
                                        </span>
                                    @endif
                                </td>
                                <td class="pe-4 text-center">
                                    <form action="{{ route('motors.destroy', $motor->id) }}" method="POST">
                                        <div class="btn-group shadow-sm" role="group">
                                            <a class="btn btn-outline-info btn-sm"
                                                href="{{ route('motors.show', $motor->id) }}" title="Lihat">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a class="btn btn-outline-primary btn-sm"
                                                href="{{ route('motors.edit', $motor->id) }}" title="Edit">
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
                                    <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                    Belum ada data motor.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-4">
                {!! $motors->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
</x-app-layout>