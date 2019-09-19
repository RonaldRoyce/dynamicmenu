<?php

Route::middleware('auth:api')->get('/menu/add', 'Ronaldroyce\Dynamicmenu\MenuApiController@createMenu')->name('menuadd');