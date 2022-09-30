@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <div class="me-auto">
                        <h5 class="text-bold mt-2">Master Jurusan</h5>
                    </div>
                    <div>
                        <a href="{{ route('jurusan.create') }}" class="btn btn-primary">Tambah Jurusan</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table table-responsive" style="overflow-x: hidden;">
                        <!-- Strutktur tabel -->
                        <table class="table table-stripped" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Jurusan</th>
                                    <th>Nama Jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
@endpush

@push('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('jurusan.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'kode_jurusan',
                    name: 'kode_jurusan'
                },
                {
                    data: 'nama_jurusan',
                    name: 'nama_jurusan'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ],
            "pageLength": 5,
                // 
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                // Mengkostum kolom Showing 1 to 2 of 2 entries menjadi Bahasa Indonesia
                "language": {
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                    "infoFiltered": "(disaring dari _MAX_ total data)",
                    "lengthMenu": "Menampilkan _MENU_ data",
                    "search": "Cari:",
                    "zeroRecords": "Tidak ada data yang sesuai",
                    "paginate": {
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                },
        });
    });
</script>
@endpush

@endsection