<?php



Route::group(['prefix' => 'painel'], function(){
    //PostController

    //PermissionControler

    //RolesController

    //PainelController
    Route::get('/', 'Painel\PainelController@index');


   // Route::get('/', ['as'=> 'painel.home.index', 'uses'=> 'Painel\PainelController@index']);

    
});



Auth::routes();




Route::get('/', 'SiteController@index');