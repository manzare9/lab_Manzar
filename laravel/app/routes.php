<?php

Route::get('/', 'HomeController@index');
Route::get('flash', 'HomeController@flash');
Route::get('back', 'HomeController@back');
Route::get('/secure', ['before' => 'auth', 'uses' => 'HomeController@secure']);
Route::get('session/{message}', 'HomeController@session');
Route::get('special-characters', 'HomeController@specialCharacters');
Route::match(['get', 'post'], 'form', 'HomeController@form');

Route::resource('posts', 'PostsController');
Route::resource('api/posts', 'Api\PostsController');
Route::resource('users', 'UsersController');

Route::controller('auth', 'AuthController');

Route::get('domain-route', ['domain' => 'l4.app', 'as' => 'domain', 'uses' => function() {
    return 'Domain route';
}]);

Route::get('subdomain-route', ['domain' => '{subdomain}.l4.app', 'as' => 'subdomain', 'uses' => function() {
    return 'Subdomain route';
}]);
