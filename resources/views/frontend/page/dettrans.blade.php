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
                            <div class="col-md-12">
                                <br>
                                <table>
                                    <!-- Table Header -->
                                    <tbody>
                                        <tr>
                                            <td width="300">ID Transaksi</td>
                                            <td width="30">:</td>
                                            <td>TRANS-{{$trans->id_transaksi}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Transaksi</td>
                                            <td>:</td>
                                            <td>{{$trans->tgl}}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Belanja</td>
                                            <td>:</td>
                                            <td>Rp. {{number_format($trans->sub_total)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Ongkir</td>
                                            <td>:</td>
                                            <td>Rp. {{number_format($trans->ongkir)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Bayar</td>
                                            <td>:</td>
                                            <td>Rp. {{number_format($trans->tot_bayar)}}</td>
                                        </tr>

                                        <!-- Product image -->

                                    </tbody>
                                </table>
                                <br>
                                <table class="table table-bordered">
                                    <!-- Table Header -->
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul Buku</th>
                                            <th>Pengarang</th>
                                            <th>Penerbit</th>
                                            <th>Tahun Terbit</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Berat</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detail as $i => $isi)

                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <!-- Product image -->
                                            <td>{{$isi->judul}}</td>
                                            <td>{{$isi->pengarang}}</td>
                                            <td>{{$isi->penerbit}}</td>
                                            <td>{{$isi->tahun}}</td>
                                            <td>Rp. {{number_format($isi->harga)}}</td>
                                            <td>{{$isi->qty}}</td>
                                            <td>{{$isi->berat}} gram</td>
                                        </tr>
                                        @endforeach

                                        <!-- Product image -->

                                    </tbody>
                                </table>
                            </div>
                            <a href="{{route('trans')}}" class="btn btn-info" style="margin-top:1rem; margin-left:1rem;">Back</a>
                        	<button type="button" id="pay-button" class="btn btn-primary my-3 py-3" style="margin-top:1rem; margin-left:1rem;">Proses Pembayaran</button>
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
<form action="{{route('send.result.midtrans')}}" method="post" id="myForm">
    @csrf
    <input type="hidden" name="json" id="json">
    <input type="hidden" class="form_control" name="hasil_ongkir" id="hasil_ongkir">
    <input type="hidden" class="form_control" name="courier" id="courier">
</form>

<!-- Main content ends -->
<!-- end compare content -->
<script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-YYZQX6wRYCwjJYc_">
</script>
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      var tot_bayar = {{$trans->tot_bayar}};
      var id = '{{Auth::user()->id}}';

      if(tot_bayar == ''){
          alert('Harap memilih pergiriman terlebih dahulu');
      }else{
        $.ajax({
          type: "post",
          url: "{{route('get.snaptoken')}}",
          data : {
            tot_bayar : tot_bayar,
            id:id,
          },
          dataType: "json",
          success: function (response) {
              console.log(response)
              if(response.status == 'ok'){
                window.snap.pay(response.snaptoken, {
                onSuccess: function(result){
                    /* You may add your own implementation here */
                    alert("payment success!"); console.log(result);
                },
                onPending: function(result){
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    // alert(JSON.stringify(result));
                    $('#json').val(JSON.stringify(result));
                    $('#myForm').submit();

                },
                onError: function(result){
                    /* You may add your own implementation here */
                    alert("payment failed!"); console.log(result);
                },
                onClose: function(){
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
                })
              }
            }
        });
      }
      // customer will be redirected after completing payment pop-up
    });
</script>

@endsection

<!-- end main content -->
