<?php
Auth::routes();

Route::get('/', function () { return view('welcome'); });

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

/*Route::post('users/create', function () {
    
});

Route::post('users',function(){
    dd(request()->all());
});
*/
Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');