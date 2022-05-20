@extends('backend/template')
@section('title')
Data Buku
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h5>Data Buku</h5>
                </div>
                <div class="float-right">
                    <a href="{{route('input-buku')}}" class="btn btn-info btn-sm">Tambah Data <i></i><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Penerbit</th>
                            <th>Pengarang</th>
                            <th>Tahun</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($buku as $i=> $isi)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $isi->nama_kategori }}</td>
                            <td>{{ $isi->judul }}</td>
                            <td>{{ $isi->penerbit }}</td>
                            <td>{{ $isi->pengarang }}</td>
                            <td>{{ $isi->tahun }}</td>
                            <td>{{ $isi->harga }}</td>
                            <td>{{ $isi->stok }}</td>
                            <td><img src="{{asset('gambar/'.$isi->gambar)}}"  width="30%" alt=""></td>
                            <td>
                                <a href="{{ route('edit-buku',$isi->id_buku) }}" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>Edit</a>
                            </td>
                            <td>
                            <a href="{{ route('hapus-buku',$isi->id_buku)}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i>Hapus</a>
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
