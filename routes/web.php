<?php

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/
/*Route::group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware'=>['auth', 'Role:10']], function () {
});
*/
    


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
	Route::get('/dash', 'DashboardController@index')->name('dash');
	// Roles
	Route::post('roles/store', 'Admin\\RolController@store')->name('roles.store')->middleware('permission:roles.store');
	Route::get('roles', 'Admin\\RolController@index')->name('roles.index')->middleware('permission:roles.index');
	Route::get('roles/create', 'Admin\\RolController@create')->name('roles.create')->middleware('permission:roles.create');
	Route::put('roles/{role}', 'Admin\\RolController@update')->name('roles.update')->middleware('permission:roles.edit');
	Route::get('roles/{role}', 'Admin\\RolController@show')->name('roles.show')->middleware('permission:roles.show');
	Route::delete('roles/{role}', 'Admin\\RolController@destroy')->name('roles.destroy')->middleware('permission:roles.delete');
	Route::get('roles/{role}/edit', 'Admin\\RolController@edit')->name('roles.edit')->middleware('permission:roles.edit');

	// Users
	Route::post('users/store', 'UserController@store')->name('users.store')->middleware('permission:users.store');
	Route::get('users', 'UserController@index')->name('users.index')->middleware('permission:users.index');
	Route::get('users/create', 'UserController@create')->name('users.create')->middleware('permission:users.create');
	Route::put('users/{role}', 'UserController@update')->name('users.update')->middleware('permission:users.edit');
	Route::get('users/{role}', 'UserController@show')->name('users.show')->middleware('permission:users.show');
	Route::delete('users/{role}', 'UserController@destroy')->name('users.destroy')->middleware('permission:users.delete');
	Route::get('users/{role}/edit', 'UserController@edit')->name('users.edit')->middleware('permission:users.edit');

	// Category
	Route::post('category/store', 'Admin\\CategoryController@store')->name('category.store')->middleware('permission:category.store');
	Route::get('category', 'Admin\\CategoryController@index')->name('category.index')->middleware('permission:category.index');
	Route::get('category/create', 'Admin\\CategoryController@create')->name('category.create')->middleware('permission:category.create');
	Route::put('category/{role}', 'Admin\\CategoryController@update')->name('category.update')->middleware('permission:category.edit');
	Route::get('category/{role}', 'Admin\\CategoryController@show')->name('category.show')->middleware('permission:category.show');
	Route::delete('category/{role}', 'Admin\\CategoryController@destroy')->name('category.destroy')->middleware('permission:category.delete');
	Route::get('category/{role}/edit', 'Admin\\CategoryController@edit')->name('category.edit')->middleware('permission:category.edit');

	/*Route::resource('users', 'UserController');
	Route::resource('rol', 'Admin\\RolController');
	Route::resource('category', 'Admin\\CategoryController');	
	*/
	Route::resource('permissions', 'Admin\\PermissionController');

});
