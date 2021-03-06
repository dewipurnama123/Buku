@extends('backend/template')
@section('title')
Tambah Member
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Data Member</h5>
            </div>
            <div class="card-body">
                <form action="{{route('update-member',$member->id)}}" method="post"  enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control" value="{{ $member->username }}" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ $member->nama }}" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="{{ $member->alamat }}" placeholder="Alamat">
                            </div>
                            <div class="form-group">
                                <label for="">Provinsi</label>
                                <input type="text" name="province_id" class="form-control" value="{{ $member->province_id }}" placeholder="Provinsi">
                            </div>
                            <div class="form-group">
                                <label for="">Kota</label>
                                <input type="text" name="city_id" class="form-control" value="{{ $member->city_id }}" placeholder="Kota">
                            </div>

                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="number" name="alamat" class="form-control" value="{{ $member->alamat }}" placeholder="Alamat">
                            </div>
                            <div class="form-group">
                                <label for="">Nohp</label>
                                <input type="number" name="nohp" class="form-control" value="{{ $member->nohp }}" placeholder="Nohp">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" value="{{ $member->email }}" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input name="password" class="form-control" value="{{ $member->password }}" placeholder="Paassword">
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block ">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
