<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold text-dark mb-0">
            {{ __('Detail Motor') }}
        </h2>
    </x-slot>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title mb-0">Detail Motor</h5>
                <a class="btn btn-secondary" href="{{ route('motors.index') }}"> Kembali</a>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-borderless">
                        <tr>
                            <th width="150px">Plat Nomor</th>
                            <td>: {{ $motor->plate_number }}</td>
                        </tr>
                        <tr>
                            <th>Merk</th>
                            <td>: {{ $motor->brand }}</td>
                        </tr>
                        <tr>
                            <th>Model</th>
                            <td>: {{ $motor->model }}</td>
                        </tr>
                        <tr>
                            <th>Tahun</th>
                            <td>: {{ $motor->year }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                :
                                @if($motor->status == 'available')
                                    <span class="badge bg-success">Tersedia</span>
                                @else
                                    <span class="badge bg-warning text-dark">Dipinjam</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>