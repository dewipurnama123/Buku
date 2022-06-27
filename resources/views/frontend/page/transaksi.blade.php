@extends('frontend/template')

@section('main')
<!-- start main content -->
	<!-- Main content starts -->

	<div class="main-block">

	<br><br>

		<div class="container">

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
											<th>ID Transaksi</th>
											<th>Tanggal Transaksi</th>
											<th>Sub Total</th>
											<th>Ongkir</th>
											<th>Total Bayar</th>
											<th>Action</th>
										</tr>
										</thead>
										<tbody>
								@foreach ($trans as $i => $isi)
										<tr>
											<td>{{$i+1}}</td>
											<!-- Product image -->
											<td>TRANS-{{$isi->id_transaksi}}</td>
											<td>{{$isi->tgl}}</td>
											<td>Rp. {{number_format($isi->sub_total)}}</td>
											<td>Rp. {{number_format($isi->ongkir)}}</td>
											<td>Rp. {{number_format($isi->tot_bayar)}}</td>
											<td>
											<a href="{{ route('dettrans',$isi->id_transaksi)}}" class="btn btn-info">Detail </a>
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
	</div>

	<!-- Main content ends -->
<!-- end compare content -->

@endsection

<!-- end main content -->