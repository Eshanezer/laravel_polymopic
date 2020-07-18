<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Photo;
use App\Staff;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', function () {
    $staff = Staff::findOrFail(1);
    $staff->photo()->create(['path'=>'example.jpeg']);
});


Route::get('/read', function () {
    $staff = Staff::findOrFail(1);

    foreach ($staff->photo as $photo){
        echo $photo->path;
    }
});

Route::get('/update', function () {
    $staff = Staff::findOrFail(1);

    $photo =$staff->photo()->whereId(5)->first();

    $photo->path =" updated new name.png";

    $photo->save();

});


Route::get('/delete', function () {
    $staff = Staff::findOrFail(1);
    $staff->photo()->whereId('4')->delete();

});

Route::get('/assign', function () {
    $staff = Staff::findOrFail(1);

    $photo = Photo::findOrFail(3);

    $staff->photo()->save($photo);
});

Route::get('/unassign', function () {
    $staff = Staff::findOrFail(1);

    $staff->photo()->whereId(3)->update(['imageable_id'=>'','imageable_type'=>'']);
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
