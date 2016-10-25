<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\File;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Author;
use App\Models\Admin\Cat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Config;
use App\Audio;

class AuthorsController extends Controller
{
    protected $moduleName= 'authors';

    private $authors_cat_parent = 2077;

    /**
     * PagesController constructor.
     */
    public function __construct()
    {
        $this->middleware('roles',['except'=>get_role_permissions($this->moduleName,['removeAudio'])]); // add page permissions
    }

    public function index()
    {
        $authors = Author::select('id','name','lang', 'created_at', 'updated_at')->orderBy('id','desc')->paginate(15);
        return view('admin.component.authors.index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $audio_cats = Cat::select('id','name')->where('parent', 2087)->get();
        $cats = Cat::select('id','name')->where('parent', $this->authors_cat_parent)->get();
        return view('admin.component.authors.create', compact('cats','audio_cats'));
    }

    /**
     * @param File $file
     * @return mixed
     */
    public function store(Requests\Admin\AuthorRequest $request, File $file, Audio $audio)
    {
        $created = Auth::user()->author()->create($request->all());
        $created->addCategories($request->input('cat'));
        $files = $file->uploadImages($request->input('img'),$created->id,false);
        $created->addFiles($files);
        $created->addLanguageId($created->id);
        $audio->uploadAudio($request->audio, $created->id);
        Cache::flush();
        flash()->success(trans('admin.data_added'));
        return redirect(action('Admin\AuthorsController@index'));
    }

    public function show($id)
    {
        //
    }

    public function edit(Author $author)
    {
        $audio_cats = Cat::select('id','name')->where('parent', 2087)->get();
        $cats = Cat::select('id','name')->where('parent', $this->authors_cat_parent)->get();
        return view('admin.component.authors.edit',compact('author', 'cats', 'audio_cats'));
    }

    public function update(Request $request,File $file, Author $data, Audio $audio)
    {
        $data->update($request->all()); //update data fields
        $data->updateCategories($request->input('cat'));
        $files = $file->uploadImages($request->input('image'),$data->id,false); //upload images
        $data->updateFiles($files); // update data files
        $audio->uploadAudio($request->audio, $data->lang_id);
        Cache::flush();
        flash()->success(trans('admin.data_updated'));
        return redirect(action('Admin\AuthorsController@index'));
    }

    public function destroy(Author $author)
    {
        $audio_files = $author->audio()->get();

        if(count($audio_files) > 0)
        {
            foreach ($audio_files as $file)
            {
                foreach (['.mp3', '.ogg'] as $format)
                {
                    if(is_file($file->path.$format))
                    {
                        unlink($file->path.$format);
                    }
                    $file->delete();
                }
                
            }
        }

        $author->delete();
        return trans('admin.data_removed');
    }

    public function translate(Author $author)
    {
        $count = Author::where('lang_id',$author->lang_id)->count(); // count data by language data id
        if($count < count(Config::get('global.languages'))): //check if language data number is < site languages
            $new_data = Author::create(array_except($author->toArray(),['id','created_at','status','lang','slug']) + ['status'=>0,'lang'=>'']); //clone current data
            $new_data->addCategories($author->getCategories()); // add categories to cloned data
            $new_data->addFiles($author->getFiles()); // add files to cloned data
            
            flash()->success(trans('admin.trans_item_created')); // flash message
            return redirect(action('Admin\AuthorsController@edit',$new_data->id)); //redirect to cloned data
        else:
            flash()->error(trans('admin.you_already_create_items_to_translate'));
            return redirect(action('Admin\AuthorsController@edit',$author->id)); // redirect to current data
        endif;
    }

    public function removeAudio($id, Audio $audio)
    {
        return $audio->removeSong($id);
    }

}
