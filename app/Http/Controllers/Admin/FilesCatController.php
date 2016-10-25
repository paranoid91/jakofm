<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CatRequest;
use App\Models\Admin\Cat;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class FilesCatController extends Controller
{
    protected $moduleName = 'files-categories';

    protected $mainCat = 2087;

    /**
     * @var
     */
    protected $categories;

    /**
     * CatController constructor.
     * @param Cat $cat
     */
    public function __construct(Cat $category){
        Cache::rememberForever('files-categories',function() use ($category){
            return $category->select('id','name')->where('parent',$this->mainCat)->get();
        });
        $this->middleware('roles',['except'=>get_role_permissions($this->moduleName)]); // add car roles
    }

    /**
     * @param Cat $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Cat $category){
        $categories = $category->select('id','name','parent')->where('parent',$this->mainCat)->paginate(20);
        $cat = $this->mainCat;
        return view('admin.component.categories.files.index',compact('categories','cat'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $categories = Cache::get('files-categories');
        return view('admin.component.categories.files.create',compact('categories'));
    }

    /**
     * @param Cat $cat
     * @param CatRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Cat $cat, CatRequest $request){
        $cat->create($request->all());
        Cache::forget('files-categories');
        flash()->success(trans('admin.cat_added'));
        return redirect(action('Admin\FilesCatController@index'));
    }

    /**
     * @param Cat $cat
     * @return mixed
     */
    public function edit(Cat $cat){
        $categories = Cache::get('files-categories');
        return view('admin.component.categories.files.edit',compact('cat','categories'));
    }

    /**
     * @param CatRequest $request
     * @param Cat $cat
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CatRequest $request, Cat $cat){
        $cat->update($request->all());
        Cache::forget('files-categories');
        flash()->success(trans('admin.cat_edited'));
        return redirect(action('Admin\FilesCatController@index'));
    }


    /**
     * @param Cat $cat
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Cat $cat){
        Cache::forget('files-categories');
        $cat->delete();
        return trans('admin.cat_removed');
    }
}
