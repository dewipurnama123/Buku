<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $data['kategori'] = DB::table('kategoris')
        // ->get();
        //pagination
        ->simplePaginate(10);
        // singkatan ddcadalah dump die
        //dd($data['kategori']);
        return view('backend.page.kategori', $data);
    }
    public function tambahkategori()
    {
        return view('backend.page.inputkategori');
    }
    public function save(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'nama_kategori' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-kategori')
                ->withErrors($validator)
                ->withInput();
        }
        $simpan = Kategori::insert([
            'nama_kategori' => $r->nama_kategori,
        ]);

        if ($simpan == TRUE) {
            return redirect('kategori')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect('input-kategori')->with('error', 'Data gagal disimpan');
        }
    }
    public function editkategori($id)
    {
        $data['kategori'] = DB::table('kategoris')->where('id_kategori', $id)->first();
        return view('backend.page.editkategori', $data);
    }
    public function updatekategori(Request $r, $id)
    {
        $validator = Validator::make($r->all(), [
            'nama_kategori' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-kategori')
                ->withErrors($validator)
                ->withInput();
        }
        $simpan = Kategori::where('id_kategori', $id)->update([
            'nama_kategori' => $r->nama_kategori
        ]);
        if ($simpan == TRUE) {
            return redirect('kategori')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('input-kategori')->with('error', 'Data gagal diubah');
        }
    }

    public function hapuskategori($id)
    {
        $deleted = DB::table('kategoris')->where('id_kategori',$id)->delete();

        if ($deleted == TRUE) {
            return redirect('kategori')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('input-kategori')->with('error', 'Data gagal dihapus');
        }
    }
}
