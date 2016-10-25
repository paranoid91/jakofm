<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tab extends Model
{
    protected $fillable = ['page_id', 'lang_id', 'lang', 'title', 'tab_name'];

    protected $table = 'tabs';

    public $timestamps = false;

    public function page()
    {
        return $this->belongsTo('App\Page', 'lang_id');
    }

    public function tabData()
    {
        return $this->hasMany('App\TabData', 'tab_id', 'id');
    }

    public function addLanguageId($lang_id)
    {
        $this->update(['lang_id'=>$lang_id]);
    }
}
