<?php

Route::middleware('auth:api')->get('/menu/add', 'ruhruhroy\dynamicmenu\MenuApiController@createMenu')->name('menuadd');
