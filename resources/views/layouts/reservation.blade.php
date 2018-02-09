<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Xtreme Travel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->

<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('css/styles.css?v=1.6')}}" rel="stylesheet">
<!-- js -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<!-- //js -->

<!-- pop-up-script -->

<link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}" />
<script src="js/jquery-ui.js"></script>
 <script>
      $(function() {
        $( ".datepicker" ).datepicker();
      });
</script>
<!-- start-smoth-scrolling -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Comfortaa:400,300,700' rel='stylesheet' type='text/css'>
</head>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Airplane') }}</title>
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/styleku.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .step-nav{
            background-color: #A1A1A1;
            padding: 2px 8px;
            border-radius: 50%;
            color: white;
            margin:10px;
        }
        .step-nav-li.li-1::after , .step-nav-li.li-2::after{
            content: "";
            background-color: #dadada;
            height: 2px;
            width: 30px;
            display: inline-block;
            margin-left: 20px;
            margin-right: 20px;
            margin-bottom: 5px;
        }
        .step-nav-li.active span{
            background-color: #1BA0E2;
        }
        .step-nav-li.active{
            color: #1BA0E2;
        }
    </style>
</head>
<body style="background-color: #E6EAED">
    
    <div class="reservasi-page reservasi-nav">
        <div class="container ">
             <nav class="navbar navbar-primary navbar-static-top" style="margin-bottom: 0;padding: 12px">
                    <div class="navbar-header" style="float: left;">
                        <div class="head-logo">
                            <a href="/" style="color: #605C12;"><span style="font-size: 25px">X</span>Travel</a>
                        </div>
                       
                    </div>

                     <ul class="nav navbar-nav navbar-right" style="margin-top: 20px;font-size: 20px;">
                            <!-- Authentication Links -->
                          <li class="step-nav-li li-1 {{ request()->path() == 'pemesanan/'.$rute->id.'/detail' ? 'active':'' }} "><span class="step-nav">1</span>Isi Data</li>
                          <li class="step-nav-li li-2 {{ (request()->path() == 'pemesanan/'.$rute->id.'/detailstp2') || (request()->path() == 'pemesanan/'.$rute->id.'/detailstp3') ? 'active':'' }} "><span class="step-nav">2</span>Konfirmasi Data</li>
                          <li class="step-nav-li {{ request()->path() == 'pemesanan/'.$rute->id.'/pembayaran' ? 'active':'' }}"><span class="step-nav">3</span>Pembayaran</li>
                    </ul>
            </nav>
        </div>
    </div>

    @yield('content')
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
