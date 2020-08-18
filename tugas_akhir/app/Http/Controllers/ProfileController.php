<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        //
    }

    public function edit($id)
    {
        $profile = Profile::find($id); //SELECT * FROM

        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        $imageName = time().'.'.$request->photo->extension();

        $request->photo->move(public_path('img/profile'), $imageName);

        $imageDir = "img/profile/$imageName";

        $profile = Profile::find($id);
        $profile->update([
            "full_name" => $request["full_name"],
            "phone" => $request["phone"],
            "photo" => $imageDir

        ]);

        $profile->user->update([
            "name" => $request["name"],
            "email" => $request["email"]
        ]);

        Alert::success('Berhasil', 'Berhasil UPDATE Profile');

        return redirect(route('pertanyaan.index'));
    }

}
