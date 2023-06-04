<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Produkhukum;
use App\Models\WpWpfbFiles;
use Illuminate\Http\Request;

class ProkumAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queryrepo = WpWpfbFiles::select('file_id as id', 'file_display_name as nama_file', 'file_path', 'file_category_name as kategori_file', 'file_date as created_at')->filter(request(['search']))->get();
        $querylocal = Produkhukum::select('id', 'nama_file', 'path_file', 'id_kategori as kategori_file', 'created_at')->filter(request(['search']))->with('category')->get();
        $result = $queryrepo->merge($querylocal)->sortByDesc('created_at');

        $data = [
            'title' => 'Produk Hukum',
            'active' => 'prokum',
            'prokum' => $result,
        ];
        // return dd($querylocal);
        return view('mobile.prokum', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
