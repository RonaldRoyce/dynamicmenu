<?php

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/menus', ['as' => 'menu.index', 'uses' => 'ruhruhroy\dynamicmenu\MenuController@index']);
    Route::get('/menuitems', ['as' => 'menuitem.index', 'uses' => 'ruhruhroy\dynamicmenu\MenuItemController@index']);
});

Route::group(['middleware' => ['auth:api', 'api']], function () {
    Route::get('/menuitem/save', 'ruhruhroy\dynamicmenu\MenuItemApiController@saveMenuItem')->name('menuitemsave');
    Route::get('/menuitem/add', 'ruhruhroy\dynamicmenu\MenuItemApiController@createMenuItem')->name('menuitemadd');
    Route::get('/menuitem/delete', 'ruhruhroy\dynamicmenu\MenuItemApiController@deleteMenuItem')->name('menuitemdelete');
    Route::get('/menuitem/movedown', 'ruhruhroy\dynamicmenu\MenuItemApiController@movedown')->name('movedown');
    Route::get('/menuitem/moveup', 'ruhruhroy\dynamicmenu\MenuItemApiController@moveup')->name('moveup');
});


Route::middleware('auth:api')->get('/menu/add', 'ruhruhroy\dynamicmenu\MenuApiController@createMenu')->name('menuadd');
