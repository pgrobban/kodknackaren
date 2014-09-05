<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::post('dbm/users/addPoints', 'UserController@addPoints');
Route::get('dbm/users/getOrCreateLatestSectionIDForLesson/{lessonID}', 'UserController@getOrCreateLatestSectionIDForLesson');
Route::post('dbm/users/{userID}/exercises/{exerciseID}/markAsPassed', 'UserController@markExerciseAsPassed');

Route::controller('dbm/users', 'UserController');
Route::controller('dbm/courses', 'CourseController');
Route::controller('dbm/exercises', 'ExerciseController');



Route::get('/', array('as' => 'home', 'uses' => 'HomeController@show'));
Route::get('hem', 'HomeController@show');

Route::get('start', 'HomeController@show');
Route::get('lar/{lessonNr?}', function($lessonNr = 1)
{
    return (new LarController())->show($lessonNr);
});










Route::get('login', array('as' => 'login', function () {
    return View::make('login');
}))->before('guest');

Route::post('login', function () {
        $user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
        );

        if (Auth::attempt($user)) {
            return Redirect::intended();
        }
        
        // authentication failure! lets go back to the login page
        return Redirect::route('login')
            ->with('flash_error', 'Your username/password combination was incorrect.')
            ->withInput();
});



Route::get('logout', array('as' => 'logout', function () {
    Auth::logout();

    return Redirect::route('home');
}))->before('auth');

Route::get('profile', array('as' => 'profile', function () { }))->before('auth');




/* saving files */
Route::post('saver', function() {

	$filename = "temp/minkod.js";
	#...
	$f = fopen($filename, 'w');
	fwrite($f, $_POST["data"]);
	fclose($f);
});
Route::get('saver', function() {
	header('Content-disposition: attachment; filename="minkod.js"');
	$filename = "temp/minkod.js";
	$f = fopen($filename, 'r');
		readfile($filename);
});





?>