<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 font-weight-bold text-dark mb-0">
                <i class="bi bi-info-circle me-2"></i>{{ __('Detail Motor') }}
            </h2>
            <a class="btn btn-outline-secondary d-flex align-items-center gap-2 shadow-sm"
                href="{{ route('motors.index') }}">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-5">

                    <div class="row align-items-center mb-4">
                        <div class="col-auto">
                            <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                                <i class="bi bi-bicycle fs-1"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="fw-bold mb-1">{{ $motor->brand }} {{ $motor->model }}</h3>
                            <span class="text-muted d-block">{{ $motor->plate_number }}</span>
                        </div>
                        <div class="col-auto">
                            @if($motor->status == 'available')
                                <span
                                    class="badge bg-success-subtle text-success border border-success px-4 py-2 rounded-pill fs-6">
                                    <i class="bi bi-check-circle me-2"></i> Tersedia
                                </span>
                            @else
                                <span
                                    class="badge bg-warning-subtle text-warning border border-warning px-4 py-2 rounded-pill fs-6">
                                    <i class="bi bi-clock-history me-2"></i> Dipinjam
                                </span>
                            @endif
                        </div>
                    </div>

                    <hr class="border-secondary opacity-10 my-4">

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="p-4 rounded-4 bg-light h-100 border">
                                <p class="text-muted small text-uppercase fw-bold mb-2">Informasi Kendaraan</p>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-secondary">Plat Nomor</span>
                                    <span class="fw-bold">{{ $motor->plate_number }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-secondary">Merk</span>
                                    <span class="fw-bold">{{ $motor->brand }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-secondary">Model</span>
                                    <span class="fw-bold">{{ $motor->model }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Tahun</span>
                                    <span class="fw-bold">{{ $motor->year }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-4 rounded-4 bg-light h-100 border">
                                <p class="text-muted small text-uppercase fw-bold mb-2">Status Peminjaman</p>
                                @if($motor->peminjaman->where('status', 'active')->count() > 0)
                                    @php $activeLoan = $motor->peminjaman->where('status', 'active')->first(); @endphp
                                    <div class="alert alert-info border-0 bg-info-subtle text-info-emphasis mb-0 rounded-3">
                                        <i class="bi bi-person-circle me-2"></i>
                                        Sedang dipinjam oleh <strong>{{ $activeLoan->borrower_name }}</strong>
                                        <br>
                                        <small class="ms-4">Sejak: {{ $activeLoan->start_date }}</small>
                                    </div>
                                @else
                                    <div class="text-center text-muted py-3">
                                        <i class="bi bi-check-circle fs-2 d-block mb-2 text-success opacity-50"></i>
                                        Tidak ada peminjaman aktif.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>