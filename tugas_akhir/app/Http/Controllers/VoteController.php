<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Pertanyaan;
use App\Jawaban;
use RealRashid\SweetAlert\Facades\Alert;

class VoteController extends Controller
{
    public function pertanyaan($id, $poin)
    {
        $pertanyaan = Pertanyaan::find($id);
        // (kondisi) ? (jika true) : (jika false);
        //jika poin = 1 (upvote) mengambil user yang  membuat pertanyaan, jika false mengambil  user yang melakukan downvote
        ($poin == 1) ? $user = $pertanyaan->user : $user = Auth::user();

        $poin_user = $user->profile->poin;

        //jika (upvote) +10, jika false -1
        ($poin == 1) ? $poin_user += $poin*10 : $poin_user += $poin;

        //simpan di poin dan save di DB
        $user->profile->poin = $poin_user;
        $user->profile->save();

        $vote = $pertanyaan->votes()->create([
            "poin" => $poin,
            "user_id" => $user->id
        ]);

        Alert::success('Berhasil', 'Berhasil melakukan Vote');
        return redirect(route('pertanyaan.show', ['pertanyaan' => $id]));
    }

    public function jawaban($Pid, $Jid, $poin)
    {
        $jawaban = Jawaban::find($Jid);
        // (kondisi) ? (jika true) : (jika false);
        //jika poin = 1 (upvote) mengambil user yang  membuat jawaban, jika false mengambil  user yang melakukan downvote
        ($poin == 1) ? $user = $jawaban->user : $user = Auth::user();

        $poin_user = $user->profile->poin;

        //jika (upvote) +10, jika false -1
        ($poin == 1) ? $poin_user += $poin*10 : $poin_user += $poin;

        //simpan di poin dan save di DB
        $user->profile->poin = $poin_user;
        $user->profile->save();

        $vote = $jawaban->votes()->create([
            "poin" => $poin,
            "user_id" => Auth::user()->id
        ]);

        Alert::success('Berhasil', 'Berhasil melakukan Vote');
        return redirect(route('pertanyaan.show', ['pertanyaan' => $Pid]));
    }
}
