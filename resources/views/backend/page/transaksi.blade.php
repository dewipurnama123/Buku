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
                    <h5>Data Transaksi</h5>
                </div>
                <div class="float-right">
                    <a href="{{route('input-transaksi')}}" class="btn btn-info btn-sm">Tambah Data <i></i><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Member</th>
                            <th>Tanggal</th>
                            <th>Invoive</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $i=> $isi)
                        <tr>
                            <td>{{$transaksi->firstItem() +$i}}</td>
                            <!-- <td>{{ $i + 1 }}</td> -->
                            <td>{{ $isi->nama }}</td>
                            <td>{{ $isi->tgl }}</td>
                            <td>{{ $isi->invoice }}</td>
                            <td>
                                <a href="{{ route('edit-transaksi',$isi->id_transaksi) }}" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>Edit</a>
                                <a href="{{ route('hapus-transaksi',$isi->id_transaksi)}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i>Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
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
