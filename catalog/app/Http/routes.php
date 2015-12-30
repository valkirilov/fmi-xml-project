<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $app->get('/', function () use ($app) {
//   return $app->welcome();
// });

$app->get('/', 'JokesController@viewIndex');

$app->get('/add', 'JokesController@viewAdd');
$app->post('/add', 'JokesController@actionAdd');

$app->get('/edit/{id}', array(
	'as' 		=> 'edit',
	'uses' 	=> 'JokesController@viewEdit'
));
$app->post('/edit', 'JokesController@actionEdit');