<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 font-weight-bold text-dark mb-0">
                <i class="bi bi-plus-circle me-2"></i>{{ __('Tambah Peminjaman Baru') }}
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

                    <form action="{{ route('peminjaman.store') }}" method="POST">
                        @csrf

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="borrower_name" id="borrower_name"
                                        class="form-control rounded-3" placeholder="Nama Peminjam"
                                        value="{{ old('borrower_name') }}">
                                    <label for="borrower_name"><i class="bi bi-person me-1"></i> Nama Peminjam</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="motor_id" id="motor_id" class="form-select rounded-3">
                                        <option value="">Pilih Motor</option>
                                        @foreach($motors as $motor)
                                            <option value="{{ $motor->id }}">
                                                {{ $motor->brand }} {{ $motor->model }} - {{ $motor->plate_number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="motor_id"><i class="bi bi-bicycle me-1"></i> Pilih Motor</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="start_date" id="start_date" class="form-control rounded-3"
                                        placeholder="Tanggal Mulai" value="{{ old('start_date') }}">
                                    <label for="start_date"><i class="bi bi-calendar-plus me-1"></i> Tanggal
                                        Mulai</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="end_date" id="end_date" class="form-control rounded-3"
                                        placeholder="Tanggal Selesai" value="{{ old('end_date') }}">
                                    <label for="end_date"><i class="bi bi-calendar-check me-1"></i> Tanggal
                                        Selesai</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control rounded-3" name="notes" id="notes"
                                        style="height: 100px" placeholder="Catatan">{{ old('notes') }}</textarea>
                                    <label for="notes"><i class="bi bi-sticky me-1"></i> Catatan</label>
                                </div>
                            </div>

                            <div class="col-12 mt-4 text-end">
                                <button type="reset" class="btn btn-light btn-lg me-2 rounded-3">
                                    <i class="bi bi-arrow-counterclockwise"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-primary btn-lg rounded-3 px-5 shadow-sm">
                                    <i class="bi bi-save me-2"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>