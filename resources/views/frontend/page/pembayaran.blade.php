@extends('frontend/template')

@section('main')
<!-- start main content -->
	<!-- Main content starts -->

	<div class="main-block">



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
											<th>No</th>
											<th>ID Transaksi</th>
											<th>Status Pembayaran</th>
											<th>Proses</th>
										</tr>
										</thead>
										<tbody>
								@foreach ($pembayaran as $i => $isi)

										<tr>
											<td>{{$i+1}}</td>
											<!-- Product image -->
										
											<td>{{$isi->id_transaksi}}</td>
											<td>{{$isi->status}}</td>
											<td>{{$isi->proses}}</td>
										
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