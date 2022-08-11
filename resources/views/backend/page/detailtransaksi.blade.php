@extends('backend/template')
@section('title')
Detail Transaksi
@endsection
@section('content')
<!-- start main content -->
<!-- Main content starts -->

<div class="main-block">



    <div class="row">

        <!-- Actual content -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- Shopping items content -->
                    <div>
                        <!-- Block Title -->

                        <!-- Shopping Edit Profile -->
                        <div>
                            <!-- Recent Purchase Table -->
                            <div class="col-md-12">
                                <br>
                                <table class="table table-striped table-hover">
                                    <!-- Table Header -->
                                    <tbody>
                                        <tr>
                                            <td width="300">ID Transaksi</td>
                                            <td width="30">:</td>
                                            <td>TRANS-{{$transaksi->id_transaksi}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Transaksi</td>
                                            <td>:</td>
                                            <td>{{$transaksi->tgl}}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Belanja</td>
                                            <td>:</td>
                                            <td>Rp. {{number_format($transaksi->sub_total)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Ongkir</td>
                                            <td>:</td>
                                            <td>Rp. {{number_format($transaksi->ongkir)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Bayar</td>
                                            <td>:</td>
                                            <td>Rp. {{number_format($transaksi->tot_bayar)}}</td>
                                        </tr>

                                        <!-- Product image -->

                                    </tbody>
                                </table>
                                <br>
                                <table class="table table-striped table-hover">
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
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
