<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',['uses'=>'LoginController@index'])->name('login.index'); 

Route::post('/login','LoginController@verify');

Route::get('/logout', 'LogoutController@index');


Route::get('/home','StudentController@index');

Route::get('/note','NoteController@index');

Route::get('/profile','ProfileController@index');
Route::post('/registration','RegistrationController@verify');
Route::get('/dashboard','DashBoardController@index')->middleware('sess');


Route::get('/courses/list','CourseController@index');
Route::get('/registration','RegistrationController@index');
Route::get('/student','CourseListController@index');

/*Student insert Part*/
Route::get('/student','StudentController@index');
Route::get('/student/create','StudentController@student_index')->name('student.createStudent');
Route::post('/student/create','StudentController@insert_student')->name('student.createStudent');
Route::get('/student/details/{id}','StudentController@student_details')->name('student.student_details');

Route::get('/student/edit/{id}', 'StudentController@student_edit')->name('student.editStudent');
Route::post('/student/edit/{id}', 'StudentController@student_update')->name('student.student_details');
Route::get('/student/delete/{id}', 'StudentController@delete_student')->name('student.deleteStudent');
Route::post('/student/delete/{id}', 'StudentController@destroy_student')->name('student.createStudent');

/*Notice Part*/
Route::get('/create/contract','StudentController@notice_index')->name('student.contract');
Route::post('/create/contract','StudentController@insert_notice')->name('student.contract');
/*Notice Part*/


Route::get('/student/course','StudentController@course')->name('student.course');

Route::get('/searchcourse', 'StudentController@search_index')->name('student.searchcourse');
Route::get('/searchcourse/action', 'StudentController@search_action')->name('searchcourse.search_action');

//Notes Part 
Route::get('/student/notes','StudentController@notes')->name('student.notes');
Route::post('/student/notes','StudentController@insert_notes')->name('student.notes');




