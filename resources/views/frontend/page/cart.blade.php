@extends('frontend/template')

@section('main')
<!-- start main content -->
<main class="main-container">
<!-- shopping cart content -->
<section class="shopping-cart-area">
	<!-- Begin cart -->
	<div class="ld-subpage-content">

		<div class="ld-cart">

			<!-- Begin cart section -->
			<section class="ld-cart-section ptb-50">

				<div class="container">

					<div class="row">

						<div class="col-md-12">

							<!-- Begin table -->
							<table class="table cart-table">
								<thead>
								<tr>
									<th class="table-title">Buku</th>
									<th class="table-title">Harga</th>
									<th class="table-title">Quantity</th>
									<th class="table-title">SubTotal</th>
									<th>

										<span class="close-button disabled"></span></th>
								</tr>
								</thead>


								<tbody>
								@foreach ($cart as $i => $isi)
								<tr>
									<td class="product-name-col">
										<figure>
											<a ><img class="img-responsive" src="{{ asset('frontend/buku/'. $isi->gambar) }}" alt="White linen sheer dress"></a>
										</figure>
										<h2 class="product-name"><a >{{ $isi->judul}}</a></h2>

										<ul>
											<li>Penerbit: {{ $isi->penerbit}}</li>
											<li>Pengarang: {{$isi->pengarang}}</li>
										</ul>
									</td>
									<td class="product-price-col">
										<span class="product-price-special">Rp.{{ $isi->harga}}</span>
									</td>
									<td>
										<div class="form-inline">
											<a href="{{ route('qtykurang',[$isi->id_keranjang,$isi->id_buku])}}" class="btn btn-danger">-</a>
											<input readonly type="number" class="form-control" style="width:50px" step="1" name="qty" value="{{$isi->qty}}" title="Qty" class="input-text qty text" size="4" min="1">
											<a href="{{ route('qtytambah',[$isi->id_keranjang,$isi->id_buku])}}" class="btn btn-success">+</a>
										</div>
									</td>
									<td class="product-total-col">
										<span class="product-price-special">Rp. {{ $isi->total}}</span>
									</td>
									<td>
									<a href="{{ route('hapus-cart',$isi->id_keranjang)}}" class="close-button"><i
                                        class="fa fa-trash"></i>
									</td>
								</tr>
								@endforeach

							
								</tbody>
							</table>
							<!-- End table -->

							<div class="mt-30"></div>

							<div class="row">

								<div class="col-md-8">

									<!-- Begin tab container -->
									
									<!-- /.tab-container -->



									<div class="mt-30"></div>
								</div>

								<div class="mt-30 visible-sm visible-xs clearfix"></div>

								<div class="col-md-4">

									<table class="table total-table">

										<tbody>
										<tr>
											<td class="total-table-title">Total:</td>
											<td>-</td>
										</tr>
										<tr>
											<td class="total-table-title">Pengiriman:</td>
											<td>-</td>
										</tr>
										
										</tbody>

										<tfoot>
										<tr>
											<td>Total Bayar:</td>
											<td>-</td>
										</tr>
										</tfoot>
									</table>
									<!-- End table -->

									<div class="mt-30"></div>
									<div class="text-right">
										<a href="#" class="btn btn-custom-6 btn-lger min-width-lg">Continue Shopping</a>
									<a href="#" class="btn btn-custom-6 btn-lger min-width-sm">Checkout</a>
									</div>

								</div>
								<!-- /.col-md-4 -->
							</div>
							<!-- /.row -->
						</div>
					</div>
				</div>

			</section>
			<!-- /.ld-cart-section -->

		</div>
		<!-- /.ld-cart -->
	</div>
	<!-- /.ld-subpage-content -->
	<!-- End Cart -->
</section>
<!-- end shopping cart content -->

</main>

@endsection