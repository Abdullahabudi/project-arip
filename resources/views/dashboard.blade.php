<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold text-dark mb-0">
            {{ __('Dashboard Overview') }}
        </h2>
    </x-slot>

    <div class="row g-4 mb-4">
        <!-- Welcome Card -->
        <div class="col-12">
            <div class="card bg-primary text-white border-0 shadow-lg overflow-hidden position-relative"
                style="background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);">
                <div class="card-body p-5 position-relative z-1">
                    <h1 class="display-5 fw-bold mb-3">Selamat Datang, {{ Auth::user()->name }}! 👋</h1>
                    <p class="lead mb-4 opacity-90" style="max-width: 600px;">
                        Kelola data motor dan peminjaman dengan mudah dan efisien. Pantau statistik terkini langsung
                        dari dashboard ini.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('peminjaman.create') }}"
                            class="btn btn-light text-primary px-4 py-2 fw-bold shadow-sm">
                            <i class="bi bi-plus-lg me-2"></i> Peminjaman Baru
                        </a>
                        <a href="{{ route('motors.index') }}" class="btn btn-outline-light px-4 py-2 fw-bold">
                            Lihat Data Motor
                        </a>
                    </div>
                </div>
                <!-- Abstract Decoration -->
                <div class="position-absolute top-0 end-0 h-100 w-50 d-none d-lg-block"
                    style="background: radial-gradient(circle at center, rgba(255,255,255,0.1) 0%, transparent 70%); transform: translate(20%, -20%);">
                </div>
                <div class="position-absolute bottom-0 end-0 h-100 w-25 d-none d-lg-block"
                    style="background: radial-gradient(circle at center, rgba(255,255,255,0.1) 0%, transparent 70%); transform: translate(10%, 40%);">
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="rounded-circle bg-indigo-50 p-3 text-primary bg-opacity-10 me-3">
                        <i class="bi bi-bicycle fs-2 text-primary"></i>
                    </div>
                    <div>
                        <p class="text-muted small text-uppercase fw-bold mb-1">Total Motor</p>
                        <h3 class="fw-bold mb-0">{{ \App\Models\Motor::count() }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="rounded-circle bg-success-50 p-3 text-success bg-opacity-10 me-3">
                        <i class="bi bi-check-circle fs-2 text-success"></i>
                    </div>
                    <div>
                        <p class="text-muted small text-uppercase fw-bold mb-1">Motor Tersedia</p>
                        <h3 class="fw-bold mb-0">{{ \App\Models\Motor::where('status', 'available')->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="rounded-circle bg-warning-50 p-3 text-warning bg-opacity-10 me-3">
                        <i class="bi bi-hourglass-split fs-2 text-warning"></i>
                    </div>
                    <div>
                        <p class="text-muted small text-uppercase fw-bold mb-1">Sedang Dipinjam</p>
                        <h3 class="fw-bold mb-0">{{ \App\Models\Peminjaman::where('status', 'active')->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>