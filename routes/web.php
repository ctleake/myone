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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'web'], function () {

/*
| The Auth::routes method now registers a POST route for /logout instead of a GET route.
| This prevents other web applications from logging your users out of your application.
| To upgrade, you should either convert your logout requests to use the POST verb
| or register your own GET route for the /logout URI
*/
    Route::get('/logout', 'Auth\LoginController@logout');

    Route::auth();

    Route::get('/', 'HomeController@index');
    /*
    Route::get('/', 'MemberController@index');
    */

    Route::get('/home', 'HomeController@index');

    Route::get('members', 'MemberController@index');

// here is a route to show a particular member
    Route::get('members/more/{id}', 'MemberController@show');

    Route::get('members/new', 'MemberController@create');

// here is a route to create a Member record
    Route::post('members/data', 'MemberController@store');

    Route::get('members/edit', 'MemberController@viewEdit');

    Route::get('members/edit/{id}', 'MemberController@edit');

    Route::post('members/save-updates/{id}', 'MemberController@update');

    Route::get('members/delete/{id}', 'MemberController@destroy');

// here are the routes to maintain user roles
    Route::group(['prefix' => 'roles'], function () {

        Route::get('/list_edit', 'RoleController@list_edit');

        Route::get('/edit/{id}', 'RoleController@edit');

        Route::get('/create', 'RoleController@create');

        Route::post('/data', 'RoleController@store');

        Route::post('/save-updates/{id}', 'RoleController@update');

        Route::get('/store/{id}', 'RoleController@store');

        Route::get('/', 'RoleController@index');

        Route::get('/edit_role/{id}', 'RoleController@editRole');

        Route::post('/store_roles/{id}', 'RoleController@storeRoles');

        Route::get('/delete_role/{id}', 'RoleController@destroyRole');

        Route::post('/store_permissions/{id}', 'RoleController@storePermissions');

        Route::get('/delete_permission/{id}', 'RoleController@destroyPermission');
    });

    Route::group(['prefix' => 'permissions'], function () {

        Route::get('/', 'PermissionController@index');

// here is a route to show a particular member
        Route::get('/more/{id}', 'PermissionController@show');

        Route::get('/new', 'PermissionController@create');

// here is a route to create a Permission record
        Route::post('/data', 'PermissionController@store');

        Route::get('/edit', 'PermissionController@viewEdit');

        Route::get('/edit/{id}', 'PermissionController@edit');

        Route::post('/save-updates/{id}', 'PermissionController@update');

        Route::get('/delete/{id}', 'PermissionController@destroy');
    });

});
