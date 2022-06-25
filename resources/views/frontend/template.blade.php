<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<title>Toko Buku</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Fav icon -->
	<link rel="shortcut icon" href="{{asset('/')}}frontend/img/logo.png">

	<!-- Font -->
	<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,900,700,700italic,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700%7CDancing+Script%7CMontserrat:400,700%7CMerriweather:400,300italic%7CLato:400,700,900' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Cantata+One' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,600' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300,500,700' rel='stylesheet' type='text/css'>
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="{{asset('/')}}frontend/css/bootstrap.min.css">

	<!-- Magnific Popup -->
	<link href="{{asset('/')}}frontend/css/magnific-popup.css" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('/')}}frontend/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('/')}}frontend/css/normalize.css">
	<link rel="stylesheet" href="{{asset('/')}}frontend/css/skin-lblue.css">

	<link rel="stylesheet" href="{{asset('/')}}frontend/css/ecommerce.css">

	<!-- Owl carousel -->
	<link href="{{asset('/')}}frontend/css/owl.carousel.css" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('/')}}frontend/css/main.css">
	<link rel="stylesheet" href="{{asset('/')}}frontend/style.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/css/revolutionslider_settings.css" media="screen" />
	<link rel="stylesheet" href="{{asset('/')}}frontend/css/responsive.css">
	<script src="{{asset('/')}}frontend/js/vendor/modernizr-2.6.2.min.js"></script>

  <!-- Required Raja Ongkir -->
 
</head>

<body class="style-14 index-2">
<script src="{{asset('/')}}frontend/js/vendor/jquery-1.10.2.min.js"></script>


<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


<!-- Start Loading -->
<!-- <section class="loading-overlay">
	<div class="Loading-Page">
		<h1 class="loader">Loading...</h1>
	</div>
</section>  -->
<!-- End Loading  -->

<!-- start header -->
<header>
	<!-- Top bar starts -->
	<div class="top-bar">
		<div class="container">

			<!-- Contact starts -->
			<div class="tb-contact pull-left">
				<!-- Email -->
				<i class="fa fa-envelope color"></i> &nbsp; <a href="mailto:mediatamawebindonesia@gmail.com">mediatamawebindonesia@gmail.com</a>
				&nbsp;&nbsp;
				<!-- Phone -->
				<i class="fa fa-phone color"></i> &nbsp; +62 82170214495
			</div>
			<!-- Contact ends -->

			<!-- Shopping kart starts -->
			<div class="tb-shopping-cart pull-right">
				<!-- Link with badge -->
				
				<a href="#" class="btn btn-white btn-xs b-dropdown"><i class="fa fa-shopping-cart"></i> <i class="fa fa-angle-down color"></i> <span class="badge badge-color">1</span></a>
				<!-- Dropdown content with item details -->
				<div class="b-dropdown-block">
					<!-- Heading -->
					<h4><i class="fa fa-shopping-cart color"></i> Your Items</h4>
					@foreach ($cart as $i => $isi)
					<ul class="list-unstyled">
						<!-- Item 1 -->
						<li>
							<!-- Item image -->
							<div class="cart-img">
								<a href="#"><img src="{{ asset('frontend/buku/'. $isi->gambar) }}" alt="" class="img-responsive" /></a>
							</div>

							<!-- Item heading and price -->
							<div class="cart-title">
								<h5><a href="#">{{ $isi->judul}}</a></h5>
								<!-- Item price -->
								<h5>	<span class="label label-color label-sm">Rp. {{ $isi->harga}} </span>
							x
								<span class="label label-color label-sm">  {{ $isi->qty}}</span>
							</div>
							<div class="clearfix"></div>
						</li>
						
					</ul>
					@endforeach

					<a href="{{route('cart')}}" class="btn btn-color btn-sm">View Cart</a> 
				</div>
			</div>
			<!-- Shopping kart ends -->

			<!-- Langauge starts -->
			
			<!-- Language ends -->

			<!-- Search section for responsive design -->
			<div class="tb-search pull-left">
				<a href="#" class="b-dropdown"><i class="fa fa-search square-2 rounded-1 bg-color white"></i></a>
				<div class="b-dropdown-block">
					<form>
						<!-- Input Group -->
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Type Something">
									<span class="input-group-btn">
										<button class="btn btn-color" type="button">Search</button>
									</span>
						</div>
					</form>
				</div>
			</div>
			<!-- Search section ends -->

			<!-- Social media starts -->
			
			<!-- Social media ends -->

			<div class="clearfix"></div>
		</div>
	</div>

	<!-- Top bar ends -->

	<!-- Header One Starts -->
	<div class="header-1">

		<!-- Container -->
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<!-- Logo section -->
					<div class="logo">
						<h1>
							<img alt="" src="frontend/img/medi.png" class="footer-logo">
                            <!-- <a href="index.html"><i class="fa fa-bookmark-o"></i> Toko Buku</a></h1> -->
					</div>
				</div>
				<div class="col-md-6 col-md-offset-2 col-sm-5 col-sm-offset-3 hidden-xs">
					<!-- Search Form -->
					<div class="header-search">
						<form>
							<!-- Input Group -->
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Type Something">
										<span class="input-group-btn">
											<button class="btn btn-color" type="button">Search</button>
										</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Navigation starts -->

		<div class="navi">
			<div class="container">
				<div class="navy">
					<ul>
						<!-- Main menu -->

						<li><a href="{{ route('home')}}">Home</a>

							<!-- Submenu -->
							
						</li>
						<li><a href="#">Kategori</a>
							<ul>
							@foreach ($kategori as $i => $isi)
							
								<li><a href="{{ route('kategoriF',$isi->id_kategori)}}">{{$isi->nama_kategori}}</a></li>
								@endforeach
							
							</ul>
						</li>

					
						<li><a href="#">Member</a>
							<ul>
							
								@if(session('id_member') != '')
								<li><a href="#" role="button" onclick="logouts()">Logout</a></li>		
								@else
							<li><a href="{{ route('loginf')}}">Login</a></li>
							<li><a href="{{ route('registerf')}}">Daftar</a></li>
							@endif
								
								<!-- Multi level menu -->
								
							</ul>
						</li>
						<li><a href="#">Transaksi</a>
							<ul>
								<li><a href="{{ route('cart')}}"><span>Keranjang</span></a></li>
								<li><a href="{{ route('trans')}}"><span>Transaksi</span></a></li>
								<li><a href="{{ route('wishlist')}}"><span>Wishlist</span></a></li>
								<li><a href="{{ route('pembayaran')}}"><span>Status Pembayaran</span></a></li>
								<li><a href=""><span>Status Pengiriman</span></a></li>
								
							</ul>
						</li>

						<li><a href="{{ route('about')}}">About </a></li>
						<li><a href="{{ route('login')}}">Admin</a></li>
					</ul>
					
				</div>
			</div>
		</div>

		<!-- Navigation ends -->

	</div>

	<!-- Header one ends -->
	<div class="modal" id="logout">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Yakin Ingin Keuar?</h4>
      </div>
