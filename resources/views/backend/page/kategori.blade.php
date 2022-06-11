@extends('backend/template')
@section('title')
Data Kategori
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h5>Data Kategori</h5>
                </div>
                <div class="float-right">
                    <a href="{{route('input-kategori')}}" class="btn btn-info btn-sm">Tambah Data <i></i><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategori as $i=> $isi)
                        <tr>
                            <td>{{$kategori->firstItem() +$i}}</td>
                            <!-- <td>{{ $i + 1 }}</td> -->
                            <td>{{ $isi->nama_kategori }}</td>
                            <td>
                                <a href="{{ route('edit-kategori',$isi->id_kategori) }}" class="btn btn-success"> <i class="fa fa-edit"></i>Edit</a>
                                <a href="{{ route('hapus-kategori',$isi->id_kategori)}}" class="btn btn-danger"> <i class="fa fa-trash"></i>Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="float-left">
                    Showing
                    {{$kategori->firstItem()}}
                    to
                    {{$kategori->lastItem()}}
                </div>
                <div class="float-right">
                    {{$kategori-> links()}}
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
