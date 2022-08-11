<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <h2 class="text-center mt-2">Laporan Transaksi</h2>
    <hr style="border:1px solid black;">
    <br>
    <div class="container">
        <table>
            <tr>
                <td>Tanggal Cetak</td>
                <td>:</td>
                <td>
                    {{ date('d F Y') }}
                </td>
            </tr>
        </table>
    </div>
    <br>

    <div class="container">

        <table class="table table-bordered mb-4 table-striped">
            <tr>
                <th>No</th>
                <th>Member</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Invoice</th>
                <th>Sub Total</th>
                <th>Total Bayar</th>
            </tr>
            @php
                        $tot=0;
                        @endphp
            @foreach($transaksi as $no => $data)

            @php
            $detail=DB::table('keranjangs')
            ->join('bukus','keranjangs.id_buku','=','bukus.id_buku')
            ->where ('keranjangs.id_transaksi' ,'=', $data->id_transaksi)
            ->get();
            @endphp
            @php($tot+=$data->tot_bayar)
            <tr>
                <td>{{$no+1}}</td>
                <td>{{ $data->nama}}</td>
                <td>

                    @foreach ($detail as $i =>$isi)
                     {{$isi->judul}} <br>
                    @endforeach
                </td>
                <td>{{ date("d-m-Y"), strtotime( $data->tgl)}}</td>
                <td>{{($data->invoice)}}</td>
                <td>Rp.{{ number_format($data->sub_total)}}</td>
                <td>Rp. {{ number_format($data->tot_bayar)}}</td>

            </tr>

            @endforeach

            <tr>
                <td colspan="6" align="center"><b>TOTAL</b></td>
                <td>Rp. {{ number_format($tot)}}</td>



            </tr>
        </table>

        <br>
        <br>

        <div class="float-end text-center" style="padding: 1cm;padding-top:0%">
            <!-- <h6 class="text-center" style="margin-bottom: 2cm;">{{ date('d F Y') }}</h6> -->
            <span>Kepala Toko / Outlet</span><br><br><br><br>
            <span>( ..................................... )</span><br>

        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
