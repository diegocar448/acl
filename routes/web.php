<?php



Route::group(['prefix' => 'painel'], function(){
    //PostController
    Route::get('posts', 'Painel\PostController@index');

    //PermissionControler
    Route::get('permissions', 'Painel\PermissionController@index');
    Route::get('permission/{id}/roles', 'Painel\PermissionController@roles');

    //RoleController
    Route::get('roles', 'Painel\RoleController@index');
    Route::get('role/{id}/permission', 'Painel\RoleController@permissions');

    //UserController
    Route::get('users', 'Painel\UserController@index');
    Route::get('user/{id}/roles', 'Painel\UserController@roles');

    //PainelController
    Route::get('/', 'Painel\PainelController@index');
    
});



Auth::routes();




Route::get('/', 'Portal\SiteController@index');