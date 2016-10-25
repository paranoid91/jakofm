<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Flavy;
use Folklore\Image\Facades\Image;

class TabDataFiles extends Model
{
    protected $fillable = ['tab_data_id', 'title', 'path', 'type'];

    protected $table = 'tab_data_file';

    public $timestamps = false;

    public function tabData()
    {
        return $this->belongsTo('App\TabData', 'tab_data_id');
    }

    public function uploadImages($images,$data_id)
    {
        if(count($images)>0)
        {
            foreach ($images as $image)
            {
                TabDataFiles::create([
                    'tab_data_id' => $data_id,
                    'path'=> $image,
                    'type'=> 'image'
                ]);
            }
        }
    }

    public function uploadAudio($audio, $id)
    {
        if(empty($audio))
            return false;

        $path = 'uploads/audio/';
        $formats = ['.mp3', '.ogg'];

        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        foreach ($audio as $audio_type => $song) {
            if(is_object($song) && get_class($song) == 'Illuminate\Http\UploadedFile' && $song->getClientOriginalExtension() == "mp3")
            {
                $fileName = randStr(20);
                $realName = $song->getClientOriginalName();
                $realName = pathinfo($realName, PATHINFO_FILENAME);

                foreach($formats as $format)
                {
                    Flavy::from($song)->to($path . $fileName . $format)->aBitrate(64)->channels(1)->run();
                }

                TabDataFiles::create([
                    'tab_data_id' => $id,
                    'title' => $realName,
                    'path' => $path . $fileName,
                    'type' => 'audio'
                ]);
            }
        }
    }

    public function removeSong($id)
    {
        $audio = TabDataFiles::findOrFail($id);

        foreach (['.mp3', '.ogg'] as $format)
        {
            if(is_file($audio->path.$format))
            {
                unlink($audio->path.$format);
            }
        }

        $audio->delete();
    }

    public function addVideoLink($links, $id)
    {
        foreach ($links as $link)
        {
            if(!empty($link) && strlen($link)>0)
            {
                $link = getYoutubeVideoId($link);
                TabDataFiles::create([
                    'tab_data_id' => $id,
                    'path' => $link,
                    'type' => 'link'
                ]);
            }
        }
    }

    public function updateImages($images, $id)
    {
        if(empty($images))
        {
            return false;
        }

        TabDataFiles::where('tab_data_id', $id)->where('type','image')->delete();

        return $this->uploadImages($images, $id);
    }

    public function updateVideoLink($links, $id)
    {
        if(count($links)<0)
        {
            return false;
        }

        TabDataFiles::where('tab_data_id', $id)->where('type','link')->delete();

        return $this->addVideoLink($links, $id);
    }
}
