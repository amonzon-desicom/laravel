<?php

Route::get('/legajos', 'LegajosController@list');

Route::get('/legajos/{LegAdministrador}/{IDCodigo}', 'LegajosController@getOne');

Route::get('/legajos/{id}', 'LegajosController@getOneById');

Route::post('/legajos', 'LegajosController@newRecord');

Route::put('/legajos', 'LegajosController@updateRecord');

Route::delete('/legajos/{id}', 'LegajosController@deleteRecord');

?>