<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use Auth;

class BukuController extends Controller
{
    public function index()
    {
        // $a = DB::table('tbl_produk')->get();
        // foreach ($a as $aa) {
        //     DB::table('bukus')->insert([
        //         'id_kategori' => $aa->id_kategori,
        //         'judul'=>$aa->judul,
        //         'penerbit'=>$aa->penerbit,
        //         'pengarang'=>$aa->penulis,
        //         'tahun'=>$aa->tahunterbit,
        //         'harga'=>$aa->harga,
        //         'stok'=>10,
        //         'berat'=>$aa->berat,
        //         'gambar'=>$aa->foto,
        //         'desc'=>$aa->deskripsi
        //     ]);
        // }
        $data['buku'] = DB::table('bukus')
        // singkatan ddcadalah dump die
        //dd($data['buku']);
        ->join('kategoris', 'bukus.id_kategori','=','kategoris.id_kategori')
        // ->get();
        //pagination
        ->simplePaginate(10);
        return view('backend.page.buku', $data);
    }
    public function tambahbuku()
    {
        $data['kategori']=DB::table('kategoris')->get();
        return view('backend.page.inputbuku', $data);
    }

    public function tambahstok()
    {
        $data['buku'] = DB::table('bukus')->get();
        return view('backend.page.inputstokbuku',$data);
    }

    public function updatestok(Request $r)
    {
        $tgl = date('Y-m-d');
        //cek data buku
        $cek = DB::table('bukus')->where('id_buku',$r->id_buku)->first();

        //update stok
        $stok = $cek->stok;
        $stokmasuk = $stok + $r->jumlah;
        DB::table('bukus')->where('id_buku',$r->id_buku)->update(['stok' => $stokmasuk]);

        //simpan tabel history
        $simpan = DB::table('histories')->insert(['id_buku' => $r->id_buku, 'jumlah' => $r->jumlah, 'tgl'=>$tgl,'status' => 'Masuk']);
        return back();
    }

    public function tambahrusak()
    {
        $data['buku'] = DB::table('bukus')->get();
        $data['rusak'] = DB::table('histories')->join('bukus','histories.id_buku','bukus.id_buku')->where('histories.status','Rusak')->get();

        return view('backend.page.stokbarangrusak',$data);
    }

    public function kurangStok($id)
    {
        $cek = DB::table('histories')->where('id_history',$id)->first();

        $buku = DB::table('bukus')->where('id_buku',$cek->id_buku)->first();

        $jumlah = $buku->stok - $cek->jumlah;

        $up = DB::table('bukus')->where('id_buku',$cek->id_buku)->update(['stok' => $jumlah]);
            DB::table('histories')->where('id_history',$id)->update(['konfirm' => 1]);
        return back();
    }

    public function stokrusak(Request $r)
    {
        $tgl = date('Y-m-d');
        $cek = DB::table('bukus')->where('id_buku',$r->id_buku)->first();
        //simpan tabel history
        $simpan = DB::table('histories')->insert(['id_buku' => $r->id_buku, 'jumlah' => $r->jumlah, 'tgl'=>$tgl,'status' => 'Rusak']);
        return back();
    }

    public function save(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'kategori_privat'=> 'required',
            'judul' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'tahun' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'gambar'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-buku')
                ->withErrors($validator)
                ->withInput();
        }
        $file = $r->file('gambar');

        $fileName = $file->getClientOriginalName();
        $file->move('gambar/', $fileName);

        $simpan = Buku::insert([
            'id_kategori' =>$r->kategori_privat,
            'judul' => $r->judul,
            'penerbit' => $r->penerbit,
            'pengarang' => $r->pengarang,
            'tahun' => $r->tahun,
            'harga' => $r->harga,
            'stok' => $r->stok,
            'gambar' => $fileName,
        ]);

        if ($simpan == TRUE) {
            return redirect('buku')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect('input-buku')->with('error', 'Data gagal disimpan');
        }
    }
    public function editbuku($id)
    {
        $data['buku'] = DB::table('bukus')->where('id_buku', $id)->first();
        $data['kategori']=DB::table('kategoris')->get();
        return view('backend.page.editbuku', $data);
    }
    public function updatebuku(Request $r, $id)
    {

        if($r->file('gambar') == NULL){
            $data['id_kategori'] = $r->kategori_privat;
                $data['judul'] = $r->judul;
                $data['penerbit'] = $r->penerbit;
                $data['pengarang'] = $r->pengarang;
                $data['tahun'] = $r->tahun;
                if(Auth::user()->level != 'ADMIN')
                {
                    $data['harga'] = $r->harga;
                    $data['stok'] = $r->stok;
                }
            $simpan = Buku::where('id_buku', $id)->update($data);
        }else{
            $file =$r->file('gambar');
            $fileName = $file->getClientOriginalName();
            $file->move('gambar/',$fileName);


            $fotoLama = DB::table('buku')->where('id_buku',$id)->first();

            if($fotoLama->gambar != ''){
                unlink('gambar/'.$fotoLama->gambar);
                $simpan = Buku::where('id_buku', $id)->update([
                    'id_kategori' =>$r->kategori_privat,
                    'judul' => $r->judul,
                    'penerbit' => $r->penerbit,
                    'pengarang' => $r->pengarang,
                    'tahun' => $r->tahun,
                    'harga' => $r->harga,
                    'stok' => $r->stok,
                    'gambar' => $fileName
                ]);
            }


        }
        if ($simpan == TRUE) {
            return redirect('buku')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('input-buku')->with('error', 'Data gagal diubah');
        }
    }

    public function hapusbuku($id)
    {
        $fotoLama = DB::table('bukus')->where('id_buku',$id)->first();

        if($fotoLama->gambar != ''){
            unlink('gambar/'.$fotoLama->gambar);
        }
        $deleted = DB::table('bukus')->where('id_buku',$id)->delete();

        if ($deleted == TRUE) {
            return redirect('buku')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('input-buku')->with('error', 'Data gagal dihapus');
        }
    }
}
