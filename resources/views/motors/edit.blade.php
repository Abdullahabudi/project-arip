<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold text-dark mb-0">
            {{ __('Edit Motor') }}
        </h2>
    </x-slot>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title mb-0">Form Edit Motor</h5>
                <a class="btn btn-secondary" href="{{ route('motors.index') }}"> Kembali</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('motors.update', $motor->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="plate_number" class="form-label">Plat Nomor</label>
                        <input type="text" name="plate_number" value="{{ $motor->plate_number }}" class="form-control"
                            placeholder="Contoh: B 1234 XYZ">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="brand" class="form-label">Merk</label>
                        <input type="text" name="brand" value="{{ $motor->brand }}" class="form-control"
                            placeholder="Contoh: Honda">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" name="model" value="{{ $motor->model }}" class="form-control"
                            placeholder="Contoh: Vario 150">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="year" class="form-label">Tahun</label>
                        <input type="number" name="year" value="{{ $motor->year }}" class="form-control"
                            placeholder="Contoh: 2023" min="1900" max="{{ date('Y') + 1 }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option value="available" {{ $motor->status == 'available' ? 'selected' : '' }}>Tersedia
                            </option>
                            <option value="borrowed" {{ $motor->status == 'borrowed' ? 'selected' : '' }}>Dipinjam
                            </option>
                        </select>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>