<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 font-weight-bold text-dark mb-0">
                <i class="bi bi-pencil-square me-2"></i>{{ __('Edit Peminjaman') }}
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

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4" role="alert">
                            <div class="d-flex">
                                <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>
                                <div>
                                    <strong>Ada yang salah!</strong> Silakan periksa input Anda.<br>
                                    <ul class="mb-0 mt-2">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="borrower_name" id="borrower_name"
                                        class="form-control rounded-3" placeholder="Nama Peminjam"
                                        value="{{ $peminjaman->borrower_name }}">
                                    <label for="borrower_name"><i class="bi bi-person me-1"></i> Nama Peminjam</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="motor_id" id="motor_id" class="form-select rounded-3">
                                        @foreach($motors as $motor)
                                            <option value="{{ $motor->id }}" {{ $peminjaman->motor_id == $motor->id ? 'selected' : '' }}>
                                                {{ $motor->brand }} {{ $motor->model }} - {{ $motor->plate_number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="motor_id"><i class="bi bi-bicycle me-1"></i> Motor</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="start_date" id="start_date" class="form-control rounded-3"
                                        placeholder="Tanggal Mulai" value="{{ $peminjaman->start_date }}">
                                    <label for="start_date"><i class="bi bi-calendar-plus me-1"></i> Tanggal
                                        Mulai</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="end_date" id="end_date" class="form-control rounded-3"
                                        placeholder="Tanggal Selesai" value="{{ $peminjaman->end_date }}">
                                    <label for="end_date"><i class="bi bi-calendar-check me-1"></i> Tanggal
                                        Selesai</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select rounded-3" name="status" id="status">
                                        <option value="active" {{ $peminjaman->status == 'active' ? 'selected' : '' }}>
                                            Aktif</option>
                                        <option value="returned" {{ $peminjaman->status == 'returned' ? 'selected' : '' }}>Dikembalikan</option>
                                    </select>
                                    <label for="status"><i class="bi bi-info-circle me-1"></i> Status</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control rounded-3" name="notes" id="notes"
                                        style="height: 100px" placeholder="Catatan">{{ $peminjaman->notes }}</textarea>
                                    <label for="notes"><i class="bi bi-sticky me-1"></i> Catatan</label>
                                </div>
                            </div>

                            <div class="col-12 mt-4 text-end">
                                <button type="submit" class="btn btn-primary btn-lg rounded-3 px-5 shadow-sm">
                                    <i class="bi bi-arrow-repeat me-2"></i> Perbarui
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>