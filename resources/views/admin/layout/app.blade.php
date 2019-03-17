<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Abu_Saleh_Matul">
     <!--matul -->
 <meta charset="utf-8">
   
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Styles -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">

    <!-- Dropzone Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" /> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">

     <!-- end of matul -->
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('theme/default/assets/images/favicon.ico')}}">
    <!-- App title -->
    <title>@yield('title')</title>

    <!-- App css -->
    <link href="{{ asset('theme/default/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/default/assets/css/core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/default/assets/css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/default/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/default/assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/default/assets/css/menu.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/default/assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/plugins/switchery/switchery.min.css') }}">
    @stack('headerscript')

</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        @include('admin.layout.header')

        @section('content')
        @show
    </div>
    <!-- END wrapper -->



    <script>
        var resizefunc = [];
    </script>
    <!-- jQuery  -->
     {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}
    

   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script src="{{ asset('theme/default/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/default/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/default/assets/js/detect.js') }}"></script>
    <script src="{{ asset('theme/default/assets/js/fastclick.js') }}"></script>
    <script src="{{ asset('theme/default/assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('theme/default/assets/js/waves.js') }}"></script>
    <script src="{{ asset('theme/default/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('theme/default/assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/switchery/switchery.min.js') }}"></script>
@stack('footerscript')
    <!-- App js -->
    <script src="{{ asset('theme/default/assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('theme/default/assets/js/jquery.app.js') }}"></script>
    
    @include('admin.layout.notificaton') 
</body>

</html>