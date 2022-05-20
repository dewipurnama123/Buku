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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Transaksi</th>
                            <th>Buku</th>
                            <th>Tanggal</th>
                            <th>Stok</th>
                            <th>Ket</th>
                            <th>Quantity</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keranjang as $i=> $isi)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $isi->id_transaksi }}</td>
                            <td>{{ $isi->judul }}</td>
                            <td>{{ $isi->tgl }}</td>
                            <td>{{ $isi->stok }}</td>
                            <td>{{ $isi->ket }}</td>
                            <td>{{ $isi->quantity}}</td>
                            <td>{{ $isi->harga}}</td>
                            <td>{{ $isi->total }}</td>
                            <td>
                                <a href="{{ route('edit-keranjang',$isi->id_keranjang) }}" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>Edit</a>
                                <a href="{{ route('hapus-keranjang',$isi->id_keranjang)}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i>Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
