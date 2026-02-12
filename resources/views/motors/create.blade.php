<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 font-weight-bold text-dark mb-0">
                <i class="bi bi-plus-circle me-2"></i>{{ __('Tambah Motor Baru') }}
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

                    <form action="{{ route('motors.store') }}" method="POST">
                        @csrf

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="plate_number" id="plate_number"
                                        class="form-control rounded-3" placeholder="Plat Nomor"
                                        value="{{ old('plate_number') }}">
                                    <label for="plate_number"><i class="bi bi-card-text me-1"></i> Plat Nomor</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="brand" id="brand" class="form-control rounded-3"
                                        placeholder="Merk" value="{{ old('brand') }}">
                                    <label for="brand"><i class="bi bi-tag me-1"></i> Merk</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="model" id="model" class="form-control rounded-3"
                                        placeholder="Model" value="{{ old('model') }}">
                                    <label for="model"><i class="bi bi-bicycle me-1"></i> Model</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" name="year" id="year" class="form-control rounded-3"
                                        placeholder="Tahun" value="{{ old('year') }}" min="1900"
                                        max="{{ date('Y') + 1 }}">
                                    <label for="year"><i class="bi bi-calendar-event me-1"></i> Tahun</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select rounded-3" name="status" id="status">
                                        <option value="available" selected>Tersedia</option>
                                        <option value="borrowed">Dipinjam</option>
                                    </select>
                                    <label for="status"><i class="bi bi-info-circle me-1"></i> Status</label>
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