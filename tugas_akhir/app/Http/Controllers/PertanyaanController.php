<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pertanyaan;
use App\Tag;
use Auth;

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
        //$pertanyaan = Pertanyaan::all();
        $user = Auth::user();
        $pertanyaans = $user->pertanyaans;
        //dd($pertanyaan);
        return view('pertanyaan.index', compact('pertanyaans'));
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

        $tags_arr = explode(',' , $request["tags"]);
        $tag_ids = [];

        foreach($tags_arr as $tag_name)
        {
            $tag = Tag::where('tag_name', $tag_name)->first();
            if ($tag){
                $tag_ids[] = $tag->id;
            } else{
                $new_tag = Tag::create(['tag_name' => $tag_name]);
                $tag_ids[] = $new_tag->id;

            }
        }

        $pertanyaan = Pertanyaan::create([
            "judul" => $request["judul"],
            "isi" => $request["isi"]
        ]);

        $pertanyaan->tags()->sync($tag_ids);
        $user = Auth::user();
        $user->posts()->save($pertanyaan);

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
        //dd($pertanyaan);
        $jawabans = $pertanyaan->jawabans;
        return view('pertanyaan.show', compact('pertanyaan'), compact('jawabans'));
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

    public function tepat($id, $jawaban_id)
    {
        // $query = DB::table($this->table)->where('id', $id)->delete();
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->jawaban_tepat_id = $jawaban_id;
        $pertanyaan->save();
        return redirect(route('pertanyaan.show', ['pertanyaan' => $id]));
    }


}
