<?php
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('training-subject', 'TrainingSubjectController');
});
