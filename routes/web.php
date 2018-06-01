<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Model\Student;
use Illuminate\Support\Facades\DB;

Auth::routes();

//Route::post('/my-logout', 'Auth\\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['admin']], function () {
    //configurations management
    Route::resource('home/configurations', 'ConfigurationsController');

    //student list management
    Route::resource('home/student-list','StudentController');

    //classes list management
    Route::get('home/classes-list/download/{class_id}','ExportExcelController@downloadStudentProfile');

    Route::resource('home/classes-list','ClassController');



    //scores list management
    Route::resource('home/scores-list','ScoreListController');

    //average score management
    Route::get('home/average-score/download','ExportExcelController@downloadAverageScore');
    Route::resource('home/average-score','AverageScoreController', ['only' => [
        'index', 'show']]);

    //subject scoreboard summary report
    Route::resource('home/subject-summary','SubjectSummaryController');

    //semester scoreboard summary report
    Route::resource('home/semester-summary','SemesterSummaryController');

    //user profile management
    Route::resource('home/profile','AdminController');
    Route::get('home/user-profile','AdminController@show');

});

