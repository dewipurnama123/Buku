@extends('backend/template')
@section('title')
    Tambah Buku
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Data Buku</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('simpan-buku')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="kategori_privat" id="kategori_privat" class="form-control" id="">
                                        <option value="" disabled selected>Select Kategori</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{$item->id_kategori}}">{{$item->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_privat')
                                        <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Judul</label>
                                    <input type="text" name="judul" class="form-control" placeholder="Judul">
                                </div>
                                <div class="form-group">
                                    <label for="">Penerbit</label>
                                    <input type="text" name="penerbit" class="form-control" placeholder="Penerbit">
                                </div>
                                <div class="form-group">
                                    <label for="">Pengarang</label>
                                    <input type="text" name="pengarang" class="form-control" placeholder="Pengarang">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tahun</label>
                                    <input type="number" name="tahun" class="form-control" placeholder="Pengarang">
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="float" name="harga" class="form-control" placeholder="Harga">
                                </div>
                                <div class="form-group">
                                    <label for="">Stok</label>
                                    <input type="integer" name="stok" class="form-control" placeholder="Stok">
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <input type="file" name="gambar" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-block ">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
