<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 font-weight-bold text-dark mb-0">
                <i class="bi bi-info-circle me-2"></i>{{ __('Detail Peminjaman') }}
            </h2>
            <a class="btn btn-outline-secondary d-flex align-items-center gap-2 shadow-sm"
                href="{{ route('peminjaman.index') }}">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-5">

                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary me-3">
                            <i class="bi bi-person-badge fs-2"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-1">{{ $peminjaman->borrower_name }}</h3>
                            <span class="text-muted">ID Peminjaman: #{{ $peminjaman->id }}</span>
                        </div>
                        <div class="ms-auto">
                            @if($peminjaman->status == 'active')
                                <span
                                    class="badge bg-primary-subtle text-primary border border-primary px-4 py-2 rounded-pill fs-6">
                                    <i class="bi bi-hourglass-split me-2"></i> Aktif
                                </span>
                            @else
                                <span
                                    class="badge bg-secondary-subtle text-secondary border border-secondary px-4 py-2 rounded-pill fs-6">
                                    <i class="bi bi-check-all me-2"></i> Dikembalikan
                                </span>
                            @endif
                        </div>
                    </div>

                    <hr class="border-secondary opacity-10 my-4">

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="p-4 rounded-4 bg-light h-100 border">
                                <p class="text-muted small text-uppercase fw-bold mb-3"><i
                                        class="bi bi-bicycle me-1"></i> Detail Kendaraan</p>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-secondary">Merk</span>
                                    <span class="fw-bold">{{ $peminjaman->motor->brand }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-secondary">Model</span>
                                    <span class="fw-bold">{{ $peminjaman->motor->model }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Plat Nomor</span>
                                    <span class="fw-bold">{{ $peminjaman->motor->plate_number }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-4 rounded-4 bg-light h-100 border">
                                <p class="text-muted small text-uppercase fw-bold mb-3"><i
                                        class="bi bi-calendar-range me-1"></i> Durasi Peminjaman</p>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-secondary">Mulai</span>
                                    <span class="fw-bold">{{ $peminjaman->start_date }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-secondary">Selesai</span>
                                    <span class="fw-bold">{{ $peminjaman->end_date }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="p-4 rounded-4 bg-light border">
                                <p class="text-muted small text-uppercase fw-bold mb-2"><i
                                        class="bi bi-sticky me-1"></i> Catatan</p>
                                <p class="mb-0 text-dark">{{ $peminjaman->notes ?? 'Tidak ada catatan.' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>