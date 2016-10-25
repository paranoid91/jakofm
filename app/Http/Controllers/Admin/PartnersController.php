<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Partner;
use App\Models\Admin\File;

class PartnersController extends Controller
{
    protected $moduleName = 'partners';


    public function __construct()
    {
        $this->middleware('roles',['except'=>get_role_permissions($this->moduleName)]); // add page permissions
    }

    /**
     * @param Cat $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $partners = Partner::paginate(20);
        return view('admin.component.partners.index',compact('partners'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.component.partners.create');
    }

    /**
     * @param Cat $cat
     * @param CatRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Requests\PartnersRequest $request)
    {
        Partner::create($request->all());
        Cache::flush();
        flash()->success(trans('admin.data_added'));
        return redirect(action('Admin\PartnersController@index'));
    }

    /**
     * @param Cat $cat
     * @return mixed
     */
    public function edit(Partner $partner)
    {
        return view('admin.component.partners.edit',compact('partner'));
    }

    /**
     * @param CatRequest $request
     * @param Cat $cat
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Requests\PartnersRequest $request, Partner $partner)
    {
        $partner->update($request->all());
        Cache::forget('partners');
        flash()->success(trans('admin.partner_edited'));
        return redirect(action('Admin\PartnersController@index'));
    }


    public function destroy(Partner $partner)
    {
        $partner->delete();
        return trans('admin.cat_removed');
    }
}
