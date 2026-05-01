<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Carspector</title>
    <link rel="stylesheet" href="{{ asset('assests/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assests/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css">
      <style>
          .btn-success{
              background: #0A8216 !important;
          }
      </style>
        @yield('style')
</head>
<body>
@include('partials.header-nav')

@yield('content')

@include('partials.footer')



<script src="{{ asset('assests/js/popper.js') }}"></script>
<script src="{{ asset('assests/js/bootstrap.min.js') }}"></script>
<script
    src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@yield('scripts')
@if(session('success'))
<script>
    toastr.success('', '{{session('success')}}')
</script>
@endif
</body>
</html>
