@extends('frontend/template')

@section('main')
<!-- start main content -->
	<!-- Main content starts -->

	<div class="main-block">
	<section class="ld-cart-section ptb-50">

<br><br>
		<div class="container" >

			<!-- Actual content -->
			<div class="ecommerce pt-40">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<!-- Shopping items content -->
						<div class="shopping-content">
							<!-- Block Title -->

							<!-- Shopping Edit Profile -->
							<div class="shopping-wishlist">
								<!-- Recent Purchase Table -->
								<div class=" table-responsive">
									<table class="table table-bordered">
										<!-- Table Header -->
										<thead>
										<tr>
											<th>#</th>
											<th>Gambar</th>
											<th>Judul Buku</th>
											<th>Pengarang</th>
											<th>Penerbit</th>
											<th>Harga</th>
											<th>Action</th>
										</tr>
										</thead>
										<tbody>
								@foreach ($wish as $i => $isi)

										<tr>
											<td>{{$i+1}}</td>
											<!-- Product image -->
											<td>
												<a href="#">
													<img src="{{ asset('frontend/buku/'. $isi->gambar) }}" alt="" class="img-responsive"/>
												</a>
											</td>
											<td><a href="{{route('detail',$isi->id_buku)}}">{{$isi->judul}}</a></td>
											<td>{{$isi->pengarang}}</td>
											<td>{{$isi->penerbit}}</td>
											<td>Rp. {{number_format($isi->harga)}}</td>
											<td>
											<form action="{{ route('simpan-cart')}}" method="post" enctype="multipart/form-data">
												@csrf
												<input   type="hidden" name="id_buku" id="id_buku" value="{{$isi->id_buku}}" >
												<input   type="hidden" name="tgl" id="tgl" >
												<input   type="hidden" name="qty" id="qty" value="1" >
												<input   type="hidden" name="total" id="total"  >
												
												<div class="btn-group btn-group-xs">
												<button type="submit" class="btn btn-primary btn-block" > <i class="fa fa-shopping-cart"></i></button>
											</div>
											<a href="{{ route('hapus-wish',$isi->id_wishlist)}}" class="close-button"><i class="fa fa-trash"></i>
											</form>
											</td>
										</tr>
								@endforeach
									
											<!-- Product image -->
										
										</tbody>
									</table>
								</div>
								<!-- Pagination -->
								<div class="shopping-pagination">
									<ul class="pagination pull-right">
										<li class="disabled"><a href="#">&laquo;</a></li>
										<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">&raquo;</a></li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<!-- Pagination end-->
							</div>
						</div>
					</div>
				</div>
				<br />



			</div>
		</div>
	</section>
	</div>

	<!-- Main content ends -->
<!-- end compare content -->


@endsection

<!-- end main content -->