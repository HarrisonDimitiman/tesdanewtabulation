<?php

Auth::routes();

Route::redirect('/','/login');

Route::group(['middleware' => ['auth']],function() { 

    Route::get('/dashboard','DashboardController@index')->name('dashboard.index');

    Route::group(['middleware' => ['role:admin|Judge']],function() { 

        Route::group(['middleware' => ['role:admin|Judge']],function() { 

            
            Route::post('/submitScoreAsexual/{tti_id}/{quali_id}/{crit_id}/{id}','QualificationController@submitScoreAsexual');
            Route::get('/scoreForAsexual/{id}/{quali_id}/{tti_id}/{crit_id}','QualificationController@scoreForAsexual');
            Route::get('/guidelinesAsexual/{asexualcrits_id}','GuidelineAsexualController@index');
            Route::get('/showCritsForAsexual/{id}/{quali_id}/{tti_id}','QualificationController@showCritsForAsexual'); //FOR ASEXUAL QUALI
            Route::get('/contestantShow/{tti_id}/{quali_id}','QualificationController@contestantShow');
            Route::post('/contestantScore','QualificationController@contestantScore'); 
            Route::get('/qualiCon/{quali_id}','QualificationController@index');   
            Route::resource('users','UsersController');   
            Route::resource('institution','InstitutionsController'); 
            Route::resource('asexualcrits','CriteriaAsexualController');   
            Route::resource('asexualguidelines','GuidelineAsexualController');
            Route::resource('feedcrits','CriteriaFeedController');
            Route::resource('feedguidelines','GuidelineFeedController');        
        });
    });    
});
