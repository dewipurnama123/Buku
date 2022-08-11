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
                                <label for="">Member</label>
                                <select name="member_privat" id="member_privat" class="form-control" id="">
                                    <option value="" disabled selected>Select Member</option>
                                    @foreach ($member as $item)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                    <script>
                                        document.getElementById('member_privat').value = '{{$keranjang->id_member}}'
                                    </script>
                                </select>
                                @error('member_privat')
                                    <i class="text-danger">{{$message}}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Buku</label>
                                <select onchange="getdata()" name="buku_privat" id="buku_privat" class="form-control" id="">
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
                                <input type="date" name="tgl" class="form-control" value="{{ $keranjang->tgl }}" placeholder="Tgl">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="">Harga</label>
                                <input type="float" name="harga" id="harga_privat"  value="{{ $keranjang->harga}}" class="form-control" placeholder="Harga">
                            </div>
                            <div class="form-group">
                                <label for="">Quantity</label>
                                <input type="integer" name="qty" id="quantity_privat"  value="{{ $keranjang->qty}}" class="form-control" placeholder="Quantity">
                            </div>
                            <div class="form-group">
                                <label for="">Total</label>
                                <input type="float" name="total" id="total"  value="{{ $keranjang->total}}" class="form-control" placeholder="Total">
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
<script>
    function getdata() {
        var buku = $('#buku_privat option:selected').val();
        console.log(buku)
        // alert(buku_privat)
        $.ajax({
            url: '{{ route("data") }}',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    buku: buku,
                },
        })
            .done(function (response) {
                if (response.message == 'ok') {
                    $('#stok_privat').val(response.data.stok);
                    $('#harga_privat').val(response.data.harga);
                }
            })
            .fail(function () {
                console.log("error");
            })
            }
    </script>
    <script>
        // window.print()
        $('#quantity_privat').keyup(function(){
            var quantity = $('#quantity_privat').val();
            var harga = $('#harga_privat').val();
            console.log(harga,quantity);
            //alert(harga)
            if (harga == '') {
                alert("Pilih harga")
            }else{
                var total1 = parseInt(quantity)* parseInt (harga);
                $('#total').val(total1);
            }
        })
    </script>
@endsection
