@extends('backend/template')
@section('title')
    Tambah Buku
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Update Data Buku</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('update-stok-buku')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Buku</label>
                                    <select name="id_buku" id="id_buku" class="form-control" id="">
                                        <option value="" disabled selected>Select Buku</option>
                                        @foreach ($buku as $item)
                                            <option value="{{$item->id_buku}}">{{$item->judul}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control" placeholder="Stok">
                                </div>
                            <button type="submit" class="btn btn-success btn-block ">Simpan</button>


                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
