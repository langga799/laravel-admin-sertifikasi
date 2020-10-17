<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;
use App\Kategori;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pagename = 'Data Tugas';
        $data = Task::all();
        // dd($data);
        return view('admin.tugas.index', compact('data','pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_kategori = Kategori::all();
        $pagename = "Form Tambah Tugas";
        return view('admin.tugas.create', compact('pagename','data_kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $request->validate([
            'txtnama_tugas' => 'required',
            'optionid_kategori' => 'required',
            'txtketerangan_tugas' => 'required',
            'radiostatus_tugas' => 'required'

        ]);

        $data_tugas = new Task([
            'nama_tugas' => $request->get('txtnama_tugas'),
            'id_kategori' => $request->get('optionid_kategori'),
            'ket_tugas' => $request->get('txtketerangan_tugas'),
            'status_tugas' => $request->get('radiostatus_tugas')
        ]);

        // dd($data_tugas);
        $data_tugas->save();
        return redirect('admin/tugas')->with('sukses', 'Tugas berhasil disimpan');
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
        $data_kategori = Kategori::all();
        $pagename = "Update Tugas";
        $data = Task::find($id);
        return view('admin.tugas.edit', compact('data', 'pagename', 'data_kategori'));
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
        $request->validate([
        'txtnama_tugas' => 'required',
        'optionid_kategori' => 'required',
        'txtketerangan_tugas' => 'required',
        'radiostatus_tugas' => 'required',

]);

        $updatetugas = Task::find($id);

        $updatetugas->nama_tugas = $request->get('txtnama_tugas');
        $updatetugas->id_kategori = $request->get('optionid_kategori');
        $updatetugas->ket_tugas = $request->get('txtketerangan_tugas');
        $updatetugas->status_tugas = $request->get('radiostatus_tugas');


// dd($data_tugas);
$updatetugas->save();
return redirect('admin.tugas')->with('sukses', 'Tugas berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Task::find($id);
        $hapus->delete();
        return redirect('admin/tugas')->with('sukses', 'Tugas berhasil dihapus');
    }
}
