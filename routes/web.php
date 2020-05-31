<?php
Auth::routes();

Route::get('/', function () { return view('welcome'); });

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('bitacorasresidencia', 'BitacorasResidenciaController');

Route::resource('bitacoraservicio', 'BitacoraServicioController');

Route::resource('materials', 'MaterialesController');

Route::get('material-list-pdf', 'MaterialesController@exportPdf')->name('materiales.pdf');