<form action="{{route('logoutf')}}" method="post">
	@csrf
	<!-- Modal body -->
	<div class="modal-body">
	  Silahkan Tekan tombol keluar ubntuk melanjutkan
	</div>

	<!-- Modal footer -->
	<div class="modal-footer">
	  <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
	  <button type="submit" class="btn btn-danger">Keluar</button>
	</div>
</form>

</header>
<!-- end header -->

<!-- start main content -->
<main class="main-container">
@yield('main')
</main>
<!-- end main content -->



<div class="container">

</div>



<!-- start footer area -->
<footer class="footer-area-content1">

	<div class="container">
		<div class="footer-wrapper style-3">
			<div class="type-1">
				<div class="footer-columns-entry">
					<div class="row">
						<div class="col-md-4">
							<img alt="" src="frontend/img/medi.png" class="footer-logo">
							<div class="footer-description">Jl. Dr. Sutomo No. 146, Kubu Marapalam,
                            Kec. Lubuk Begalung, Kota Padang,
                            Sumatera Barat, 25146
                            Indonesia
                            </div>
<div class="footer-description">
								<b>Phone:</b> 082170214495<br>
								<b>Email:</b>  mediatamawebindonesia@gmail.com<br>
							</div>
						
							<div class="clear"></div>
						</div>
						<div class="col-md-2 col-sm-4">
							<h3 class="column-title">Halaman</h3>
							<ul class="column">
								<li><a href="#">Home</a></li>
								<li><a href="#">Kategori</a></li>
								<li><a href="#">Member</a></li>
								<li><a href="#">Transaksi</a></li>
								<li><a href="#">About</a></li>
								<li><a href="#">Admin</a></li>
							</ul>
							<div class="clear"></div>
						</div>
						<div class="col-md-2 col-sm-4">
						<h3 class="column-title">Follow Us</h3>
							<ul class="column">
								<li><a href="#">Facebook</a></li>
								<li><a href="#">Instagram</a></li>
								<li><a href="#">Twitter</a></li>
								<li><a href="#">Youtube</a></li>
								<li><a href="#">Pinterest</a></li>
								<li><a href="#">LinkedIn</a></li>
								<li><a href="#">Blogger</a></li>
							</ul>
							<div class="clear"></div>
						</div>
						<div class="col-md-2 col-sm-4">
							<h3 class="column-title">Layanan</h3>
							<ul class="column">
								<li><a href="#">Website Development</a></li>
								<li><a href="#">Website Administrator</a></li>
								<li><a href="#">Social Media Administrator</a></li>
								<li><a href="#">Graphic Design</a></li>
								
							</ul>
							<div class="clear"></div>
						</div>
						<div class="clearfix visible-sm-block"></div>
						
							
							<div class="clear"></div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

    <div class=" footer-area-content ">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class=" footer-bottom-navigation">
					
                    <center> &copy; Copyright <strong><span >Mediatama Web Indonesia</span></strong>. All Rights Reserved</center>
					</div>
				</div>
			</div>

		</div>
	</div>


  </footer>
