@extends('frontend/template')

@section('main')

<!-- start main content -->


	


<section id="popular-product" class="ecommerce">
	<div class="container">
		<!-- Shopping items content -->
		<div class="shopping-content">

			<!-- Block heading two -->
			<div class="block-heading-two">
				<h3><span>Kategori {{$kate->nama_kategori}}</span></h3>
			</div>

			<div class="row">
				@foreach ($buku as $i => $isi)
				<div class="col-md-2">
					<!-- Shopping items -->
							
								<div class="shopping-item">
									<!-- Image -->
									
									<a href="single-product.html"><img class="center" src="{{ asset('frontend/buku/'. $isi->gambar) }}" alt="" height="200" 	 /></a>
									<!-- Shopping item name / Heading -->
									
									<h4><a href="{{ route('home',$isi->id_buku)}}">{{Str::limit($isi->judul, 10)}}</a></h4>
									<h4><span class="color pull-right"> Rp. {{$isi->harga}}</span></h4>
									<div class="clearfix"></div>
									<!-- Buy now button -->
									<div class="visible-xs">
							<a class="btn btn-color btn-sm" href="#">Buy Now</a>
						</div>
						<!-- Shopping item hover block & link -->
						<div class="item-hover bg-color hidden-xs">
							<a href="#">Add to cart</a>
						</div>
					</div>
				</div>
				@endforeach

			
			</div>
			<!-- Pagination -->
			<div class="shopping-pagination pull-right">
				<ul class="pagination">
					<li class="disabled"><a href="#">&laquo;</a></li>
					<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">&raquo;</a></li>
				</ul>
			</div>
			<!-- Pagination end-->
		</div>
	</div>
</section>


	<!-- Start Our Shop Items -->

	



	


<!-- end main content -->
@endsection