<?php

Auth::routes();

Route::redirect('/','/login');
Route::get('/', function () {
    if(auth()->user()->quali_id == 1) { 
        return \Redirect::to('/qualiCon/1');
    } else if(auth()->user()->quali_id == 2) { 
        return \Redirect::to('/qualiCon/2');
    }else if(auth()->user()->quali_id == 3) { 
        return \Redirect::to('/qualiCon/3');
    }else if(auth()->user()->quali_id == 4) { 
        return \Redirect::to('/qualiCon/4');
    }else if(auth()->user()->quali_id == 5) { 
        return \Redirect::to('/qualiCon/5');
    }else if(auth()->user()->quali_id == 6) { 
        return \Redirect::to('/qualiCon/6');
    }else if(auth()->user()->quali_id == 7) { 
        return \Redirect::to('/qualiCon/7');
    }else if(auth()->user()->quali_id == 8) { 
        return \Redirect::to('/qualiCon/8');
    }
     else {
        return \Redirect::to('/dashboard');
    }
})->middleware('auth');
Route::group(['middleware' => ['auth']],function() { 

    Route::get('/dashboard','DashboardController@index')->name('dashboard.index');

    Route::group(['middleware' => ['role:admin|Judge']],function() { 

        Route::group(['middleware' => ['role:admin|Judge']],function() { 
            
            Route::get('/feedsGenerateTopTen/{quali_id}','QualificationController@feedsGenerateTopTen');
            Route::post('/submitScoreAsexual/{tti_id}/{quali_id}/{crit_id}/{id}','ScoreAsexualController@submitScoreAsexual');  //vopy
            Route::get('/scoreForAsexual/{id}/{quali_id}/{tti_id}/{crit_id}','ScoreAsexualController@scoreForAsexual'); //vopy

            Route::get('/showScore/{id}/{quali_id}/{tti_id}/{crit_id}','ScoreAsexualController@showScore'); //vopy
            // Route::get('/scoreForAsexual/{id}/{quali_id}/{tti_id}/{crit_id}','ScoreAsexualController@scoreForAsexual'); //vopy
            Route::get('/showCritsForAsexual/{id}/{quali_id}/{tti_id}','ScoreAsexualController@showCritsForAsexual'); //vopy

            Route::get('/guidelinesAsexual/{asexualcrits_id}','GuidelineAsexualController@index');
          
            Route::get('/guidelinesFeed/{feedcrits_id}','GuidelineFeedController@index');
          
            Route::get('/guidelinesKnapsack/{knapsackcrits_id}','GuidelineKnapsackController@index');

            Route::get('/guidelinesBaking/{bakingcrits_id}','GuidelineBakingController@index');

            Route::get('/guidelinesCooking/{cookingcrits_id}','GuidelineCookingController@index');

            Route::get('/guidelinesRestaurant/{restaurantcrits_id}','GuidelineRestaurantController@index');

            Route::get('/guidelinesPatisserie/{patisseriecrits_id}','GuidelinePatisserieController@index');

            Route::get('/guidelinesWelding/{weldingcrits_id}','GuidelineWeldingController@index');


            Route::get('/contestantShow/{tti_id}/{quali_id}','QualificationController@contestantShow');
            Route::post('/contestantScore','QualificationController@contestantScore'); 
            Route::get('/qualiCon/{quali_id}','QualificationController@index');   
            Route::resource('users','UsersController');   
            Route::resource('institution','InstitutionsController'); 
            Route::resource('asexualcrits','CriteriaAsexualController');   
            Route::resource('asexualguidelines','GuidelineAsexualController');
            Route::resource('feedcrits','CriteriaFeedController');
            Route::resource('feedguidelines','GuidelineFeedController');
            Route::resource('knapsackcrits','CriteriaKnapsackController');
            Route::resource('knapsackguidelines','GuidelineKnapsackController'); 
            Route::resource('bakingcrits','CriteriaBakingController');
            Route::resource('bakingguidelines','GuidelineBakingController');
            Route::resource('cookingcrits','CriteriaCookingController');
            Route::resource('cookingguidelines','GuidelineCookingController');     
            Route::resource('restaurantcrits','CriteriaRestaurantController');
            Route::resource('restaurantguidelines','GuidelineRestaurantController');
            Route::resource('patisseriecrits','CriteriaPatisserieController');
            Route::resource('patisserieguidelines','GuidelinePatisserieController');
            Route::resource('weldingcrits','CriteriaWeldingController');
            Route::resource('weldingguidelines','GuidelineWeldingController');
        });
    });    
});
