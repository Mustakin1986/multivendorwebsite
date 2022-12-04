<!DOCTYPE HTML>
<html>
<head>
<title>Ecommerce_shop</title>
<!--css-->
@include('frontend.includes.style')
<!--css-->
<!--jQuery-->
@include('frontend.includes.script')
<!--//End-rate-->
</head>
<body>
	<!--header-->
		@include('frontend.includes.header')
		<!--header-->
		@yield('content')
		<!--content-->
		<!---footer--->
		@include('frontend.includes.footer')
		<!---footer--->
			
			

</body>
</html>