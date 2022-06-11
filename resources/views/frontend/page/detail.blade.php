@extends('frontend/template')

@section('main')
<!-- start main content -->

<section class="product_content_area pt-40">
	<!-- start of page content -->

	<div class="lookcare-product-single container">

		<div class="row">

			<div class="main col-xs-12" role="main">

				<div class=" product">

					<div class="row">

						<div class="col-md-5 col-sm-6 summary-before ">

							<div class="product-slider product-shop">
								<span class="onsale">Sale!</span>
								<ul class="slides">
										<a href="{{ asset('frontend/buku/'. $buku->gambar) }}" data-imagelightbox="gallery" class="hoodie_7_front">
											<img width="300" src="{{ asset('frontend/buku/'. $buku->gambar) }}" class="attachment-shop_single" alt="image">
										</a>
									
									

								</ul>
							</div>
						</div>

						<div class="col-sm-6 col-md-7 product-review entry-summary">

							<h1 class="product_title">{{$buku->judul}}</h1>

							<!-- <div class="woocommerce-product-rating">
								<div class="star-rating" title="Rated 4.00 out of 5">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a href="#reviews" class="woocommerce-review-link">(<span class="count">3</span> customer reviews)</a>
							</div> -->

							<div>
								<p class="price">	
									<ins><span class="amount">Rp. {{$buku->harga}}</span></ins></p>
							</div>

							
								<table>
									<tr>
										<td width="100">Judul</td> 
										<td>{{$buku->judul}}</td> 
									</tr>
									<tr>
										<td width="100">Penulis</td> 
										<td>{{$buku->pengarang}}</td> 
									</tr>
									<tr>
										<td width="100">Penerbit</td> 
										<td>{{$buku->penerbit}}</td> 
									</tr>
									<tr>
										<td width="100">Tahun Terbit</td> 
										<td>{{$buku->tahun}}</td> 
									</tr>
									
								</table>
							
								<form class="variations_form cart  action="{{ route('simpan-cart')}}" method="post" enctype="multipart/form-data">
						@csrf
						<input   type="hidden" name="id_member" id="id_member" value="1" >
						<input   type="hidden" name="id_buku" id="id_buku" value="{{$buku->id_buku}}" >
						<input   type="hidden" name="tgl" id="tgl" >
						<div class="quantity">
									<input type="number" step="1" name="qty" value="1" title="Qty" class="input-text qty text" size="4" min="1">
								</div>
						<input   type="hidden" name="total" id="total" >
						
                        <button type="submit" class="cart-button"> Add to cart</button>
					</form>
					<form class="variations_form cart" action="{{ route('simpan-wish')}}" method="post" enctype="multipart/form-data">
					@csrf
					<input   type="hidden" name="id_member" id="id_member" value="1" >
					<input   type="hidden" name="id_buku" id="id_buku" value="{{$buku->id_buku}}" >

					<button type="submit" class="cart-button"> Add to wishlist</button>
				</form>


							

							<div class="product_meta">



								<!-- <span class="sku_wrapper">SKU: <span class="sku">N/A</span>.</span> -->


								<span class="posted_in">Kategori: <a href="{{ route('kategoriF',$buku->id_kategori)}}" rel="tag">{{$buku->nama_kategori}}</a></span>


							</div>

							<div class="share-social-icons">

								<a href="#" target="_blank" title="Share on Facebook">
									<i class="fa fa-facebook"></i>
								</a>
								<a href="#" target="_blank" title="Share on Twitter">
									<i class="fa fa-twitter"></i>
								</a>
								<a href="#" target="_blank" title="Pin on Pinterest">
									<i class="fa fa-pinterest"></i>
								</a>
								<a href="#" target="_blank" title="Share on Google+">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>

						</div>
						<!-- .summary -->

					</div>

					<div class="wrapper-description">

						<ul class="tabs-nav clearfix">
							<li class="active">Description</li>
						</ul>
						<div class="tabs-container product-comments">

							<div class="tab-content">
								<section class="related-products">

									<h2>Product Description</h2>
<style>
	.justify { text-align: justify;}
</style>
									<p  class= "justify">
									{{$buku->desc}}
									</p>
								</section>
							</div>



						
						</div>

					</div>





				</div>
				<!-- #product-293 -->



			</div>
			<!-- end of main -->

		</div>
		<!-- end of .row -->

	</div>

	<!-- end of page content -->
</section>

<!-- service area -->
	

<!-- end service area -->

<!-- end main content -->
@endsection