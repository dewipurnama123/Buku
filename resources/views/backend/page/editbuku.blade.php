@extends('backend/template')
@section('title')
Tambah Buku
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit Data Buku</h5>
            </div>
            <div class="card-body">
                <form action="{{route('update-buku',$buku->id_buku)}}" method="post"  enctype="multipart/form-data" >
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
                                    <script>
                                        document.getElementById('kategori_privat').value = '{{$buku->id_kategori}}'
                                    </script>
                                </select>
                                @error('kategori_privat')
                                    <i class="text-danger">{{$message}}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" name="judul" class="form-control" value="{{ $buku->judul }}" placeholder="Judul">
                            </div>
                            <div class="form-group">
                                <label for="">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control" value="{{ $buku->penerbit }}" placeholder="Penerbit">
                            </div>
                            <div class="form-group">
                                <label for="">Pengarang</label>
                                <input type="text" name="pengarang" class="form-control" value="{{ $buku->pengarang }}" placeholder="Pengarang">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tahun</label>
                                <input type="number" name="tahun" class="form-control" value="{{ $buku->tahun }}" placeholder="Tahun">
                            </div>
                            @if(Auth::user()->level != 'ADMIN')
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="float" name="harga" class="form-control" value="{{ $buku->harga }}" placeholder="Harga">
                            </div>
                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="text" name="stok" class="form-control" value="{{ $buku->stok }}" placeholder="Stok"></textarea>
                            </div>
                            @else
                                <input type="hidden" name="harga" value="0">
                                <input type="hidden" name="stok" value="0">
                                @endif
                            <div class="form-group">
                                    <label for="">Gambar</label>
                                    <input type="file" name="gambar" class="form-control">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for ="">Gambar Lama</label><br>
                            <img src="{{ asset('gambar/'.$buku->gambar) }}" width="20%" alt="">
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
