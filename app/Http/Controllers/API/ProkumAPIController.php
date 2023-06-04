<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produkhukum;
use App\Models\KategoriProkum;
use App\Helpers\ResponseFormatter;

class ProkumAPIController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit');
        $nama = $request->input('nama');
        $deskripsi = $request->input('deskripsi');
        $nama_file = $request->input('nama_file');
        $kategori = $request->input('kategori');
        $tahun = $request->input('tahun');

        if ($id) {
            $prokum = Produkhukum::with(['category'])->find($id);
        if ($prokum) {
            return ResponseFormatter::success($prokum, 'Data Prokum berhasil diambil');
            } else {
                return ResponseFormatter::error(null, 'Data prokum tidak ada', 404);
            }        
        }
        $prokum = Produkhukum::with('category');

        if ($nama) {
            $prokum->where('nama', 'Like', '%' . $nama . '%');
        }

        if ($deskripsi) {
            $prokum->where('deskripsi', 'Like', '%' . $deskripsi . '%');
        }

        if ($nama_file) {
            $prokum->where('nama_file', 'Like', '%' . $nama_file . '%');
        }

        if ($kategori) {
            $prokum->where('id_kategori', $kategori);
        }

        if ($tahun) {
            $prokum->where('tahun', $tahun);
        }

        return ResponseFormatter::success(
            $prokum->paginate($limit), 
            'Data prokum berhasil diambil'
        );
    }

    public function chart()
    {
        $kategoris = KategoriProkum::all();
        $summary = [];
        foreach ($kategoris as $kategori) {
            $jumlahProkum = Produkhukum::where('id_kategori', $kategori->id)->count();

            $summary[] = [
                'id_kategori' => $kategori->id,
                'kategori' => $kategori->nama_kategori,
                'jumlah_prokum' => $jumlahProkum,
            ];
        }
        return ResponseFormatter::success($summary, 'Data Berhasil Diambil');
    }
}
