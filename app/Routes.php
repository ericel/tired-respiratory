<?php
/**
 * Routes - all standard Routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */


/** Define static routes. */

// The default Routing
Route::get('/',       'Welcome@index');
Route::get('subpage', 'Welcome@subPage');
Route::get('search', 'Welcome@search');

Route::get('add', 'Content@index');
Route::get( 'add/audio', array('before' => 'auth', 'uses' => 'Content@addAudio'));
Route::post( 'add/store', array('before' => 'auth', 'uses' => 'Content@store'));
Route::post( 'add/update', array('before' => 'auth', 'uses' => 'Content@UpdateFileContent'));
Route::any( 'add/video', array('before' => 'auth', 'uses' => 'Content@addVideo'));

Route::get('video/{title}', 'Content@video');
Route::get('audio/{title}', 'Content@audio');

Route::any('file/file', 'Content@file');

/** End default Routes */
