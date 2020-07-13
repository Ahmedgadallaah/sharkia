<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('lang/{locale}', function($locale){
    session()->put('locale',$locale);
    return Redirect()->back();
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth'] ], function() {

    Route::get('/',function(){
        return view('admin.home');
    });

    //---------employee routes---------------------------


     Route::get('/employee/delete/{id}','EmployeeController@destroy');
     Route::get('/employee/edit/{id}','EmployeeController@edit');
     Route::post('/employee/edit/{id}','EmployeeController@update');
     Route::get('/employee/create',  'EmployeeController@create');
     Route::get('employee/', 'EmployeeController@index');
     Route::post('/employee/store', 'EmployeeController@store');

     Route::get('employee/InActive_employee/{id}', 'EmployeeController@InActive');
     Route::get('employee/Active_employee/{id}', 'EmployeeController@Active');

    //---------governer routes---------------------------


      Route::get('/governer/delete/{id}','GovernerController@destroy');
      Route::get('/governer/edit/{id}','GovernerController@edit');
      Route::post('/governer/edit/{id}','GovernerController@update');
      Route::get('/governer/create',  'GovernerController@create');
      Route::get('governer/', 'GovernerController@index');
      Route::post('/governer/store', 'GovernerController@store');

      Route::get('governer/InActive_governer/{id}', 'GovernerController@InActive');
      Route::get('governer/Active_governer/{id}', 'GovernerController@Active');

    //---------entity routes---------------------------


      Route::get('/entity/delete/{id}','EntityController@destroy');
      Route::get('/entity/edit/{id}','EntityController@edit');
      Route::post('/entity/edit/{id}','EntityController@update');
      Route::get('/entity/create',  'EntityController@create');
      Route::get('entity/', 'EntityController@index');
      Route::post('entity/store', 'EntityController@store');

      Route::get('entity/InActive_entity/{id}', 'EntityController@InActive');
      Route::get('entity/Active_entity/{id}', 'EntityController@Active');


    //---------body routes---------------------------


      Route::get('/body/delete/{id}','BodyController@destroy');
      Route::get('/body/edit/{id}','BodyController@edit');
      Route::post('/body/edit/{id}','BodyController@update');
      Route::get('/body/create',  'BodyController@create');
      Route::get('body/', 'BodyController@index');
      Route::post('body/store', 'BodyController@store');

      Route::get('body/InActive_body/{id}', 'BodyController@InActive');
      Route::get('body/Active_body/{id}', 'BodyController@Active');

    //---------body routes---------------------------


      Route::get('/city/delete/{id}','CityController@destroy');
      Route::get('/city/edit/{id}','CityController@edit');
      Route::post('/city/edit/{id}','CityController@update');
      Route::get('/city/create',  'CityController@create');
      Route::get('city/', 'CityController@index');
      Route::post('city/store', 'CityController@store');

      Route::get('city/InActive_city/{id}', 'CityController@InActive');
      Route::get('city/Active_city/{id}', 'CityController@Active');

    //---------body routes---------------------------


      Route::get('/company/delete/{id}','CompanyController@destroy');
      Route::get('/company/edit/{id}','CompanyController@edit');
      Route::post('/company/edit/{id}','CompanyController@update');
      Route::get('/company/create',  'CompanyController@create');
      Route::get('company/', 'CompanyController@index');
      Route::post('company/store', 'CompanyController@store');

      Route::get('company/InActive_company/{id}', 'CompanyController@InActive');
      Route::get('company/Active_company/{id}', 'CompanyController@Active');

    //---------body routes---------------------------


      Route::get('/directorate/delete/{id}','DirectorateController@destroy');
      Route::get('/directorate/edit/{id}','DirectorateController@edit');
      Route::post('/directorate/edit/{id}','DirectorateController@update');
      Route::get('/directorate/create',  'DirectorateController@create');

      Route::get('directorate/', 'DirectorateController@index');
      Route::post('directorate/store', 'DirectorateController@store');

      Route::get('directorate/InActive_directorate/{id}', 'DirectorateController@InActive');
      Route::get('directorate/Active_directorate/{id}', 'DirectorateController@Active');

      //---------Media Governer routes---------------------------


      Route::get('/media_governer/delete/{id}','Media_GovernerController@destroy');
      Route::get('/media_governer/edit/{id}','Media_GovernerController@edit');
      Route::post('/media_governer/edit/{id}','Media_GovernerController@update');
      Route::get('/media_governer/images/{id}','Media_GovernerController@image');
      Route::get('/media_governer/create',  'Media_GovernerController@create');
      Route::get('media_governer/', 'Media_GovernerController@index');
      Route::post('media_governer/store', 'Media_GovernerController@store');

      Route::get('media_governer/InActive_media_governer/{id}', 'Media_GovernerController@InActive');
      Route::get('media_governer/Active_media_governer/{id}', 'Media_GovernerController@Active');


       //---------Media Governer routes---------------------------


       Route::get('/media_media/delete/{id}','Media_MediaController@destroy');
       Route::get('/media_media/edit/{id}','Media_MediaController@edit');
       Route::post('/media_media/edit/{id}','Media_MediaController@update');
       Route::get('/media_media/images/{id}','Media_MediaController@image');
       Route::get('/media_media/create',  'Media_MediaController@create');
       Route::get('media_media/', 'Media_MediaController@index');
       Route::post('media_media/store', 'Media_MediaController@store');

       Route::get('media_media/InActive_media_media/{id}', 'Media_MediaController@InActive');
       Route::get('media_media/Active_media_media/{id}', 'Media_MediaController@Active');

     //---------Media Minister routes---------------------------


     Route::get('/media_minister/delete/{id}','Media_MinisterController@destroy');
     Route::get('/media_minister/edit/{id}','Media_MinisterController@edit');
     Route::post('/media_minister/edit/{id}','Media_MinisterController@update');
     Route::get('/media_minister/images/{id}','Media_MinisterController@image');
     Route::get('/media_minister/create',  'Media_MinisterController@create');
     Route::get('media_minister/', 'Media_MinisterController@index');
     Route::post('media_minister/store', 'Media_MinisterController@store');

     Route::get('media_minister/InActive_media_minister/{id}', 'Media_MinisterController@InActive');
     Route::get('media_minister/Active_media_minister/{id}', 'Media_MinisterController@Active');


      //---------Media Person routes---------------------------


      Route::get('/media_person/delete/{id}','Media_PersonController@destroy');
      Route::get('/media_person/edit/{id}','Media_PersonController@edit');
      Route::post('/media_person/edit/{id}','Media_PersonController@update');
      Route::get('/media_person/images/{id}','Media_PersonController@image');
      Route::get('/media_person/create',  'Media_PersonController@create');
      Route::get('media_person/', 'Media_PersonController@index');
      Route::post('media_person/store', 'Media_PersonController@store');

      Route::get('media_person/InActive_media_person/{id}', 'Media_PersonController@InActive');
      Route::get('media_person/Active_media_person/{id}', 'Media_PersonController@Active');

      //---------Invest section routes---------------------------


      Route::get('/section/delete/{id}','InvestSectionController@destroy');
      Route::get('/section/edit/{id}','InvestSectionController@edit');
      Route::post('/section/edit/{id}','InvestSectionController@update');
      Route::get('/section/images/{id}','InvestSectionController@image');
      Route::get('/section/create',  'InvestSectionController@create');
      Route::get('section/', 'InvestSectionController@index');
      Route::post('section/store', 'InvestSectionController@store');

      Route::get('section/InActive_section/{id}', 'InvestSectionController@InActive');
      Route::get('section/Active_section/{id}', 'InvestSectionController@Active');

    //---------Invest chance routes---------------------------


      Route::get('/chance/delete/{id}','InvestChanceController@destroy');
      Route::get('/chance/edit/{id}','InvestChanceController@edit');
      Route::post('/chance/edit/{id}','InvestChanceController@update');
      Route::get('/chance/images/{id}','InvestChanceController@image');
      Route::get('/chance/create',  'InvestChanceController@create');
      Route::get('chance/', 'InvestChanceController@index');
      Route::post('chance/store', 'InvestChanceController@store');

      Route::get('chance/InActive_chance/{id}', 'InvestChanceController@InActive');
      Route::get('chance/Active_chance/{id}', 'InvestChanceController@Active');


          //---------Invest map routes---------------------------


      Route::get('/map/delete/{id}','InvestMapController@destroy');
      Route::get('/map/edit/{id}','InvestMapController@edit');
      Route::post('/map/edit/{id}','InvestMapController@update');
      Route::get('/map/images/{id}','InvestMapController@image');
      Route::get('/map/create',  'InvestMapController@create');
      Route::get('map/', 'InvestMapController@index');
      Route::post('map/store', 'InvestMapController@store');

      Route::get('map/InActive_map/{id}', 'InvestMapController@InActive');
      Route::get('map/Active_map/{id}', 'InvestMapController@Active');

    //---------Invest role routes---------------------------


      Route::get('/role/delete/{id}','InvestRoleController@destroy');
      Route::get('/role/edit/{id}','InvestRoleController@edit');
      Route::post('/role/edit/{id}','InvestRoleController@update');
      Route::get('/role/images/{id}','InvestRoleController@image');
      Route::get('/role/create',  'InvestRoleController@create');
      Route::get('role/', 'InvestRoleController@index');
      Route::post('role/store', 'InvestRoleController@store');

      Route::get('role/InActive_role/{id}', 'InvestRoleController@InActive');
      Route::get('role/Active_role/{id}', 'InvestRoleController@Active');

    //---------Invest egyptmap routes---------------------------


    Route::get('/egyptmap/delete/{id}','InvestEgyptmapController@destroy');
    Route::get('/egyptmap/edit/{id}','InvestEgyptmapController@edit');
    Route::post('/egyptmap/edit/{id}','InvestEgyptmapController@update');
    Route::get('/egyptmap/images/{id}','InvestEgyptmapController@image');
    Route::get('/egyptmap/create',  'InvestEgyptmapController@create');
    Route::get('egyptmap/', 'InvestEgyptmapController@index');
    Route::post('egyptmap/store', 'InvestEgyptmapController@store');
    Route::get('egyptmap/InActive_egyptmap/{id}', 'InvestEgyptmapController@InActive');
    Route::get('egyptmap/Active_egyptmap/{id}', 'InvestEgyptmapController@Active');

        //---------Invest egyptmap routes---------------------------


        Route::get('/egypttitle/delete/{id}','InvEgytitleController@destroy');
        Route::get('/egypttitle/edit/{id}','InvEgytitleController@edit');
        Route::post('/egypttitle/edit/{id}','InvEgytitleController@update');
        Route::get('/egypttitle/images/{id}','InvEgytitleController@image');
        Route::get('/egypttitle/create',  'InvEgytitleController@create');
        Route::get('egypttitle/', 'InvEgytitleController@index');
        Route::post('egypttitle/store', 'InvEgytitleController@store');
        Route::get('egypttitle/InActive_egypttitle/{id}', 'InvEgytitleController@InActive');
        Route::get('egypttitle/Active_egypttitle/{id}', 'InvEgytitleController@Active');


        //---------Invest devmap routes---------------------------


        Route::get('/devmap/delete/{id}','InvestDevmapController@destroy');
        Route::get('/devmap/edit/{id}','InvestDevmapController@edit');
        Route::post('/devmap/edit/{id}','InvestDevmapController@update');
        Route::get('/devmap/images/{id}','InvestDevmapController@image');
        Route::get('/devmap/create',  'InvestDevmapController@create');
        Route::get('devmap/', 'InvestDevmapController@index');
        Route::post('devmap/store', 'InvestDevmapController@store');
        Route::get('devmap/InActive_devmap/{id}', 'InvestDevmapController@InActive');
        Route::get('devmap/Active_devmap/{id}', 'InvestDevmapController@Active');

        //---------Invest devmap routes---------------------------
        Route::get('/guide/delete/{id}','InvestGuideController@destroy');
        Route::get('/guide/edit/{id}','InvestGuideController@edit');
        Route::post('/guide/edit/{id}','InvestGuideController@update');
        Route::get('/guide/images/{id}','InvestGuideController@image');
        Route::get('/guide/create',  'InvestGuideController@create');
        Route::get('guide/', 'InvestGuideController@index');
        Route::post('guide/store', 'InvestGuideController@store');
        Route::get('guide/InActive_guide/{id}', 'InvestGuideController@InActive');
        Route::get('guide/Active_guide/{id}', 'InvestGuideController@Active');

        //---------Invest area routes---------------------------
        Route::get('/area/delete/{id}','InvestAreaController@destroy');
        Route::get('/area/edit/{id}','InvestAreaController@edit');
        Route::post('/area/edit/{id}','InvestAreaController@update');
        Route::get('/area/images/{id}','InvestAreaController@image');
        Route::get('/area/create',  'InvestAreaController@create');
        Route::get('area/', 'InvestAreaController@index');
        Route::post('area/store', 'InvestAreaController@store');
        Route::get('area/InActive_area/{id}', 'InvestAreaController@InActive');
        Route::get('area/Active_area/{id}', 'InvestAreaController@Active');

        //---------Invest area Title routes---------------------------
        Route::get('/areatitle/delete/{id}','InvestAreatitleController@destroy');
        Route::get('/areatitle/edit/{id}','InvestAreatitleController@edit');
        Route::post('/areatitle/edit/{id}','InvestAreatitleController@update');
        Route::get('/areatitle/images/{id}','InvestAreatitleController@image');
        Route::get('/areatitle/create',  'InvestAreatitleController@create');
        Route::get('areatitle/', 'InvestAreatitleController@index');
        Route::post('areatitle/store', 'InvestAreatitleController@store');
        Route::get('areatitle/InActive_areatitle/{id}', 'InvestAreatitleController@InActive');
        Route::get('areatitle/Active_areatitle/{id}', 'InvestAreatitleController@Active');

        //---------Antiques  routes---------------------------

        Route::get('/antique/delete/{id}','AntiqueController@destroy');
        Route::get('/antique/edit/{id}','AntiqueController@edit');
        Route::post('/antique/edit/{id}','AntiqueController@update');
        Route::get('/antique/images/{id}','AntiqueController@image');
        Route::get('/antique/create',  'AntiqueController@create');
        Route::get('antique/', 'AntiqueController@index');
        Route::post('antique/store', 'AntiqueController@store');
        Route::get('antique/InActive_antique/{id}', 'AntiqueController@InActive');
        Route::get('antique/Active_antique/{id}', 'AntiqueController@Active');

        //---------Antiques  routes---------------------------

        Route::get('/conference/delete/{id}','ConferenceController@destroy');
        Route::get('/conference/edit/{id}','ConferenceController@edit');
        Route::post('/conference/edit/{id}','ConferenceController@update');
        Route::get('/conference/images/{id}','ConferenceController@image');
        Route::get('/conference/create',  'ConferenceController@create');
        Route::get('conference/', 'ConferenceController@index');
        Route::post('conference/store', 'ConferenceController@store');
        Route::get('conference/InActive_conference/{id}', 'ConferenceController@InActive');
        Route::get('conference/Active_conference/{id}', 'ConferenceController@Active');

        //---------Antiques  routes---------------------------

        Route::get('/desert/delete/{id}','DesertController@destroy');
        Route::get('/desert/edit/{id}','DesertController@edit');
        Route::post('/desert/edit/{id}','DesertController@update');
        Route::get('/desert/images/{id}','DesertController@image');
        Route::get('/desert/create',  'DesertController@create');
        Route::get('desert/', 'DesertController@index');
        Route::post('desert/store', 'DesertController@store');
        Route::get('desert/InActive_deser/{id}', 'DesertController@InActive');
        Route::get('desert/Active_desert/{id}', 'DesertController@Active');

        //---------Antiques  routes---------------------------

        Route::get('/museum/delete/{id}','MuseumController@destroy');
        Route::get('/museum/edit/{id}','MuseumController@edit');
        Route::post('/museum/edit/{id}','MuseumController@update');
        Route::get('/museum/images/{id}','MuseumController@image');
        Route::get('/museum/create',  'MuseumController@create');
        Route::get('museum/', 'MuseumController@index');
        Route::post('museum/store', 'MuseumController@store');
        Route::get('museum/InActive_museum/{id}', 'MuseumController@InActive');
        Route::get('museum/Active_museum/{id}', 'MuseumController@Active');


        //---------countryside  routes---------------------------

        Route::get('/countryside/delete/{id}','CountrysideController@destroy');
        Route::get('/countryside/edit/{id}','CountrysideController@edit');
        Route::post('/countryside/edit/{id}','CountrysideController@update');
        Route::get('/countryside/images/{id}','CountrysideController@image');
        Route::get('/countryside/create',  'CountrysideController@create');
        Route::get('countryside/', 'CountrysideController@index');
        Route::post('countryside/store', 'CountrysideController@store');
        Route::get('countryside/InActive_countryside/{id}', 'CountrysideController@InActive');
        Route::get('countryside/Active_countryside/{id}', 'CountrysideController@Active');

        //---------countryside item  routes---------------------------

        Route::get('/cside/delete/{id}','CsideController@destroy');
        Route::get('/cside/edit/{id}','CsideController@edit');
        Route::post('/cside/edit/{id}','CsideController@update');
        Route::get('/cside/images/{id}','CsideController@image');
        Route::get('/cside/create',  'CsideController@create');
        Route::get('cside/', 'CsideController@index');
        Route::post('cside/store', 'CsideController@store');
        Route::get('cside/InActive_cside/{id}', 'CsideController@InActive');
        Route::get('cside/Active_cside/{id}', 'CsideController@Active');


        //---------Relegion   routes---------------------------

        Route::get('/relegion/delete/{id}','RelegionController@destroy');
        Route::get('/relegion/edit/{id}','RelegionController@edit');
        Route::post('/relegion/edit/{id}','RelegionController@update');
        Route::get('/relegion/images/{id}','RelegionController@image');
        Route::get('/relegion/create',  'RelegionController@create');
        Route::get('relegion/', 'RelegionController@index');
        Route::post('relegion/store', 'RelegionController@store');
        Route::get('relegion/InActive_cside/{id}', 'RelegionController@InActive');
        Route::get('relegion/Active_cside/{id}', 'RelegionController@Active');

        //---------Relitem   routes---------------------------

         Route::get('/relitem/delete/{id}','RelitemController@destroy');
         Route::get('/relitem/edit/{id}','RelitemController@edit');
         Route::post('/relitem/edit/{id}','RelitemController@update');
         Route::get('/relitem/images/{id}','RelitemController@image');
         Route::get('/relitem/create',  'RelitemController@create');
         Route::get('relitem/', 'RelitemController@index');
         Route::post('relitem/store', 'RelitemController@store');
         Route::get('relitem/InActive_relitem/{id}', 'RelitemController@InActive');
         Route::get('relitem/Active_relitem/{id}', 'RelitemController@Active');

        //---------Sport tour   routes---------------------------

        Route::get('/sport/delete/{id}','SportController@destroy');
        Route::get('/sport/edit/{id}','SportController@edit');
        Route::post('/sport/edit/{id}','SportController@update');
        Route::get('/sport/images/{id}','SportController@image');
        Route::get('/sport/create',  'SportController@create');
        Route::get('sport/', 'SportController@index');
        Route::post('sport/store', 'SportController@store');
        Route::get('sport/InActive_sport/{id}', 'SportController@InActive');
        Route::get('sport/Active_sport/{id}', 'SportController@Active');


        //---------Sport tour   routes---------------------------

        Route::get('/arrow/delete/{id}','StaArrowController@destroy');
        Route::get('/arrow/edit/{id}','StaArrowController@edit');
        Route::post('/arrow/edit/{id}','StaArrowController@update');
        Route::get('/arrow/images/{id}','StaArrowController@image');
        Route::get('/arrow/create',  'StaArrowController@create');
        Route::get('arrow/', 'StaArrowController@index');
        Route::post('arrow/store', 'StaArrowController@store');
        Route::get('arrow/InActive_arrow/{id}', 'StaArrowController@InActive');
        Route::get('arrow/Active_arrow/{id}', 'StaArrowController@Active');

        //---------Sport tour   routes---------------------------

        Route::get('/description/delete/{id}','StaDescriptionController@destroy');
        Route::get('/description/edit/{id}','StaDescriptionController@edit');
        Route::post('/description/edit/{id}','StaDescriptionController@update');
        Route::get('/description/images/{id}','StaDescriptionController@image');
        Route::get('/description/create',  'StaDescriptionController@create');
        Route::get('description/', 'StaDescriptionController@index');
        Route::post('description/store', 'StaDescriptionController@store');
        Route::get('description/InActive_description/{id}', 'StaDescriptionController@InActive');
        Route::get('description/Active_description/{id}', 'StaDescriptionController@Active');

        //---------Sport tour   routes---------------------------

        Route::get('/manage/delete/{id}','StaManageController@destroy');
        Route::get('/manage/edit/{id}','StaManageController@edit');
        Route::post('/manage/edit/{id}','StaManageController@update');
        Route::get('/manage/images/{id}','StaManageController@image');
        Route::get('/manage/create',  'StaManageController@create');
        Route::get('manage/', 'StaManageController@index');
        Route::post('manage/store', 'StaManageController@store');
        Route::get('manage/InActive_manage/{id}', 'StaManageController@InActive');
        Route::get('manage/Active_manage/{id}', 'StaManageController@Active');

        //---------Sport tour   routes---------------------------

        Route::get('/smap/delete/{id}','StaMapController@destroy');
        Route::get('/smap/edit/{id}','StaMapController@edit');
        Route::post('/smap/edit/{id}','StaMapController@update');
        Route::get('/smap/images/{id}','StaMapController@image');
        Route::get('/smap/create',  'StaMapController@create');
        Route::get('smap/', 'StaMapController@index');
        Route::post('smap/store', 'StaMapController@store');
        Route::get('smap/InActive_smap/{id}', 'StaMapController@InActive');
        Route::get('smap/Active_smap/{id}', 'StaMapController@Active');

        //---------Sport tour   routes---------------------------

        Route::get('/month/delete/{id}','StaMonthController@destroy');
        Route::get('/month/edit/{id}','StaMonthController@edit');
        Route::post('/month/edit/{id}','StaMonthController@update');
        Route::get('/month/images/{id}','StaMonthController@image');
        Route::get('/month/create',  'StaMonthController@create');
        Route::get('month/', 'StaMonthController@index');
        Route::post('month/store', 'StaMonthController@store');
        Route::get('month/InActive_month/{id}', 'StaMonthController@InActive');
        Route::get('month/Active_month/{id}', 'StaMonthController@Active');

        //---------Sport tour   routes---------------------------

        Route::get('/people/delete/{id}','StaPeopleController@destroy');
        Route::get('/people/edit/{id}','StaPeopleController@edit');
        Route::post('/people/edit/{id}','StaPeopleController@update');
        Route::get('/people/images/{id}','StaPeopleController@image');
        Route::get('/people/create',  'StaPeopleController@create');
        Route::get('people/', 'StaPeopleController@index');
        Route::post('people/store', 'StaPeopleController@store');
        Route::get('people/InActive_people/{id}', 'StaPeopleController@InActive');
        Route::get('people/Active_people/{id}', 'StaPeopleController@Active');

  //---------Sport tour   routes---------------------------

        Route::get('/servgate/delete/{id}','ServgateController@destroy');
        Route::get('/servgate/edit/{id}','ServgateController@edit');
        Route::post('/servgate/edit/{id}','ServgateController@update');
        Route::get('/servgate/images/{id}','ServgateController@image');
        Route::get('/servgate/create',  'ServgateController@create');
        Route::get('servgate/', 'ServgateController@index');
        Route::post('servgate/store', 'ServgateController@store');
        Route::get('servgate/InActive_servgate/{id}', 'ServgateController@InActive');
        Route::get('servgate/Active_servgate/{id}', 'ServgateController@Active');

  //---------Sport tour   routes---------------------------

        Route::get('/servguide/delete/{id}','ServguideController@destroy');
        Route::get('/servguide/edit/{id}','ServguideController@edit');
        Route::post('/servguide/edit/{id}','ServguideController@update');
        Route::get('/servguide/images/{id}','ServguideController@image');
        Route::get('/servguide/create',  'ServguideController@create');
        Route::get('servguide/', 'ServguideController@index');
        Route::post('servguide/store', 'ServguideController@store');
        Route::get('servguide/InActive_servguide/{id}', 'ServguideController@InActive');
        Route::get('servguide/Active_servguide/{id}', 'ServguideController@Active');


  //---------Sport tour   routes---------------------------

        Route::get('/servurgent/delete/{id}','ServurgentController@destroy');
        Route::get('/servurgent/edit/{id}','ServurgentController@edit');
        Route::post('/servurgent/edit/{id}','ServurgentController@update');
        Route::get('/servurgent/images/{id}','ServurgentController@image');
        Route::get('/servurgent/create',  'ServurgentController@create');
        Route::get('servurgent/', 'ServurgentController@index');
        Route::post('servurgent/store', 'ServurgentController@store');
        Route::get('servurgent/InActive_servurgent/{id}', 'ServurgentController@InActive');
        Route::get('servurgent/Active_servurgent/{id}', 'ServurgentController@Active');


        //---------Sport tour   routes---------------------------

        Route::get('/shamap/delete/{id}','ShaMapController@destroy');
        Route::get('/shamap/edit/{id}','ShaMapController@edit');
        Route::post('/shamap/edit/{id}','ShaMapController@update');
        Route::get('/shamap/images/{id}','ShaMapController@image');
        Route::get('/shamap/create',  'ShaMapController@create');
        Route::get('shamap/', 'ShaMapController@index');
        Route::post('shamap/store', 'ShaMapController@store');
        Route::get('shamap/InActive_shamap/{id}', 'ShaMapController@InActive');
        Route::get('shamap/Active_shamap/{id}', 'ShaMapController@Active');


        //---------Sport tour   routes---------------------------

        Route::get('/shaline/delete/{id}','ShaLineController@destroy');
        Route::get('/shaline/edit/{id}','ShaLineController@edit');
        Route::post('/shaline/edit/{id}','ShaLineController@update');
        Route::get('/shaline/images/{id}','ShaLineController@image');
        Route::get('/shaline/create',  'ShaLineController@create');
        Route::get('shaline/', 'ShaLineController@index');
        Route::post('shaline/store', 'ShaLineController@store');
        Route::get('shaline/InActive_shaline/{id}', 'ShaLineController@InActive');
        Route::get('shaline/Active_shaline/{id}', 'ShaLineController@Active');

        //---------Sport tour   routes---------------------------

        Route::get('/shafeast/delete/{id}','ShaFeastController@destroy');
        Route::get('/shafeast/edit/{id}','ShaFeastController@edit');
        Route::post('/shafeast/edit/{id}','ShaFeastController@update');
        Route::get('/shafeast/images/{id}','ShaFeastController@image');
        Route::get('/shafeast/create',  'ShaFeastController@create');
        Route::get('shafeast/', 'ShaFeastController@index');
        Route::post('shafeast/store', 'ShaFeastController@store');
        Route::get('shafeast/InActive_shafeast/{id}', 'ShaFeastController@InActive');
        Route::get('shafeast/Active_shafeast/{id}', 'ShaFeastController@Active');


          //---------Sport tour   routes---------------------------

        Route::get('/shaphoto/delete/{id}','ShaPhotoController@destroy');
        Route::get('/shaphoto/edit/{id}','ShaPhotoController@edit');
        Route::post('/shaphoto/edit/{id}','ShaPhotoController@update');
        Route::get('/shaphoto/images/{id}','ShaPhotoController@image');
        Route::get('/shaphoto/create',  'ShaPhotoController@create');
        Route::get('shaphoto/', 'ShaPhotoController@index');
        Route::post('shaphoto/store', 'ShaPhotoController@store');
        Route::get('shaphoto/InActive_shaphoto/{id}', 'ShaPhotoController@InActive');
        Route::get('shaphoto/Active_shaphoto/{id}', 'ShaPhotoController@Active');

         //---------Sport tour   routes---------------------------

         Route::get('/shadescription/delete/{id}','ShaDescriptionController@destroy');
         Route::get('/shadescription/edit/{id}','ShaDescriptionController@edit');
         Route::post('/shadescription/edit/{id}','ShaDescriptionController@update');
         Route::get('/shadescription/images/{id}','ShaDescriptionController@image');
         Route::get('/shadescription/create',  'ShaDescriptionController@create');
         Route::get('shadescription/', 'ShaDescriptionController@index');
         Route::post('shadescription/store', 'ShaDescriptionController@store');
         Route::get('shadescription/InActive_shadescription/{id}', 'ShaDescriptionController@InActive');
         Route::get('shadescription/Active_shadescription/{id}', 'ShaDescriptionController@Active');

         //---------Sport tour   routes---------------------------

         Route::get('/video/delete/{id}','VideoController@destroy');
         Route::get('/video/edit/{id}','VideoController@edit');
         Route::post('/video/edit/{id}','VideoController@update');
         Route::get('/video/images/{id}','VideoController@image');
         Route::get('/video/create',  'VideoController@create');
         Route::get('video/', 'VideoController@index');
         Route::post('video/store', 'VideoController@store');
         Route::get('video/InActive_video/{id}', 'VideoController@InActive');
         Route::get('video/Active_video/{id}', 'VideoController@Active');

        //---------Sport tour   routes---------------------------

         Route::get('/shacelebrate/delete/{id}','ShaCelebrateController@destroy');
         Route::get('/shacelebrate/edit/{id}','ShaCelebrateController@edit');
         Route::post('/shacelebrate/edit/{id}','ShaCelebrateController@update');
         Route::get('/shacelebrate/images/{id}','ShaCelebrateController@image');
         Route::get('/shacelebrate/create',  'ShaCelebrateController@create');
         Route::get('shacelebrate/', 'ShaCelebrateController@index');
         Route::post('shacelebrate/store', 'ShaCelebrateController@store');
         Route::get('shacelebrate/InActive_shacelebrate/{id}', 'ShaCelebrateController@InActive');
         Route::get('shacelebrate/Active_shacelebrate/{id}', 'ShaCelebrateController@Active');


        //---------Sport tour   routes---------------------------

         Route::get('/shaflagcat/delete/{id}','ShaFlagCatController@destroy');
         Route::get('/shaflagcat/edit/{id}','ShaFlagCatController@edit');
         Route::post('/shaflagcat/edit/{id}','ShaFlagCatController@update');
         Route::get('/shaflagcat/images/{id}','ShaFlagCatController@image');
         Route::get('/shaflagcat/create',  'ShaFlagCatController@create');
         Route::get('shaflagcat/', 'ShaFlagCatController@index');
         Route::post('shaflagcat/store', 'ShaFlagCatController@store');
         Route::get('shaflagcat/InActive_shaflagcat/{id}', 'ShaFlagCatController@InActive');
         Route::get('shaflagcat/Active_shaflagcat/{id}', 'ShaFlagCatController@Active');

        //---------Sport tour   routes---------------------------

         Route::get('/shaflag/delete/{id}','ShaFlagController@destroy');
         Route::get('/shaflag/edit/{id}','ShaFlagController@edit');
         Route::post('/shaflag/edit/{id}','ShaFlagController@update');
         Route::get('/shaflag/images/{id}','ShaFlagController@image');
         Route::get('/shaflag/create',  'ShaFlagController@create');
         Route::get('shaflag/', 'ShaFlagController@index');
         Route::post('shaflag/store', 'ShaFlagController@store');
         Route::get('shaflag/InActive_shaflag/{id}', 'ShaFlagController@InActive');
         Route::get('shaflag/Active_shaflag/{id}', 'ShaFlagController@Active');
    });
