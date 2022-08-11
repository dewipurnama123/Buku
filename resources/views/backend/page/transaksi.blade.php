@extends('backend/template')
@section('title')
Data Transaksi
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h5>Laporan Transaksi</h5>
                </div>
                <div class="float-right">
                    <a href=" {{route('print-transaksi')}}" class="btn btn-print btn-secondary btn-sm">Print <i></i><i class="fa fa-print"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Member</th>
                            <th>Tanggal</th>
                            <th>Bayar</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>
                        @php
                        $total=0;
                        @endphp

                        @foreach($transaksi as $i=> $isi)
                        @php($total+=$isi->tot_bayar)
                        <tr>
                            <td>{{$transaksi->firstItem() +$i}}</td>
                            <!-- <td>{{ $i + 1 }}</td> -->
                            <td>{{ $isi->nama }}</td>
                            <td>{{ $isi->tgl }}</td>
                            <td>Rp. {{number_format($isi->tot_bayar ) }}</td>
                            <td>
                            <a href="{{ route('detail-transaksi',$isi->id_transaksi) }}" class="btn-sm btn btn-info"> <i class="fa fa-info"></i>Detail</a>
                                <a href="{{ route('hapus-transaksi',$isi->id_transaksi)}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i>Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr >
                            <th colspan="3">Total Pemasukan</th>
                            <th>Rp. {{number_format($total)}}</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="float-left">
                    Showing
                    {{$transaksi->firstItem()}}
                    to
                    {{$transaksi->lastItem()}}
                </div>
                <div class="float-right">
                    {{$transaksi->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- alert -->
@if (session('success') == TRUE)
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '{{session("success")}}',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif

@endsection
