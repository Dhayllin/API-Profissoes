<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api','prefix' => 'auth'], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('user', 'AuthController@user'); // dados do usário logado
    Route::post('professions', 'AuthController@professions');  // profissões do usuário logado
    Route::post('user-professions', 'AuthController@userProfessions');  //  dados do usuário e seus vínculos com profissões
    Route::post('user-professions-id/{ID}', 'AuthController@userProfessionsId');  //  dados do usuário e seus vínculos com profissões pelo ID  
    Route::post('store-profe-user', 'AuthController@storeProfeUser');   // Vincula e Disvincular profissão do usário logado.
    Route::post('search-professions', 'AuthController@scopeSearchProfessions');   // Pesquisa profissão 
    
});