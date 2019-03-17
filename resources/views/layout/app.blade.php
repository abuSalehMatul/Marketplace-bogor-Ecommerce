
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="www">
    <meta name="keywords" content="www">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <!--custom -->
   
     <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link href="{{ asset ('webtheme/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Template style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset ('webtheme/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('webtheme/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('webtheme/css/owl.theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('webtheme/css/owl.transitions.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset ('webtheme/css/style.css') }}">
    
    <!-- Font used in template -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Roboto:400,400italic,500,500italic,700,700italic,300italic,300' rel='stylesheet' type='text/css'>
    <!--font awesome icon -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- favicon icon -->
   
    <link rel="stylesheet" type="text/css" href="{{ asset('webtheme/css/custom.css') }}">
    <script src="{{ asset('webtheme/js/jquery.min.js') }}"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') }}"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
  <![endif]-->


  <!-- matul -->

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

        <!-- Dropzone -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.21/moment-timezone-with-data-2012-2022.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>

        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
                'user' =>  auth()->user()
            ]) !!};
               
        </script>

  <!-- end of matul -->

  
   
  @stack('headerscript')
</head>

<body>
    
    @include('layout.header')

    @section('content')
    @show
    
    @include('layout.footer')
    @stack('footerscript')
    @include('admin.layout.notificaton') 

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136223423-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-136223423-1');
</script>
</body>


</html>
 