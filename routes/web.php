<?php

Route::get('/', 'GodparenthoodController@index');
Route::get('/suche', 'SearchController@search');
Route::get('/statistiken', 'DebitEntryController@statistics');
Route::get('/datenbank-dump', 'Controller@generateDbDump');
Route::get('/patenschaften', function () {
    return redirect()->action('GodparenthoodController@index');
});
Route::get('/patenschaften/neu', 'GodparenthoodController@create');
Route::post('/patenschaften/erstellen', 'GodparenthoodController@store');
Route::get('/patenschaften/{godparenthood}', 'GodparenthoodController@show');
Route::get('/kinder', function () {
    return redirect()->action('GodparenthoodController@index');
});
Route::get('/kinder/neu', 'ChildController@create');
Route::post('/kinder/erstellen', 'ChildController@store');
Route::get('/kinder/{child}/', 'ChildController@show');
Route::get('/kinder/{child}/bearbeiten', 'ChildController@edit');
Route::post('/kinder/{child}/aktualisieren', 'ChildController@update');
Route::get('/buchungen/{debitEntry}/loeschen', 'DebitEntryController@destroy');
Route::post('/buchungen/erstellen', 'DebitEntryController@store');
