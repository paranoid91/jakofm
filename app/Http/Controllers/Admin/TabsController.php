<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tab;
use Config;
use App\Http\Requests\TabRequest;

class TabsController extends Controller
{
    protected $moduleName= 'tabs';

    /**
     * PagesController constructor.
     */
    public function __construct(){
        $this->middleware('roles',['except'=>get_role_permissions($this->moduleName, ['mainPage'])]); // add page permissions
    }

    /**
     * @param Data $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function mainPage()
    {
        return view('admin.component.tab.main');
    }

    public function index(){
        $tabs = Tab::orderBy('id', 'desc')->paginate(30);
        return view('admin.component.tab.index',compact('tabs'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $pages = \App\Page::select('id', 'page_name')->get();
        return view('admin.component.tab.create', compact('pages'));
    }

    public function store(TabRequest $request)
    {
        $tab = Tab::create($request->all());
        $tab->addLanguageId($tab->id);
        flash()->success(trans('admin.page_added'));
        return redirect(action('Admin\TabsController@index'));
    }

    public function edit(Tab $tab)
    {
        $pages = \App\Page::select('id', 'page_name')->get();
        return view('admin.component.tab.edit',compact('tab', 'pages'));
    }

    public function update(TabRequest $request,Tab $tab){
        $tab->update($request->all()); //update data fields
        return redirect(action('Admin\TabsController@index'));
    }

    public function destroy(Tab $data)
    {
        $data->delete();
        return trans('admin.data_removed');
    }

    public function translate(Tab $tab)
    {
        $count = Tab::where('lang_id',$tab->lang_id)->count(); // count data by language data id
        if($count < count(Config::get('global.languages'))): //check if language data number is < site languages
            $new_data = Tab::create(array_except($tab->toArray(),['id','created_at','status','lang','slug']) + ['status'=>0,'lang'=>'']); //clone current data

            flash()->success(trans('admin.trans_item_created')); // flash message
            return redirect(action('Admin\TabsController@edit',$new_data->id)); //redirect to cloned data
        else:
            flash()->error(trans('admin.you_already_create_items_to_translate'));
            return redirect(action('Admin\TabsController@edit',$tab->id)); // redirect to current data
        endif;
    }
}
