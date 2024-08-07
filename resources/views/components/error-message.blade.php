@if (session('success'))
    <div class="alert alert-dismissible fade show border-0 mb-4 alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-dismissible fade show border-0 mb-4 alert-danger">
        {{ session('error') }}
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-dismissible fade show border-0 mb-4 alert-warning">
        {{ session('warning') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-dismissible fade show border-0 mb-4 alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif