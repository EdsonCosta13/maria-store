<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="{{asset('web/css/bootstrap.min.css')}}"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="{{asset('web/css/slick.css')}}"/>
 		<link type="text/css" rel="stylesheet" href="{{asset('web/css/slick-theme.css')}}"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="{{asset('web/css/nouislider.min.css')}}"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="{{asset('web/css/font-awesome.min.css')}}">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="{{asset('web/css/style.css')}}"/>
    </head>
	<body>

        <div class="">
            {{View::make('web.includes.head')}}
            {{View::make('web.includes.nav')}}
            <section class="content">
                @yield('content')
            </section>
            <section class="js">
                @yield('js')
            </section>
            {{View::make('web.includes.newsletter')}}
            {{View::make('web.includes.footer')}}

        </div>

		<!-- jQuery Plugins -->
		<script src="{{asset('web/js/jquery.min.js')}}"></script>
		<script src="{{asset('web/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('web/js/slick.min.js')}}"></script>
		<script src="{{asset('web/js/nouislider.min.js')}}"></script>
		<script src="{{asset('web/js/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('web/js/main.js')}}"></script>

	</body>
</html>
