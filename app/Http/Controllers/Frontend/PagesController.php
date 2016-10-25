<?php

namespace App\Http\Controllers\Frontend;

use App\Author;
use App\Http\Controllers\Controller;
use App\Models\Admin\Cat;
use Illuminate\Http\Request;
use App\Page;

class PagesController extends Controller
{
    public function index()
    {
        $slider = \App\Slider::select("title", "poster", "link", "sub_title")->orderBy("created_at", "asc")->get();
        return view('Front/index', compact('slider'));
    }

    public function contact()
    {
        return view('Front/contact');
    }

    public function sendContactMail()
    {
        
    }
    
    public function partners()
    {
        $partners = \App\Partner::select('title', 'link', 'file')->orderBy('id', 'desc')->get();
        return view('Front/partners', compact('partners'));
    }

    public function portfolio()
    {
        $page = Page::where('page_name','Portfolio')->where('lang', \App::getLocale())->first();
        return view('Front/view', compact('page'));
    }

    public function voiceBank()
    {
        $authors = Author::select('id', 'lang_id', 'name', 'lang')->where('lang', \App::getLocale())->get();
        $cats = Cat::select('id','name')->where('parent', 2087)->orderBy('name', 'asc')->get();
        return view('Front/voicebank', compact('cats','authors'));
    }

    public function services()
    {
        $page = Page::where('page_name','Services')->where('lang', \App::getLocale())->first();
        return view('Front/view', compact('page'));
    }

    public function aboutUs()
    {
        $page = Page::where('page_name','About Us')->where('lang', \App::getLocale())->first();
        return view('Front/view', compact('page'));
    }
}
