<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\KategoriDataTable;
use App\Http\Controllers\Controller;
use App\Models\KategoriProkum;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create prokum');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(KategoriDataTable $dataTable)
    {
        $this->authorize('read prokum');
        return $dataTable->render('dashboards.kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.kategori.create');
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
            'nama_kategori' => 'required|unique:kategori_prokum,nama_kategori',
            'deskripsi' => 'required'
        ]);
        $data = [
            'nama_kategori' => Request()->nama_kategori,
            'deskripsi' => Request()->deskripsi
        ];
        KategoriProkum::create($data);
        return redirect('/dashboard/kategori-prokum');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!KategoriProkum::where('id', $id)->first()) {
            abort(404);
        }
        $data = [
            'title' => 'Update Data',
            'url' => 'dashboard/kategori/edit',
            'kategori' => KategoriProkum::where('id', $id)->first(),
        ];
        return view('dashboards/kategori/edit', $data); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!KategoriProkum::where('id', $id)->first()) {
            abort(404);
        }
        $data = [
            'title' => 'Update Data',
            'url' => 'dashboard/kategori/edit',
            'kategori' => KategoriProkum::where('id', $id)->first(),
        ];
        return view('dashboards/kategori/edit', $data); 
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
            'nama_kategori' => 'required',
            'deskripsi' => 'required'
        ]);
        
        $data = [
            'nama_kategori' => Request()->nama_kategori,
            'deskripsi' => Request()->deskripsi
        ];
        KategoriProkum::updateOrCreate(['id' => $id],$data);
        return redirect('/dashboard/kategori-prokum');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = KategoriProkum::find($id);
        if ($kategori->delete()) {
            $message = 'Berhasil dihapus';
        } else {
            $message = 'Gagal menghapus';
        }
        return redirect('/dashboard/kategori')->with('message', $message);
    }
}
