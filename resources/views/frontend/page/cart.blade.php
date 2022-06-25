@extends('frontend/template')

@section('main')

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

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
                                            <th class="table-title">Berat (Gr)</th>
                                            <th>

                                                <span class="close-button disabled"></span></th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @php
                                        $totberat = 0;
                                        $ttberat = 0;
                                        $subtotal= 0;
                                        @endphp
                                        @foreach ($cart as $i => $isi)
                                        @php
                                        $ttberat = $isi->berat* $isi->qty;
                                        $totberat = $totberat + $ttberat;
                                        $subtotal = $subtotal + $isi->total;
                                        @endphp
                                        <tr>
                                            <td class="product-name-col">
                                                <figure>
                                                    <a><img class="img-responsive"
                                                            src="{{ asset('frontend/buku/'. $isi->gambar) }}"
                                                            alt="White linen sheer dress"></a>
                                                </figure>
                                                <h2 class="product-name"><a>{{ $isi->judul}}</a></h2>

                                                <ul>
                                                    <li>Penerbit: {{ $isi->penerbit}}</li>
                                                    <li>Pengarang: {{$isi->pengarang}}</li>
                                                </ul>
                                            </td>
                                            <td class="product-price-col">
                                                <span
                                                    class="product-price-special">Rp.{{ number_format($isi->harga)}}</span>
                                            </td>
                                            <td>
                                                <div class="form-inline">
                                                    <a href="{{ route('qtykurang',[$isi->id_keranjang,$isi->id_buku])}}"
                                                        class="btn btn-danger">-</a>
                                                    <input readonly type="number" class="form-control"
                                                        style="width:50px" step="1" name="qty" value="{{$isi->qty}}"
                                                        title="Qty" class="input-text qty text" size="4" min="1">
                                                    <a href="{{ route('qtytambah',[$isi->id_keranjang,$isi->id_buku])}}"
                                                        class="btn btn-success">+</a>
                                                </div>
                                            </td>
                                            <td class="product-total-col">
                                                <span class="product-price-special">Rp.
                                                    {{number_format( $isi->total)}}</span>
                                            </td>
                                            <td class="product-total-col">
                                                <span class="product-price-special">{{$ttberat}}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('hapus-cart',$isi->id_keranjang)}}"
                                                    class="close-button"><i class="fa fa-trash"></i>
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
                                        <div class="tab-container left clearfix">




                                            <!-- Begin tab content -->
                                            <div class="col-md-12">

                                                <input type="hidden" name="city_origin" id="city_origin" value="20">
                                                <input type="hidden" name="city_destination" id="city_destination"
                                                    value="{{Auth::user()->city_id}}">
                                                <input type="hidden" value="{{$totberat}}" name="weight" id="weight">

                                                <div class="tab-pane fade in active">
                                                    <div class=" col-md-6 form-group">
                                                        <br>
                                                        <label>Pilih Logistik</label>
                                                        <select class="form-control kurir" name="courier">
                                                            <option value="0">-- pilih kurir --</option>
                                                            <option value="jne">JNE</option>
                                                            <option value="pos">POS</option>
                                                            <option value="tiki">TIKI</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <br> <br>
                                                        <button class="btn btn-md btn-primary btn-block btn-check">CEK
                                                            ONGKOS KIRIM</button>
                                                    </div>
                                                    <div class="col-md-12">
                                                    </div>
                                                </div>

                                                <!-- /.tab-pane -->
                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="card d-none ongkir">
                                                        <div class="card-body">

                                                            <ul class="form-group" id="ongkir"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.tab-content -->
                                        </div>
                                        <!-- /.tab-container -->



                                        <div class="mt-30"></div>

                                    </div>

                                    <div class="mt-30 visible-sm visible-xs clearfix"></div>

                                    <div class="col-md-4">

                                        <table class="table total-table">

                                            <tbody>
                                                <tr>
                                                    <td class="total-table-title">Subtotal:</td>
                                                    <td> Rp. {{number_format($subtotal)}}
                                    </div>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td class="total-table-title">Ongkir:</td>
                                        <td>
                                            <div id="costvalue"></div>
                                        </td>
                                    </tr>

                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <td>Total:</td>
                                            <td>
                                                <div id="total"></div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    </table>
                                    <!-- End table -->

                                    <div class="mt-30">
                                        <div class="text-right">
                                            <form action="{{route('simpan-trans')}}" method="post">
                                                @csrf
                                                <input type="hidden" readonly name="invoice" value="{{$invoice}}">
                                                <input type="hidden" readonly name="subtotal" value="{{$subtotal}}">
                                                <input type="hidden" class="form-control" name="costvalue"
                                                    id="costvalue1">
                                                <input type="hidden" readonly name="total" id="total1">

                                                <a href="{{route('home')}}" class="btn btn-warning">Continue
                                                    Shopping</a>
                                                <button type="submit" class="btn btn-primary ">Checkout</button>
                                                <!-- <a href="#" class="btn btn-custom-6 btn-lger min-width-sm">Checkout</a> -->
                                        </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('#costvalue').html('Rp. 0')
        $('#total').html('Rp. 0')
        //ajax check ongkir
        let isProcessing = false;
        $('.btn-check').click(function (e) {
            e.preventDefault();

            let token = $("meta[name='csrf-token']").attr("content");
            let city_origin = $('#city_origin').val();
            let city_destination = $('#city_destination').val();
            let courier = $('select[name=courier]').val();
            let weight = $('#weight').val();

            if (isProcessing) {
                return;
            }

            isProcessing = true;
            jQuery.ajax({
                url: "/cart",
                data: {
                    _token: token,
                    city_origin: city_origin,
                    city_destination: city_destination,
                    courier: courier,
                    weight: weight,
                },
                dataType: "JSON",
                type: "POST",
                success: function (response) {
                    isProcessing = false;
                    if (response) {
                        $('#ongkir').empty();
                        $('.ongkir').addClass('d-block');
                        $.each(response[0]['costs'], function (key, value) {
                            // $('#ongkir').append('<li class="list-group-item">'+response[0].code.toUpperCase()+' : <strong>'+value.service+'</strong> - Rp. '+value.cost[0].value+' ('+value.cost[0].etd+' hari)</li>')
                            $('#ongkir').append('<input onclick="hasil_cost(' +
                                value.cost[0].value +
                                ')" type="radio" name="cost" id="cost" value=' +
                                value.cost[0].value + '> &nbsp;<strong> ' +
                                value.service + ' </strong> - Rp. ' + value
                                .cost[0].value + ' (' + value.cost[0].etd +
                                ' Hari)<br>');
                        });

                    }
                }
            });

        });

    });

    function hasil_cost(cost) {
        var subtotal = {
            {
                $subtotal
            }
        };
        var total = parseInt(cost) + parseInt(subtotal)
        $('#costvalue').html('Rp.' + cost)
        $('#total').html('Rp.' + total)
        $('#costvalue1').val(cost)
        $('#total1').val(total)


    }

</script>


@endsection
