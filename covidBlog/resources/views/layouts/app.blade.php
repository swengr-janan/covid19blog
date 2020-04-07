<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://kit.fontawesome.com/6f38e485ba.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    <!-- Icon -->
    <link rel="shortcut icon" type="image/png" href="https://urgentcarekids.com/wp-content/uploads/2020/03/Coronavirus.png">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .select,  
        #locale {
          width: 100%;
        }
        .like {
          margin-right: 10px;
        }
      </style>
</head>
<body>
    <div id="app">
        @include('include.navbar')
        <div class="container">
            <br>
            @include('include.messages')
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error=>{
                console.error(error);
            });                                             
    </script> 
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
            dom:"<'myfilter'f>t"
     });    
        } );
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
    // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script> 
</body>
</html>
