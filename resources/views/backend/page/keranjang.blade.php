@extends('backend/template')
@section('title')
Data Keranjang
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h5>Data Keranjang</h5>
                </div>
                <div class="float-right">
                    <a href="{{route('input-keranjang')}}" class="btn btn-info btn-sm">Tambah Data <i></i><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Transaksi</th>
                            <th>Member</th>
                            <th>Buku</th>
                            <th>Tanggal</th>
                            <th>Stok</th>
                            <th>Ket</th>
                            <th>Harga</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keranjang as $i=> $isi)
                        <tr>
                            <td>{{$keranjang->firstItem() +$i}}</td>
                            <!-- <td>{{ $i + 1 }}</td> -->
                            <td>{{ $isi->id_transaksi }}</td>
                            <td>{{ $isi->nama }}</td>
                            <td>{{ $isi->judul }}</td>
                            <td>{{ $isi->tgl }}</td>
                            <td>{{ $isi->stok }}</td>
                            <td>{{ $isi->ket }}</td>
                            <td>Rp. {{ number_format ($isi->harga)}}</td>
                            <td>{{ $isi->quantity}}</td>
                            <td>Rp. {{number_format ($isi->total) }}</td>
                            <td>
                                <a href="{{ route('edit-keranjang',$isi->id_keranjang) }}" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>Edit</a>
                                <a href="{{ route('hapus-keranjang',$isi->id_keranjang)}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i>Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    Showing
                    {{$keranjang->firstItem()}}
                    to
                    {{$keranjang->lastItem()}}
                </div>
                <div class="float-right">
                    {{$keranjang->links()}}
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
