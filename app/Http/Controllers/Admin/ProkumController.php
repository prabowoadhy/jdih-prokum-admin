<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProdukHukumDataTable;
use App\Http\Controllers\Controller;
use App\Models\KategoriProkum;
use App\Models\Produkhukum;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProkumController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create prokum')->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProdukHukumDataTable $dataTable)
    {
        $this->authorize('read prokum');
        // return dd($dataTable);
        return $dataTable->render('dashboards.prokum.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentYear = date('Y');
        $startYear = $currentYear - 10;
        $data = [
            'kategori' => KategoriProkum::all(),
            'status' => ['Berlaku', 'Dicabut', 'Mencabut', 'Diubah', 'Mengubah'],
        ];
        return view('dashboards.prokum.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Request()->validate([
            'nama' => 'required|unique:produkhukum,nama',
            'deskripsi' => 'required',
            'id_kategori' => 'required',
            'status' => 'required',
            'file' => 'required|max:20024',
        ]);
        if (isset(Request()->file)) {
            $file = Request()->file;
            $filename = Str::of(Request()->nama)->slug('-').'.'.$file->extension();
            $file->move(public_path('file_prokum'), $filename);    
        } else {
            $filename = '';
        }
        $data = [
            'nama' => Request()->nama,
            'deskripsi' => Request()->deskripsi,
            'id_kategori' => Request()->id_kategori,
            'status' => Request()->status,
            'nama_file' => $filename,
            'tahun' => Request()->tahun,
            'path_file' => 'file_prokum/'.$filename,
        ];
        Produkhukum::create($data);
        return redirect('/dashboard/prokum');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Produkhukum::where('id', $id)->first()) {
            abort(404);
        }
        $data = [
            'title' => 'Update Data',
            'url' => 'admin/updatedetail',
            'prokum' => Produkhukum::where('id', $id)->first(),
            'kategori' => KategoriProkum::all(),
            'status' => ['Berlaku', 'Dicabut', 'Mencabut', 'Diubah', 'Mengubah'],
        ];
        return view('dashboards/prokum/edit-status', $data); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Produkhukum::where('id', $id)->first()) {
            abort(404);
        }
        $data = [
            'title' => 'Update Data',
            'url' => 'admin/updatedetail',
            'prokum' => Produkhukum::where('id', $id)->first(),
            'kategori' => KategoriProkum::all(),
            'status' => ['Berlaku', 'Dicabut', 'Mencabut', 'Diubah', 'Mengubah'],
        ];
        return view('dashboards.prokum.edit', $data); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Request()->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'id_kategori' => 'required',
        ]);
        if (isset(Request()->file)) {
            $file = Request()->file;
            $filename = Str::of(Request()->nama)->slug('-').'.'.$file->extension();
            $file->move(public_path('file_prokum'), $filename);
            $data = [
                'nama' => Request()->nama,
                'deskripsi' => Request()->deskripsi,
                'id_kategori' => Request()->id_kategori,
                'status' => Request()->status,
                'path_file' => 'file_prokum/'.$filename,
                'nama_file' => $filename,
                'tahun' => Request()->tahun,
            ];
        } else {
            $data = [
                'nama' => Request()->nama,
                'deskripsi' => Request()->deskripsi,
                'id_kategori' => Request()->id_kategori,
                'status' => Request()->status,
                'tahun' => Request()->tahun,
            ];
        } 
        Produkhukum::updateOrCreate(['id' => $id],$data);
        return redirect('/dashboard/prokum');
    }

    public function UbahStatus(Request $request, $id)
    {
        Request()->validate([
            'status' => 'required',
        ]);
        $data = [
            'status' => Request()->status,
        ];
        Produkhukum::updateOrCreate(['id' => $id],$data);
        return redirect('/dashboard/prokum');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Produkhukum::find($id);
        if ($kategori->delete()) {
            $message = 'Berhasil dihapus';
        } else {
            $message = 'Gagal Menghapus';
        }
        return redirect('/dashboard/prokum')->with('message', $message);
    }
}
