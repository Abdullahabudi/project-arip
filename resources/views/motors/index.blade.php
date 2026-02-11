<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold text-dark mb-0">
            {{ __('Data Motor') }}
        </h2>
    </x-slot>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">Daftar Motor</h5>
                <a href="{{ route('motors.create') }}" class="btn btn-primary">Tambah Motor Baru</a>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Plat Nomor</th>
                            <th>Merk</th>
                            <th>Model</th>
                            <th>Tahun</th>
                            <th>Status</th>
                            <th width="280px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($motors as $motor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $motor->plate_number }}</td>
                                <td>{{ $motor->brand }}</td>
                                <td>{{ $motor->model }}</td>
                                <td>{{ $motor->year }}</td>
                                <td>
                                    @if($motor->status == 'available')
                                        <span class="badge bg-success">Tersedia</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Dipinjam</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('motors.destroy', $motor->id) }}" method="POST">
                                        <a class="btn btn-info btn-sm text-white"
                                            href="{{ route('motors.show', $motor->id) }}">
                                            Lihat
                                        </a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('motors.edit', $motor->id) }}">
                                            Edit
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3">
                {!! $motors->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
</x-app-layout>