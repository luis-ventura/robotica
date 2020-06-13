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

Route::resource('visits', 'VisitController');

Route::get('material-list-pdf', 'MaterialesController@exportPdf')->name('materiales.pdf');

Route::get('bitacorasresidencia-list-pdf','BitacorasResidenciaController@exportPdf')->name('residencia.pdf');

Route::get('bitacoraservicio-list-pdf','BitacoraServicioController@exportPdf')->name('servicio.pdf');
