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
									
									<a href="{{route('detail',$isi->id_buku)}}"><img class="center" src="{{ asset('frontend/buku/'. $isi->gambar) }}" alt="" height="200" 	 /></a>
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
						<form action="{{ route('simpan-cart')}}" method="post" enctype="multipart/form-data">
						@csrf
						<input   type="hidden" name="id_member" id="id_member" value="1" >
						<input   type="hidden" name="id_buku" id="id_buku" value="{{$isi->id_buku}}" >
						<input   type="hidden" name="tgl" id="tgl" >
						<input   type="hidden" name="qty" id="qty" value="1" >
						<input   type="hidden" name="total" id="total" >
						
                        <button type="submit" class="btn btn-primary btn-block"> Add to cart</button>
					</form>
					<form action="{{ route('simpan-wish')}}" method="post" enctype="multipart/form-data">
						@csrf
						<input   type="hidden" name="id_member" id="id_member" value="1" >
						<input   type="hidden" name="id_buku" id="id_buku" value="{{$isi->id_buku}}" >

						<button type="submit" class="btn btn-info btn-block"> Add to wishlist</button>
					</form>
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