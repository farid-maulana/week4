<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JawabanController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'komentar' => 'required',
        ]);

        $pertanyaan = Pertanyaan::find($id);
        $user = Auth::user();

        $komentar = $pertanyaan->komentars()->create([
            'isi' => $request["komentar"],
            'user_id' => $user->id
        ]);


        //$user->komentar_pertanyaans()->save($komentar);
        Alert::success('Berhasil', 'Berhasil menambah pertanyaan baru');

        return redirect(route('pertanyaan.show', ['pertanyaan' => $id]));
    }
}
