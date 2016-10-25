<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TabData extends Model
{
    protected $fillable = ['tab_id', 'lang_id', 'lang', 'title', 'icon', 'text'];

    protected $table = 'tab_data';

    public $timestamps = false;

    public function tab()
    {
        return $this->belongsTo('App\Tab', 'tab_id');
    }

    public function files()
    {
        return $this->hasMany('App\TabDataFiles','tab_data_id','lang_id');
    }

    public function addLanguageId($lang_id)
    {
        $this->update(['lang_id'=>$lang_id]);
    }


    public function addFiles($files)
    {
        if(count($files) > 0)
        {
            $this->files()->attach($files); // files array[]
        }
    }

    public function updateFiles($files)
    {
        $this->files()->detach();
        if(count($files) > 0)
        {
            $files = unset_by_value($files);
            $this->files()->attach($files); // files array[]
        }
    }
}
