@extends('backend/template')
@section('title')
Tambah Transaksi
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit Data Transaksi</h5>
            </div>
            <div class="card-body">
                <form action="{{route('update-transaksi',$transaksi->id_member)}}" method="post"  enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Member</label>
                                <select name="member_privat" id="member_privat" class="form-control" id="">
                                    <option value="" disabled selected>Select Kategori</option>
                                    @foreach ($member as $item)
                                        <option value="{{$item->id_member}}">{{$item->nama}}</option>
                                    @endforeach
                                    <script>
                                        document.getElementById('member_privat').value = '{{$transaksi->id_member}}'
                                    </script>
                                </select>
                                @error('member_privat')
                                    <i class="text-danger">{{$message}}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" name="tgl" class="form-control" value="{{ $transaksi->tgl }}" placeholder="Tanggal">
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="text" name="sub_total" class="form-control" value="{{ $transaksi->sub_total }}" placeholder="Jumlah">
                            </div>
                            <div class="form-group">
                                <label for="">Total</label>
                                <input type="text" name="tot_bayar" class="form-control" value="{{ $transaksi->tot_bayar }}" placeholder="Total">
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
