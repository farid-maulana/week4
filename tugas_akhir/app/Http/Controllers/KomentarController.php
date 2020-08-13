<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Pertanyaan;
use App\Jawaban;
use RealRashid\SweetAlert\Facades\Alert;

class KomentarController extends Controller
{
    public function pertanyaan(Request $request, $id)
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
        Alert::success('Berhasil', 'Berhasil menambah KOMENTAR baru');

        return redirect(route('pertanyaan.show', ['pertanyaan' => $id]));
    }

    public function jawaban(Request $request, $id)
    {
        $request->validate([
            'komentar' => 'required',
        ]);

        $jawaban = Jawaban::find($id);
        $user = Auth::user();

        $komentar = $jawaban->komentars()->create([
            'isi' => $request["komentar"],
            'user_id' => $user->id
        ]);


        //$user->komentar_pertanyaans()->save($komentar);
        Alert::success('Berhasil', 'Berhasil menambah KOMENTAR baru');

        return redirect(route('pertanyaan.show', ['pertanyaan' => $id]));
    }
}
