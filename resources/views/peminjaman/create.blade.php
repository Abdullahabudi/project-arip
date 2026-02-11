<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold text-dark mb-0">
            {{ __('Buat Peminjaman Baru') }}
        </h2>
    </x-slot>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title mb-0">Form Peminjaman</h5>
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

            <form action="{{ route('peminjaman.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="user_id" class="form-label">Pengguna</label>
                        <select name="user_id" class="form-select">
                            <option value="">Pilih Pengguna</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="motor_id" class="form-label">Motor</label>
                        <select name="motor_id" class="form-select">
                            <option value="">Pilih Motor</option>
                            @foreach($motors as $motor)
                                <option value="{{ $motor->id }}">{{ $motor->brand }} - {{ $motor->model }}
                                    ({{ $motor->plate_number }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                        <input type="date" name="start_date" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="end_date" class="form-label">Tanggal Selesai</label>
                        <input type="date" name="end_date" class="form-control">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="notes" class="form-label">Catatan</label>
                        <textarea class="form-control" name="notes" rows="3"></textarea>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>