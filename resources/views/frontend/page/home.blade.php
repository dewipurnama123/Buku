@extends('frontend/template')

@section('main')

<!-- start main content -->


	<!-- new collection directory -->
	<section id="content-block" class="slider_area">
		<div class="container">
			<div class="content-push">
				<div class="row">

					<div class="col-md-3 col-md-push-9">
						<div class="sidebar-navigation">
							<div class="title">Kategori Buku<i class="fa fa-angle-down"></i></div>
							<div class="list">
							@foreach ($kategori as $i => $isi)
							<a class="entry" href="{{ route('kategoriF',$isi->id_kategori)}}">
								<span><i class="fa fa-angle-right"></i>{{$isi->nama_kategori}}</span></a>
                              @endforeach
							
							</div>
						</div>
						<div class="clear"></div>
					</div>

					<div class="col-md-9 col-md-pull-3">

						<div class="header_slider">
							<article class="boss_slider">
								<div class="tp-banner-container">
									<div class="tp-banner tp-banner0">
										<ul>
											<!-- SLIDE  -->
											<li data-link="#" data-target="_self" data-transition="flyin" data-slotamount="7" data-masterspeed="500" data-saveperformance="on">
												<!-- MAIN IMAGE --><img src="frontend/img/dummy.png" alt="slidebg1" data-lazyload="frontend/img/slide/slider1.png" data-bgposition="left center" data-kenburns="off" data-duration="14000" data-ease="Linear.easeNone" data-bgpositionend="right center" />
												<!-- LAYER NR. 1 -->
												<div class="tp-caption  randomrotate customout rs-parallaxlevel-0" data-x="270" data-y="140" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="500" data-end="4800" data-endspeed="300" data-easing="easeInOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">  </div>
												<!-- LAYER NR. 2 -->
												<div class="tp-caption  randomrotate customout rs-parallaxlevel-0" data-x="270" data-y="250" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="800" data-end="4800" data-endspeed="300" data-easing="easeInOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;"> </div>
												<!-- LAYER NR. 3 -->
												<div class="tp-caption  randomrotate customout rs-parallaxlevel-0" data-x="355" data-y="363" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="1200" data-end="4800" data-endspeed="300" data-easing="easeInOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">  </div>

											</li>
											<li data-link="#" data-target="_self" data-transition="3dcurtain-horizontal" data-slotamount="7" data-masterspeed="500" data-saveperformance="on">
												<!-- MAIN IMAGE --><img src="frontend/img/dummy.png" alt="slidebg1" data-lazyload="frontend/img/slide/slider2.png" data-bgposition="left center" data-kenburns="off" data-duration="14000" data-ease="Linear.easeNone" data-bgpositionend="right center" />
												<!-- LAYER NR. 1 -->
												<div class=" very_big_white fade customout rs-parallaxlevel-0" data-x="270" data-y="140" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="500" data-end="4800" data-endspeed="300" data-easing="easeOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">  </div>
												<!-- LAYER NR. 2 -->
												<div class=" very_large_white_text fade customout rs-parallaxlevel-0" data-x="270" data-y="250" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="800" data-end="4800" data-endspeed="300" data-easing="easeOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">  </div>
												<!-- LAYER NR. 3 -->
												<div class="large_white_text fade customout rs-parallaxlevel-0" data-x="355" data-y="363" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="1200" data-end="4800" data-endspeed="300" data-easing="easeOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;"> </div>
											</li>
											<li data-transition="boxslide" data-slotamount="7" data-masterspeed="500" data-saveperformance="on">
												<!-- MAIN IMAGE --><img src="frontend/img/dummy.png" alt="slidebg1" data-lazyload="frontend/img/slide/slide_3.jpg" data-bgposition="left center" data-kenburns="off" data-duration="14000" data-ease="Linear.easeNone" data-bgpositionend="right center" />
												<!-- LAYER NR. 1 -->
												<div class=" large_white_text skewfromleftshort customout rs-parallaxlevel-0" data-x="355" data-y="363" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="1200" data-end="4800" data-endspeed="300" data-easing="easeOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">  </div>
												<!-- LAYER NR. 2 -->
												<div class=" very_large_white_text skewfromleftshort customout rs-parallaxlevel-0" data-x="270" data-y="250" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="800" data-end="4800" data-endspeed="300" data-easing="easeOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">  </div>
												<!-- LAYER NR. 3 -->
												<div class=" very_big_white skewfromleftshort customout rs-parallaxlevel-0" data-x="270" data-y="140" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="500" data-end="4800" data-endspeed="300" data-easing="easeOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">  </div>
											</li>
										</ul>
										<div class="slideshow_control"></div>
									</div><!-- /.tp-banner -->
								</div>
							</article>
						</div><!-- /.header_slider -->

						<div class="clear"></div>

					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- end new collection directory -->



<section id="popular-product" class="ecommerce">
	<div class="container">
		<!-- Shopping items content -->
		<div class="shopping-content">

			<!-- Block heading two -->
			<div class="block-heading-two">
				<h3><span>Buku Populer</span></h3>
			</div>

			<div class="row">
				@foreach ($buku as $i => $isi)
				<div class="col-md-2">
					<!-- Shopping items -->
							
								<div class="shopping-item">
									<!-- Image -->
									
                                    </a>
									<a href="{{route('detail',$isi->id_buku)}}"><img class="center" src="{{ asset('frontend/buku/'. $isi->gambar) }}" alt="" height="200" 	 /></a>
									<!-- Shopping item name / Heading -->
									
									<h4><a href="{{ route('home',$isi->id_buku)}}">{{Str::limit($isi->judul, 10)}}</a></h4>
									<h4><span class="color pull-right"> Rp. {{$isi->harga}}</span></h4>
									<div class="clearfix"></div>
									<!-- Buy now button -->
									<div class="visible-xs">
						</div>
						<!-- Shopping item hover block & link -->
						<div class="item-hover bg-color hidden-xs">
							
						<form action="{{ route('simpan-cart')}}" method="post" enctype="multipart/form-data">
						@csrf
						<input   type="hidden" name="id_buku" id="id_buku" value="{{$isi->id_buku}}" >
						<input   type="hidden" name="tgl" id="tgl" >
						<input   type="hidden" name="qty" id="qty" value="1" >
						<input   type="hidden" name="total" id="total"  >
						
                        <button type="submit" class="btn btn-primary btn-block"> Add to cart</button>
					</form>
					<form action="{{ route('simpan-wish')}}" method="post" enctype="multipart/form-data">
						@csrf
						<input   type="hidden" name="id_buku" id="id_buku" value="{{$isi->id_buku}}" >

						<button type="submit" class="btn btn-info btn-block"> Add to wishlist</button>
					</form>
						</div>
					</div>
				</div>
				@endforeach

			
			</div>
		
		</div>
	</div>
</section>

<div class="modal" id="login">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Silakan Login Terlebih Dahulu!!!</h4>
      </div>
<form action="{{route('loginf')}}" method="post">
	@csrf
	<!-- Modal body -->
	<div class="modal-body">
	  Silahkan Tekan tombol login ubntuk melanjutkan
	</div>

	<!-- Modal footer -->
	<div class="modal-footer">
	  <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
	  <button type="submit" class="btn btn-danger">Login</button>
	</div>
</form>
	<!-- Start Our Shop Items -->

	



	


<!-- end main content -->
@endsection