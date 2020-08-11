<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pertanyaan;

class PertanyaanController extends Controller
{
    //construct function
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pertanyaan = DB::table($this->table)->get(); //SELECT * FROM table
        $pertanyaan = Pertanyaan::all();
        //dd($pertanyaan);
        return view('pertanyaan.index', compact('pertanyaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pertanyaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ]);

        // $query = DB::table($this->table)->insert([
        //     "judul" => $request["judul"],
        //     "isi" => $request["isi"]
        // ]);

        $pertanyaan = Pertanyaan::create([
            "judul" => $request["judul"],
            "isi" => $request["isi"]
        ]);

        return redirect('/pertanyaan')->with('success', 'Pertanyaan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $pertanyaan = DB::table($this->table)->where('id', $id)->first(); //SELECT * FROM posts WHERE id
        //dd($post);
        $pertanyaan = Pertanyaan::find($id);
        return view('pertanyaan.show', compact('pertanyaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaan = Pertanyaan::where('id', $id)->first(); //SELECT * FROM

        return view('pertanyaan.edit', compact('pertanyaan'));
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
            'judul' => 'required',
            'isi' => 'required'
        ]);

        //dd($request);
        // $query = DB::table($this->table)
        //             ->where('id', $id)
        //             ->update([
        //                 'judul' => $request['judul'],
        //                 'isi' => $request['isi'],
        //                 'tanggal_diperbaharui' => DB::raw('CURRENT_TIMESTAMP')
        //             ]);

        $update = Pertanyaan::where('id', $id)->update([
            "judul" => $request["judul"],
            "isi" => $request["isi"]
        ]);

        return redirect('/pertanyaan')->with('success', 'Berhasil Update pertanyaan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $query = DB::table($this->table)->where('id', $id)->delete();
        Pertanyaan::destroy($id);
        return redirect('/pertanyaan')->with('success', 'Pertanyaan Berhasil dihapus');
    }
}