<!-- footer area end -->


<!-- All script -->

<!-- Raja Ongkir -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script src="{{asset('/')}}frontend/js/bootstrap.min.js"></script>
<script src="{{asset('/')}}frontend/js/smoothscroll.js"></script>
<!-- Scroll up js
============================================ -->
<script src="{{asset('/')}}frontend/js/jquery.scrollUp.js"></script>
<script src="{{asset('/')}}frontend/js/menu.js"></script>
<!-- new collection section script -->
<script src="{{asset('/')}}frontend/js/swiper/idangerous.swiper.min.js"></script>
<script src="{{asset('/')}}frontend/js/swiper/swiper.custom.js"></script>


<script src="{{asset('/')}}frontend/js/pluginse209.js?v=1.0.0"></script>

<!-- Magnific Popup -->
<script src="{{asset('/')}}frontend/js/jquery.magnific-popup.min.js"></script>

<script src="{{asset('/')}}frontend/js/jquery.countdown.min.js"></script>

<!-- SLIDER REVOLUTION SCRIPTS  -->
<script type="text/javascript" src="{{asset('/')}}frontend/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}frontend/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<!-- Owl carousel -->
<script src="{{asset('/')}}frontend/js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}frontend/js/main.js"></script>


<script type="text/javascript">

	/* ************ */
	/* Owl Carousel */
	/* ************ */

	function logouts()
	{
		$('#logout').modal('show')
	}
	$(document).ready(function() {
		/* Owl carousel */
		$(".owl-carousel").owlCarousel({
			slideSpeed : 500,
			rewindSpeed : 1000,
			mouseDrag : true,
			stopOnHover : true
		});
		/* Own navigation */
		$(".owl-nav-prev").click(function(){
			$(this).parent().next(".owl-carousel").trigger('owl.prev');
		});
		$(".owl-nav-next").click(function(){
			$(this).parent().next(".owl-carousel").trigger('owl.next');
		});
	});


	/* Main Slider */
	$('.tp-banner0').show().revolution({
		dottedOverlay: "none",
		delay: 5000,
		startWithSlide: 0,
		startwidth: 869,
		startheight: 520,
		hideThumbs: 10,
		hideTimerBar: "on",
		thumbWidth: 50,
		thumbHeight: 50,
		thumbAmount: 4,
		navigationType: "bullet",
		navigationArrows: "solo",
		navigationStyle: "round",
		touchenabled: "on",
		onHoverStop: "on",
		swipe_velocity: 0.7,
		swipe_min_touches: 1,
		swipe_max_touches: 1,
		drag_block_vertical: false,
		parallax: "mouse",
		parallaxBgFreeze: "on",
		parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],
		keyboardNavigation: "off",
		navigationHAlign: "right",
		navigationVAlign: "bottom",
		navigationHOffset: 30,
		navigationVOffset: 30,
		soloArrowLeftHalign: "left",
		soloArrowLeftValign: "center",
		soloArrowLeftHOffset: 50,
		soloArrowLeftVOffset: 8,
		soloArrowRightHalign: "right",
		soloArrowRightValign: "center",
		soloArrowRightHOffset: 50,
		soloArrowRightVOffset: 8,
		shadow: 0,
		fullWidth: "on",
		fullScreen: "off",
		spinner: "spinner4",
		stopLoop: "on",
		stopAfterLoops: -1,
		stopAtSlide: -1,
		shuffle: "off",
		autoHeight: "off",
		forceFullWidth: "off",
		hideThumbsOnMobile: "off",
		hideNavDelayOnMobile: 1500,
		hideBulletsOnMobile: "off",
		hideArrowsOnMobile: "off",
		hideThumbsUnderResolution: 0,
		hideSliderAtLimit: 0,
		hideCaptionAtLimit: 500,
		hideAllCaptionAtLilmit: 500,
		videoJsPath: "rs-plugin/videojs/",
		fullScreenOffsetContainer: ""
	});

</script>


</body>


</html>