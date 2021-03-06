<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">



<title>{{ config('app.name', 'Laravel') }}</title>

<link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/png">

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
{{-- toastr --}}
<link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
{{-- select2 --}}
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">

<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/pre.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
