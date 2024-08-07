@extends('layouts.auth')

@section('content')
    @include('components.error-message')
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <h2>Welcome Back!</h2>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input id="email" name="email" type="text" class="form-control" placeholder="Email"
                        value="{{ old('email') }}" autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-4">
                    <button class="btn bg-black text-white w-100">Log In</button>
                </div>
            </div>
        </div>
    </form>
@endsection
