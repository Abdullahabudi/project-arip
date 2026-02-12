<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold text-dark mb-0">
            {{ __('Detail Peminjaman') }}
        </h2>
    </x-slot>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title mb-0">Detail Peminjaman</h5>
                <a class="btn btn-secondary" href="{{ route('peminjaman.index') }}"> Kembali</a>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-borderless">
                        <tr>
                            <th width="200px">Nama Pengguna</th>
                            <td>: {{ $peminjaman->borrower_name }}</td>
                        </tr>
                        <tr>
                            <th>Motor</th>
                            <td>: {{ $peminjaman->motor->brand }} - {{ $peminjaman->motor->model }}
                                ({{ $peminjaman->motor->plate_number }})</td>
                        </tr>
                        <tr>
                            <th>Tanggal Mulai</th>
                            <td>: {{ $peminjaman->start_date }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Selesai</th>
                            <td>: {{ $peminjaman->end_date }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                :
                                @if($peminjaman->status == 'active')
                                    <span class="badge bg-primary">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Dikembalikan</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Catatan</th>
                            <td>: {{ $peminjaman->notes ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>