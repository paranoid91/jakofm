<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the 'web' middleware group to every route
| it contains. The 'web' middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

//DATABASE

Route::group(['middleware' => ['web']], function () {
    //here you can add database routes.
    Route::get('/car/brand','TestController@brand');
    Route::get('/car/model','TestController@model');
    Route::get('/car/model/update','TestController@modelUpdate');
});


//Website
Route::group(['middleware' => ['web']], function () {


    /*
     * Errors
     */
    Route::get('/error/{id}','ErrorsController@show');

    /*
    * Authentication controller for admin panel
    */
    Route::get('/','Admin\Auth\AuthController@auth');
    Route::get('admin/auth','Admin\Auth\AuthController@auth');
    Route::post('admin/login','Admin\Auth\AuthController@postLogin');
    Route::get('admin/logout','Admin\Auth\AuthController@logout');

    // Admin Routes
    Route::group([],function(){

        /*
         * Admin Home Controller
         */
        Route::get('admin/home','Admin\HomeController@index');

        /*
         * Modules Controller routes
         */
        Route::get('admin/modules','Admin\ModulesController@index');

        Route::get('admin/modules/{module}/edit','Admin\ModulesController@edit');
        Route::patch('admin/modules/{module}','Admin\ModulesController@update');

        Route::get('admin/modules/create','Admin\ModulesController@create');
        Route::post('admin/modules','Admin\ModulesController@store');

        Route::post('admin/modules/{module}','Admin\ModulesController@destroy');

        Route::put('admin/modules/active/{module}','Admin\ModulesController@active');
        Route::put('admin/modules/sort/{module}','Admin\ModulesController@sort');

        /*
         * Admin Users Controller routes
         */
        Route::get('admin/users','Admin\UsersController@index');

        Route::get('admin/users/{user}/edit','Admin\UsersController@edit');
        Route::patch('admin/users/{user}','Admin\UsersController@update');

        Route::get('admin/users/create','Admin\UsersController@create');
        Route::post('admin/users','Admin\UsersController@store');

        Route::post('admin/users/{user}','Admin\UsersController@destroy');

        /*
         * Admin Roles Controller
         */
        Route::get('admin/roles','Admin\RolesController@index');

        Route::get('admin/roles/{role}/edit','Admin\RolesController@edit');
        Route::patch('admin/roles/{role}','Admin\RolesController@update');

        Route::get('admin/roles/create','Admin\RolesController@create');
        Route::post('admin/roles','Admin\RolesController@store');

        Route::post('admin/roles/{role}','Admin\RolesController@destroy');


        /*
         * Admin Categories Controller
         */

        Route::get('admin/categories','Admin\CatController@index');
        Route::get('admin/categories/{cat}/edit','Admin\CatController@edit');
        Route::patch('admin/categories/{cat}','Admin\CatController@update');

        Route::get('admin/categories/create','Admin\CatController@create');
        Route::post('admin/categories','Admin\CatController@store');

        Route::get('admin/categories/{cat}','Admin\CatController@show');
        Route::post('admin/categories/{cat}','Admin\CatController@destroy');

        Route::get('admin/categories/{cat}/sub','Admin\CatController@showSubCat');


        Route::resource('admin/creator-categories', 'Admin\AuthorCatController');
        Route::resource('admin/audio-categories', 'Admin\FilesCatController');



        /*
         * Admin Menu Builder
         */

        Route::get('admin/menu','Admin\MenuBuilderController@index');
        Route::get('admin/menu/{cat}/edit','Admin\MenuBuilderController@edit');
        Route::patch('admin/menu/{cat}','Admin\MenuBuilderController@update');

        Route::get('admin/menu/create','Admin\MenuBuilderController@create');
        Route::post('admin/menu','Admin\MenuBuilderController@store');

        Route::post('admin/menu/{cat}','Admin\MenuBuilderController@destroy');
        Route::post('admin/menu/{id}/edit','Admin\MenuBuilderController@custom');

        /*
         * Admin Static Pages
         */

        Route::get('admin/pages','Admin\PagesController@index');
        Route::get('admin/pages/{page}/edit','Admin\PagesController@edit');
        Route::patch('admin/pages/{page}','Admin\PagesController@update');

        Route::get('admin/pages/create','Admin\PagesController@create');
        Route::post('admin/pages','Admin\PagesController@store');

        Route::post('admin/pages/{data}','Admin\PagesController@destroy');
        Route::get('admin/pages/translate/{page}','Admin\PagesController@translate');


        /*
         * Tabs
         * */

        Route::get('admin/data-tabs','Admin\TabsController@mainPage');

        Route::get('admin/tabs','Admin\TabsController@index');
        Route::get('admin/tabs/{tab}/edit','Admin\TabsController@edit');
        Route::patch('admin/tabs/{tab}','Admin\TabsController@update');

        Route::get('admin/tabs/create','Admin\TabsController@create');
        Route::post('admin/tabs','Admin\TabsController@store');

        Route::post('admin/tabs/{data}','Admin\TabsController@destroy');
        Route::get('admin/tabs/translate/{tab}','Admin\TabsController@translate');

        /*
         *  Tabs Data
         *
         */

        Route::get('admin/tabs-data','Admin\TabsDataController@index');
        Route::get('admin/tabs-data/{tab_data}/edit','Admin\TabsDataController@edit');
        Route::get('admin/tabs-data/delete-audio/{id}','Admin\TabsDataController@removeAudio');
        Route::patch('admin/tabs-data/{tab_data}','Admin\TabsDataController@update');

        Route::get('admin/tabs-data/create','Admin\TabsDataController@create');
        Route::post('admin/tabs-data','Admin\TabsDataController@store');

        Route::post('admin/tabs-data/{data}','Admin\TabsDataController@destroy');
        Route::get('admin/tabs-data/translate/{tab_data}','Admin\TabsDataController@translate');

        /*
         * Admin News
         */

        Route::get('admin/news','Admin\NewsController@index');
        Route::get('admin/news/{data}/edit','Admin\NewsController@edit');
        Route::patch('admin/news/{data}','Admin\NewsController@update');

        Route::get('admin/news/create','Admin\NewsController@create');
        Route::post('admin/news','Admin\NewsController@store');

        Route::post('admin/news/{data}','Admin\NewsController@destroy');
        Route::get('admin/news/translate/{data}','Admin\NewsController@translate');


        /*
         * Admin Slider
         */

        Route::get('admin/slider','Admin\SliderController@index');

        Route::get('admin/slider/{slider}/edit','Admin\SliderController@edit');
        Route::patch('admin/slider/{slider}','Admin\SliderController@update');

        Route::get('admin/slider/create','Admin\SliderController@create');
        Route::post('admin/slider','Admin\SliderController@store');

        Route::post('admin/slider/{slider}','Admin\SliderController@destroy');

        /*
         * Admin Services
         */

        Route::get('admin/services','Admin\ServicesController@index');

        Route::get('admin/services/{service}/edit','Admin\ServicesController@edit');
        Route::patch('admin/services/{service}','Admin\ServicesController@update');

        Route::get('admin/services/create','Admin\ServicesController@create');
        Route::post('admin/services','Admin\ServicesController@store');

        Route::post('admin/services/{service}','Admin\ServicesController@destroy');
        Route::get('admin/services/translate/{service}','Admin\ServicesController@translate');


        /*
         * Admin Auto Inspection
         */
        Route::get('admin/inspection','Admin\InspectionController@index');
        Route::get('admin/inspection/{inspection}/edit','Admin\InspectionController@edit');
        Route::patch('admin/inspection/{inspection}','Admin\InspectionController@update');
        Route::post('admin/inspection/delete/{inspection}','Admin\ServicesController@destroy');

        Route::get('admin/inspection/create','Admin\InspectionController@create');
        Route::post('admin/inspection','Admin\InspectionController@store');
        Route::post('admin/inspection/ajax/model','Admin\InspectionController@ajax');

        /*
         * Admin Car Controller
         */

        Route::get('admin/mark-model/create','Admin\CarController@create');
        Route::get('admin/mark-model','Admin\CarController@index');
        Route::post('admin/mark-model','Admin\CarController@store');
        Route::get('admin/mark-model/{cat}/edit','Admin\CarController@edit');
        Route::get('admin/mark-model/{cat}','Admin\CarController@show');

        Route::patch('admin/mark-model/{cat}','Admin\CarController@update');
        Route::post('admin/mark-model/{cat}','Admin\CarController@destroy');


        /*
         * Admin Insurer Controller
         */

        Route::get('admin/insurance/create','Admin\InsurerController@create');
        Route::get('admin/insurance','Admin\InsurerController@index');
        Route::post('admin/insurance','Admin\InsurerController@store');
        Route::get('admin/insurance/{cat}/edit','Admin\InsurerController@edit');
        Route::get('admin/insurance/{cat}','Admin\InsurerController@show');

        Route::patch('admin/insurance/{cat}','Admin\InsurerController@update');
        Route::post('admin/insurance/{cat}','Admin\InsurerController@destroy');

        /*
         * Admin Options Controller
         */

        Route::resource('options','OptionsController');
        Route::post('admin/options/ajax','OptionsController@ajax');

        Route::get('admin/test', 'Admin\testController@index');

        /*
         * voice bank
         */

        Route::get('admin/voice-bank', 'Admin\VoiceBankController@index');
        
        /*
        * authors
        */
        
        Route::get('admin/authors','Admin\AuthorsController@index');
        Route::get('admin/authors/create','Admin\AuthorsController@create');
        Route::post('admin/authors/create','Admin\AuthorsController@store');
        Route::get('admin/authors/{author}//','Admin\AuthorsController@edit');
        Route::get('admin/authors/delete-audio/{id}','Admin\AuthorsController@removeAudio');
        Route::patch('admin/authors/{data}','Admin\AuthorsController@update');
        Route::post('admin/authors/{author}','Admin\AuthorsController@destroy');
        Route::get('admin/authors/translate/{author}','Admin\AuthorsController@translate');

        /*
         * partners
         *
         */

        Route::get('admin/partners','Admin\PartnersController@index');
        Route::get('admin/partners/create','Admin\PartnersController@create');
        Route::post('admin/partners/create','Admin\PartnersController@store');
        Route::get('admin/partners/{partner}//','Admin\PartnersController@edit');
        Route::patch('admin/partners/{partner}','Admin\PartnersController@update');
        Route::post('admin/partners/{partner}','Admin\PartnersController@destroy');

    });

    /*
     * Frontend Routes
     */

    Route::group(['prefix' => LaravelLocalization::setLocale()], function()
    {
        Route::get('/', 'Frontend\PagesController@index');
        Route::get('/partners', 'Frontend\PagesController@partners');
        Route::get('/portfolio', 'Frontend\PagesController@portfolio');
        Route::get('/voicebank', 'Frontend\PagesController@voiceBank');
        Route::get('/services', 'Frontend\PagesController@services');
        Route::get('/aboutus', 'Frontend\PagesController@aboutUs');
        Route::get('/search', 'Frontend\PagesController@search');
        Route::get('/contact', 'Frontend\PagesController@contact');
        Route::post('/contact', 'Frontend\PagesController@sendContactMail');
    });
});
