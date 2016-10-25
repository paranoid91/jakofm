<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['lang_id', 'lang', 'title', 'img', 'page_name', 'headline_1', 'headline_2'];

    protected $table = 'pages';

    public $timestamps = false;

    public function tabs()
    {
        return $this->hasMany('App\Tab', 'page_id', 'lang_id');
    }

    public function addLanguageId($lang_id)
    {
        $this->update(['lang_id'=>$lang_id]);
    }
}
