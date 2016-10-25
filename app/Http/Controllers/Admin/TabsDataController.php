<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TabData;
use Config;
use App\Models\Admin\File;
use App\TabDataFiles;

class TabsDataController extends Controller
{
    protected $moduleName= 'tabs-data';

    public function __construct()
    {
        $this->middleware('roles',['except'=>get_role_permissions($this->moduleName, ['removeAudio'])]); // add page permissions
    }

    public function index()
    {
        $tabs = TabData::orderBy('id', 'desc')->paginate(30);
        return view('admin.component.tab_data.index',compact('tabs'));
    }

    public function create()
    {
        $tabs = \App\Tab::get();
        return view('admin.component.tab_data.create', compact('tabs'));
    }

    public function store(Request $request,TabDataFiles $file)
    {
        dd($request->all());
        $tab = TabData::create($request->all());
        $file->uploadImages(removeEmptyValue($request->input('image')),$tab->id);
        $file->uploadAudio($request->audio,$tab->id);
        $file->addVideoLink($request->video,$tab->id);
        $tab->addLanguageId($tab->id);
        flash()->success(trans('admin.page_added'));
        return redirect(action('Admin\TabsDataController@index'));
    }

    public function edit(TabData $tab_data)
    {
        $tabs = \App\Tab::get();
        return view('admin.component.tab_data.edit',compact('tabs', 'tab_data'));
    }

    public function update(TabData $tab_data, Request $request, TabDataFiles $file)
    {
        $tab_data->update($request->all()); //update data fields
        $file->updateImages(removeEmptyValue($request->input('image')),$tab_data->lang_id);
        $file->uploadAudio($request->audio, $tab_data->lang_id);
        $file->updateVideoLink(removeEmptyValue($request->video), $tab_data->lang_id);
        return redirect(action('Admin\TabsDataController@index'));
    }

    public function destroy(TabData $data, TabDataFiles $tab_file)
    {
        $files = $data->files()->where('type','audio')->get();
        if(count($files)>0)
        {
            foreach ($files as $file)
            {
                $tab_file->removeSong($file->id);
            }
        }
        $data->delete();
        return trans('admin.data_removed');
    }

    public function translate(TabData $tab_data)
    {
        $count = TabData::where('lang_id',$tab_data->lang_id)->count(); // count data by language data id
        if($count < count(Config::get('global.languages'))): //check if language data number is < site languages
            $new_data = TabData::create(array_except($tab_data->toArray(),['id','created_at','status','lang','slug']) + ['status'=>0,'lang'=>'']); //clone current data

            flash()->success(trans('admin.trans_item_created')); // flash message
            return redirect(action('Admin\TabsDataController@edit',$new_data->id)); //redirect to cloned data
        else:
            flash()->error(trans('admin.you_already_create_items_to_translate'));
            return redirect(action('Admin\TabsDataController@edit',$tab_data->id)); // redirect to current data
        endif;
    }

    public function removeAudio($id, \App\TabDataFiles $audio)
    {
        return $audio->removeSong($id);
    }
}
