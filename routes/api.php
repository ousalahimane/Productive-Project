<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Type Projets
    Route::apiResource('type-projets', 'TypeProjetsApiController');

    // Projets
    Route::post('projets/media', 'ProjetsApiController@storeMedia')->name('projets.storeMedia');
    Route::apiResource('projets', 'ProjetsApiController');

    // Etiquettes
    Route::apiResource('etiquettes', 'EtiquettesApiController');

    // Listes
    Route::apiResource('listes', 'ListesApiController');

    // Taches
    Route::apiResource('taches', 'TachesApiController');

    // Reunions
    Route::apiResource('reunions', 'ReunionsApiController');
});
