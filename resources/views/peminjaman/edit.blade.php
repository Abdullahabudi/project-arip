<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold text-dark mb-0">
            {{ __('Edit Peminjaman') }}
        </h2>
    </x-slot>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title mb-0">Edit Peminjaman</h5>
                <a class="btn btn-secondary" href="{{ route('peminjaman.index') }}"> Kembali</a>
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

            <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="borrower_name" class="form-label">Pengguna</label>
                        <input type="text" name="borrower_name" value="{{ $peminjaman->borrower_name }}"
                            class="form-control" placeholder="Nama Peminjam">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="motor_id" class="form-label">Motor</label>
                        <select name="motor_id" class="form-select">
                            @foreach($motors as $motor)
                                <option value="{{ $motor->id }}" {{ $peminjaman->motor_id == $motor->id ? 'selected' : '' }}>
                                    {{ $motor->brand }} - {{ $motor->model }} ({{ $motor->plate_number }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                        <input type="date" name="start_date" value="{{ $peminjaman->start_date }}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="end_date" class="form-label">Tanggal Selesai</label>
                        <input type="date" name="end_date" value="{{ $peminjaman->end_date }}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option value="active" {{ $peminjaman->status == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="returned" {{ $peminjaman->status == 'returned' ? 'selected' : '' }}>
                                Dikembalikan</option>
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="notes" class="form-label">Catatan</label>
                        <textarea class="form-control" name="notes" rows="3">{{ $peminjaman->notes }}</textarea>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>