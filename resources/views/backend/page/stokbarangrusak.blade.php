@extends('backend/template')
@section('title')
    Tambah Buku
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h5>Pengembalian Buku Rusak</h5>
                    </div>
                    <div class="float-right">
                        @if(Auth::user()->level == 'ADMIN')
                        <button type="button" onclick="rusakbuku()" class="btn btn-primary">Tambah</button>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Buku</th>
                                <th>jumlah</th>
                                <th>pesan</th>
                                @if(Auth::user()->level == 'SUPER ADMIN')
                                <th>aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rusak as $i => $a)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$a->judul}}</td>
                                <td>{{$a->jumlah}}</td>
                                <td>{{$a->pesan}}</td>
                                @if(Auth::user()->level == 'SUPER ADMIN')
                                <td>
                                    @if($a->konfirm != 1)
                                    <a href="{{route('konfirmasi-stok',$a->id_history)}}" class="btn btn-primary">Konfirmasi</button>
                                    @endif
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="rusakbuku">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="{{route('pengembalian-buku-rusak')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
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
                            <input type="number" name="jumlah" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success btn-block ">Simpan</button>

                    </div>
                </form>
            </div>
        </div>
        </div>


        <script>
            function rusakbuku()
            {
                $('#rusakbuku').modal('show')
            }
        </script>
@endsection
