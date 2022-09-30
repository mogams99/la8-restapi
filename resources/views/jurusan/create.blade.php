@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <h5 class="text-bold mt-2">Form Tambah Jurusan</h5>
                </div>

                <div class="card-body">
                    <!-- Form tambah jurusan  -->
                    <form id="formTambahJurusan">
                        @csrf
                        <div class="form-group">
                            <label for="kode_jurusan">Kode Jurusan</label>
                            <input type="text" name="kode_jurusan" id="kode_jurusan" class="form-control" placeholder="Masukkan kode jurusan" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_jurusan">Nama Jurusan</label>
                            <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" placeholder="Masukkan nama jurusan" required>
                        </div>
                        <div class="form-group d-flex justify-content-between mt-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    /* Ajax untuk proses store jurusan */
    $('#formTambahJurusan').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('jurusan.store') }}",
            method: "POST",
            data: $(this).serialize(),
            success: function(response) {
                if (response.status == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.message,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('jurusan.index') }}";
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.message,
                    });
                }
            }
        });
    });
</script>
@endpush

@endsection