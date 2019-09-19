<?php

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/menus', ['as' => 'menu.index', 'uses' => 'Ronaldroyce\Dynamicmenu\MenuController@index']);
    Route::get('/menuitems', ['as' => 'menuitem.index', 'uses' => 'Ronaldroyce\Dynamicmenu\MenuItemController@index']);
});

Route::group(['middleware' => ['auth:api', 'api']], function () {
    Route::get('/menuitem/save', 'Ronaldroyce\Dynamicmenu\MenuItemApiController@saveMenuItem')->name('menuitemsave');
    Route::get('/menuitem/add', 'Ronaldroyce\Dynamicmenu\MenuItemApiController@createMenuItem')->name('menuitemadd');
    Route::get('/menuitem/delete', 'Ronaldroyce\Dynamicmenu\MenuItemApiController@deleteMenuItem')->name('menuitemdelete');
    Route::get('/menuitem/movedown', 'Ronaldroyce\Dynamicmenu\MenuItemApiController@movedown')->name('movedown');
    Route::get('/menuitem/moveup', 'Ronaldroyce\Dynamicmenu\MenuItemApiController@moveup')->name('moveup');
});


Route::middleware('auth:api')->get('/menu/add', 'Ronaldroyce\Dynamicmenu\MenuApiController@createMenu')->name('menuadd');