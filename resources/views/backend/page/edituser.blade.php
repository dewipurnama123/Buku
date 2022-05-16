@extends('backend/template')
@section('title')
Tambah User
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Data User</h5>
            </div>
            <div class="card-body">
                <form action="{{route('update-user',$user->id_user)}}" method="post"  enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control" value="{{ $user->username }}" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control" value="{{ $user->password }}" placeholder="Password">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" value="{{ $user->email }}" placeholder="Email">
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
