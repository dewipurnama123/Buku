@extends('backend/template')
@section('title')
Data Member
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h5>Data Member</h5>
                </div>
                <div class="float-right">
                    <a href="{{route('input-member')}}" class="btn btn-info btn-sm">Tambah Data <i></i><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Provinsi</th>
                            <th>Kecamatan</th>
                            <th>Nohp</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($member as $i=> $isi)
                        <tr>
                            <td>{{$member->firstItem() +$i}}</td>
                            <!-- <td>{{ $i + 1 }}</td> -->
                            <td>{{ $isi->nama }}</td>
                            <td>{{ $isi->alamat }}</td>
                            <td>{{ $isi->provinsi }}</td>
                            <td>{{ $isi->kecamatan }}</td>
                            <td>{{ $isi->nohp }}</td>
                            <td>{{ $isi->email }}</td>
                            <td>
                                <a href="{{ route('edit-member',$isi->id_member) }}" class="btn btn-success"> <i class="fa fa-edit"></i>Edit</a>
                                <a href="{{ route('hapus-member',$isi->id_member)}}" class="btn btn-danger"> <i class="fa fa-trash"></i>Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="float-left">
                    Showing
                    {{$member->firstItem()}}
                    to
                    {{$member->lastItem()}}
                </div>
                <div class="float-right">
                    {{$member->links()}}
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
