<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Flavy;


class Audio extends Model
{
    protected $fillable = ['name', 'path', 'author_id', 'cat_id', 'audio_type'];

    protected $table = 'audio';

    public $timestamps = false;
    
    protected $primaryKey = 'id';

    public function author()
    {
        return $this->belongsTo('App\Author','lang_id','author_id');
    }

    public function cat()
    {
        return $this->hasOne('App\Models\Admin\Cat');
    }


    public function uploadAudio($audio, $author_id)
    {
        $path = 'uploads/audio/';
        $formats = ['.mp3', '.ogg'];

        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        foreach ($audio as $key => $values) {
            $cat_id = $key;
            foreach ($values as $audio_type => $song) {
                if(is_object($song) && get_class($song) == 'Illuminate\Http\UploadedFile' && $song->getClientOriginalExtension() == "mp3")
                {
                    $fileName = randStr(20);
                    $realName = $song->getClientOriginalName();
                    $realName = pathinfo($realName, PATHINFO_FILENAME);

                    foreach($formats as $format)
                    {
                        Flavy::from($song)->to($path . $fileName . $format)->aBitrate(64)->channels(1)->run();
                    }
                    Audio::create([
                        'name' => $realName,
                        'path' => $path . $fileName,
                        'author_id' => $author_id,
                        'cat_id' => $cat_id,
                        'audio_type' => $audio_type
                    ]);
                }
            }
        }

        return 0;
    }

    public function removeSong($id)
    {
        $audio = Audio::findOrFail($id);
        
        foreach (['.mp3', '.ogg'] as $format)
        {
            if(is_file($audio->path.$format))
            {
                unlink($audio->path.$format);
            }
        }
        
        $audio->delete();
    }
}
