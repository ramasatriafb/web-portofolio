<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[
		'uses' => 'HomeController@index',
		'as' =>'home.index'
]);

// Route::post('/click/{id}',[
// 		'uses' => 'HomeController@click',
// 		'as' =>'home.click',
// ]);

Route::post('/message',[
		'uses' => 'MessageController@create',
		'as' =>'message.create'
]);

Route::get('/dashboard',[
		'uses' => 'DashboardController@index',
		'as' =>'dashboard.dashboard',
		'middleware' => 'auth'
		
]);
// Route::get('/profile',[
// 		'uses' => 'ProfileController@getCreate',
// 		'as' =>'profile.create',
// 		'middleware' => 'auth'
		
// ]);
// Route::post('/profile',[
// 		'uses' => 'ProfileController@postCreate',
// 		'as' =>'profile.create',
// 		'middleware' => 'auth'
		
// ]);

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('skill','SkillController');
    Route::resource('education','EducationController');
    Route::resource('experience','ExperienceController');
    Route::resource('service','ServiceController');
    Route::resource('project','ProjectController');
    Route::resource('profile','ProfileController');
//     Route::get('/contact',[
// 		'uses' => 'ContactController@index',
// 		'as' =>'contact.index'
// ]);
//       Route::get('/contact',[
// 		'uses' => 'ContactController@show',
// 		'as' =>'contact.show'
// ]);
//         Route::get('/contact',[
// 		'uses' => 'ContactController@destroy',
// 		'as' =>'contact.destroy'
// ]);

    Route::resource('contact','ContactController');
    Route::resource('icon','IconController');
    Route::resource('medsos','MedsosController');
    Route::resource('quotes','QuotesController');
	//Route::resource('todo', 'TodoController', ['only' => ['index']]);
});


// Route::get('/skill',[
// 		'uses' => 'SkillController@index',
// 		'as' =>'skill.index',
// 		'middleware' => 'auth'
		
// ]);

// Route::get('/skill-create',[
// 		'uses' => 'SkillController@create',
// 		'as' =>'skill.create',
// 		'middleware' => 'auth'
		
// ]);
// Route::post('/skill-create',[
// 		'uses' => 'SkillController@store',
// 		'as' =>'skill.create',
// 		'middleware' => 'auth'
		
// ]);
// Route::get('/skill-edit/{id}/edit',[
// 		'uses' => 'SkillController@edit',
// 		'as' =>'skill.edit',
// 		'middleware' => 'auth'
		
// ]);
// Route::patch('/skill-edit/{id}',[
// 		'uses' => 'SkillController@update',
// 		'as' =>'skill.update',
// 		'middleware' => 'auth'
		
// ]);
// Route::get('/signup',[
// 		'uses' => 'UserController@getSignup',
// 		'as' =>'user.signup'
		
// ]);


// Route::post('/signup',[
// 		'uses' =>'UserController@postSignup',
// 		'as' =>'user.signup'
		
// ]);

// Route::get('/signin',[
// 		'uses' => 'UserController@getSignin',
// 		'as' =>'user.signin'
		
// ]);


// Route::post('/signin',[
// 		'uses' =>'UserController@postSignin',
// 		'as' =>'user.signin'
		
// ]);

Route::group(['prefix' => 'user'], function(){
	Route::group(['middleware' => 'guest'], function(){

		Route::get('signup',[
		'uses' => 'UserController@getSignup',
		'as' => 'user.signup'
		]);


		Route::post('signup',[
			'uses' => 'UserController@postSignup',
			'as' => 'user.signup'
		]);

		Route::get('signin',[
			'uses' => 'UserController@getSignin',
			'as' => 'user.signin'
		]);

		Route::post('signin',[
			'uses' => 'UserController@postSignin',
			'as' => 'user.signin'
		]);
	});
	Route::group(['middleware' => 'auth'], function(){

		Route::get('profile',[
			'uses' => 'UserController@profile',
			'as' => 'user.profile'
		]);

		Route::get('logout',[
			'uses' => 'UserController@logout',
			'as' => 'user.logout'
		]);
	});

});
