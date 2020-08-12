<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = "pertanyaans";
    protected $fillable = ["judul", "isi"];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function jawabans()
    {
        return $this->hasMany('App\Jawaban');
    }

    public function jawaban_tepat()
    {
        return $this->belongsTo('App\Jawaban');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'pertanyaan_tag', 'pertanyaan_id', 'tag_id');
    }

}
