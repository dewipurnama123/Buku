@extends('backend/template')
@section('title')
Tambah Keranjang
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit Data Keranjang</h5>
            </div>
            <div class="card-body">
                <form action="{{route('update-keranjang',$keranjang->id_keranjang)}}" method="post"  enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Transaksi</label>
                                <select name="transaksi_privat" id="transaksi_privat" class="form-control" id="">
                                    <option value="" disabled selected>Select transaksi</option>
                                    @foreach ($transaksi as $item)
                                        <option value="{{$item->id_transaksi}}">{{$item->id_transaksi}}</option>
                                    @endforeach
                                    <script>
                                        document.getElementById('transaksi_privat').value = '{{$keranjang->id_transaksi}}'
                                    </script>
                                </select>
                                @error('transaksi_privat')
                                    <i class="text-danger">{{$message}}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Buku</label>
                                <select name="buku_privat" id="buku_privat" class="form-control" id="">
                                    <option value="" disabled selected>Select Buku</option>
                                    @foreach ($buku as $item)
                                        <option value="{{$item->id_buku}}">{{$item->judul}}</option>
                                    @endforeach
                                    <script>
                                        document.getElementById('buku_privat').value = '{{$keranjang->id_buku}}'
                                    </script>
                                </select>
                                @error('buku_privat')
                                    <i class="text-danger">{{$message}}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" name="tgl" class="form-control" value="{{ $keranjang->tgl }}" placeholder="Tanggal">
                            </div>
                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="integer" name="stok" class="form-control" value="{{ $keranjang->stok }}" placeholder="Stok">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="">Quantity</label>
                                <input type="integer" name="quantity" id="quantity"  value="{{ $keranjang->quantity}}" class="form-control" placeholder="Quantity">
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="float" name="harga" id="harga_privat"  value="{{ $keranjang->harga}}" class="form-control" placeholder="Harga">
                            </div>
                            <div class="form-group">
                                <label for="">Total</label>
                                <input type="float" name="total" id="total"  value="{{ $keranjang->total}}" class="form-control" placeholder="Total">
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="ket" class="form-control" value="{{ $keranjang->ket }}" placeholder="Keterangan"></textarea>
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
