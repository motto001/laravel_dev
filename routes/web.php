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




//Auth::routes();
//lehet hogy kell-------------------------------------------

Route::get('/home', 'HomeController@index');

//Route::get('/admin', 'AdminController@index');


/*Route::get('admin', function () {
    return view('test');
});*/

Route::get('authfriend/{countryid}', 'FriendController@autstore');

Route::get('listfriend/{countryid}', 'FriendController@listfriend');

Route::get('test', 'TestController@index');

//Route::get('proba', 'proba\proba@valami');



Route::get('/', function () 
{
	
	//$view = View::make('tmpl::app', ['name' => 'Rishabh']);
	
	//$contents = $view->render();
	
return  motto001\mo\Change::moview(View::make('tmpl::app'));

	// 	return view('tmpl::app');
}
);


Route::auth();

//Route::resource('proba','proba\proba' );

//Route::group(['middleware' => ['auth']], function() {
	
	//R	oute::resource('proba','proba\proba' );};



Route::group(['prefix' => 'profil','middleware' => 'App\Http\Middleware\userjog'], function() {
	
	Route::resource('proba2','proba\ProbaController' );
	
	Route::resource('/','proba\ProbaController' );
	
	Route::resource('friend','proba\FriendController' );
	
}

);




/*
Route::group(['prefix' => 'admin', 'middleware' => 'userjog'], function() {

 Route::resource('proba','proba\proba' );

});

*/



Route::group(['middleware' => ['auth']], function() {
	
	
	Route::get('/home', 'HomeController@index');
	
	
	Route::resource('users','UserController');
	
	
	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
	
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
	
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
	
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
	
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);
	
	
	Route::get('itemCRUD2',['as'=>'itemCRUD2.index','uses'=>'ItemCRUD2Controller@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
	
	Route::get('itemCRUD2/create',['as'=>'itemCRUD2.create','uses'=>'ItemCRUD2Controller@create','middleware' => ['permission:item-create']]);
	
	Route::post('itemCRUD2/create',['as'=>'itemCRUD2.store','uses'=>'ItemCRUD2Controller@store','middleware' => ['permission:item-create']]);
	
	Route::get('itemCRUD2/{id}',['as'=>'itemCRUD2.show','uses'=>'ItemCRUD2Controller@show']);
	
	Route::get('itemCRUD2/{id}/edit',['as'=>'itemCRUD2.edit','uses'=>'ItemCRUD2Controller@edit','middleware' => ['permission:item-edit']]);
	
	Route::patch('itemCRUD2/{id}',['as'=>'itemCRUD2.update','uses'=>'ItemCRUD2Controller@update','middleware' => ['permission:item-edit']]);
	
	Route::delete('itemCRUD2/{id}',['as'=>'itemCRUD2.destroy','uses'=>'ItemCRUD2Controller@destroy','middleware' => ['permission:item-delete']]);
	
}
);
