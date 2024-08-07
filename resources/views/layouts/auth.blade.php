<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>Payroll</title>
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
        <link href="{{ asset('css/loader.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('js/loader.js') }}"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/plugins.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/auth-cover.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body class="form">
        <div id="load_screen"> 
            <div class="loader"> 
                <div class="loader-content">
                    <div class="spinner-grow align-self-center"></div>
                </div>
            </div>
        </div>
        <div class="auth-container d-flex">
            <div class="container mx-auto align-self-center">
                <div class="row p-custom justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>