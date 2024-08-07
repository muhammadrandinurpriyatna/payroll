@extends('layouts.dashboard', [
    'menuActive' => 'user'
])

@section('content')
    <div class="row my-3">
        @include('components.error-message')
    </div>
    <form action="{{ route('user.add') }}" method="post" class="row bg-white my-3 p-3 rounded">
        @csrf
        <div class="col-md-12 my-3">
            <label>Nama</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="col-md-12 my-3">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="col-md-12 my-3">
            <label>Role</label>
            <select class="form-control" name="role" required>
                <option value="pegawai" {{ old('role') == 'pegawai' ? 'selected' : '' }}>Pegawai</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        <div class="col-md-12 my-3">
            <label>Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <div class="col-md-2 my-3">
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection