<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function index()
    {
        $data['buku'] = DB::table('bukus')
        // singkatan ddcadalah dump die
        //dd($data['buku']);
        ->join('kategoris', 'bukus.id_kategori','=','kategoris.id_kategori')
        // ->get();
        //pagination
        ->simplePaginate(5);
        return view('backend.page.buku', $data);
    }
    public function tambahbuku()
    {
        $data['kategori']=DB::table('kategoris')->get();
        return view('backend.page.inputbuku', $data);
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
            $simpan = Buku::where('id_buku', $id)->update([
                'id_kategori' =>$r->kategori_privat,
                'judul' => $r->judul,
                'penerbit' => $r->penerbit,
                'pengarang' => $r->pengarang,
                'tahun' => $r->tahun,
                'harga' => $r->harga,
                'stok' => $r->stok,
            ]);
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
        $fotoLama = DB::table('buku')->where('id_buku',$id)->first();

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
