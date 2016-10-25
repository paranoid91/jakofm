<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PageFormRequest;
use App\Models\Admin\Data;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Config;
use App\Page;


class PagesController extends Controller
{
    /**
     * @var string
     */
    protected $moduleName= 'pages';

    /**
     * PagesController constructor.
     */
    public function __construct(){
        $this->middleware('roles',['except'=>get_role_permissions($this->moduleName)]); // add page permissions
    }

    /**
     * @param Data $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $pages = Page::orderBy('id', 'desc')->paginate(30);
        return view('admin.component.page.index',compact('pages'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
       return view('admin.component.page.create');
    }

    public function store(PageFormRequest $request){
        $page = Page::create($request->all());
        $page->addLanguageId($page->id);
        flash()->success(trans('admin.page_added'));
        return redirect(action('Admin\PagesController@index'));
    }

    public function edit(Page $page){
        return view('admin.component.page.edit',compact('page'));
    }

    public function update(PageFormRequest $request,Page $page){
        $page->update($request->all()); //update data fields
        return redirect(action('Admin\PagesController@index'));
    }

    /**
     * @param Data $data
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     * @throws \Exception
     */
    public function destroy(Page $data){
        $data->delete();
        return trans('admin.data_removed');
    }

    /**
     * @param Data $data
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function translate(Page $page){
        $count = Page::where('lang_id',$page->lang_id)->count(); // count data by language data id
        if($count < count(Config::get('global.languages'))): //check if language data number is < site languages
            $new_data = Page::create(array_except($page->toArray(),['id','created_at','status','lang','slug']) + ['status'=>0,'lang'=>'']); //clone current data

            flash()->success(trans('admin.trans_item_created')); // flash message
            return redirect(action('Admin\PagesController@edit',$new_data->id)); //redirect to cloned data
        else:
            flash()->error(trans('admin.you_already_create_items_to_translate'));
            return redirect(action('Admin\PagesController@edit',$page->id)); // redirect to current data
        endif;
    }

}
