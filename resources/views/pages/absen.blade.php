@extends('layouts.dashboard', [
    'menuActive' => 'absen'
])

@section('content')
    <div class="row my-3">
        @include('components.error-message')
    </div>
    <form action="{{ route('absen') }}" id="absenForm" method="post" class="row my-3">
    @csrf
        <div class="col-md-12 my-3">
            <label>Masukkan NIP untuk Absensi</label>
            <input type="number" class="form-control" name="nip" value="{{ old('nip') }}" required>
        </div>
        <div class="col-md-2 my-3">
            <button class="btn btn-primary">Absen</button>
        </div>
    </form>
@endsection

@section('before-body-end')
    <script>
        document.getElementById('absenForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let now = new Date();
            let formattedDate = now.toLocaleDateString('id-ID');
            let formattedTime = now.toLocaleTimeString('id-ID');

            Swal.fire({
                title: 'Konfirmasi Absen',
                text: `Apakah Anda yakin akan absen jam ${formattedTime} pada tanggal ${formattedDate}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Absen',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('absenForm').submit();
                }
            });
        });
    </script>
@endsection