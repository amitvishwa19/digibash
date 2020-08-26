<?php


//Imporsonate
if ('production' != config('app.env')) {
    Route::get('/impersonate', 'Lms\ImpersonateController@index')->name('impersonate.index');
    Route::get('/impersonate/enter/{user_id}', 'Lms\ImpersonateController@impersonate')->name('impersonate.enter');
    Route::get('/impersonate/leave', 'Lms\ImpersonateController@impersonate_leave')->name('impersonate.leave');
}


Route::get('/','Lms\LmsController@index')->name('lms.dashboard');


Route::resource('/section','Lms\SectionController');
Route::resource('/course','Lms\CourseController');
Route::resource('/lesson','Lms\LessonController');
Route::resource('/student','Lms\StudentController');
Route::resource('/teacher','Lms\TeacherController');

//Route::get('/book/issued','Admin\BookController@issued_book')->name('book.issued');
//Route::get('/book/issue','Admin\BookController@issue_book')->name('book.issue');
//Route::post('/book/issue','Admin\BookController@issue_book_save')->name('book.issue.save');
Route::resource('/book','Lms\BookController');
Route::resource('/issuedbook','Lms\IssuedBookController');
Route::resource('/exam','Lms\ExamController');
Route::resource('/question','Lms\QuestionController');

