<?php

use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('trainees.home');
})->name('trainees.home');


Route::get('/trainees', [TrainingController::class, 'getAllTrainees'])->name('trainees.index');

Route::get('/trainees/create', [TrainingController::class, 'createNewTraineeForm'])->name('trainees.create');

Route::get('/trainees/{id}', [TrainingController::class, 'getTraineeById'])->name('trainees.show');

Route::get('/trainees/{id}/edit', [TrainingController::class, 'editExistingTraineeForm'])->name('trainees.edit');

Route::post('/trainees', [TrainingController::class, 'saveNewTrainee'])->name('trainees.store');


Route::put('/trainees/{id}', [TrainingController::class, 'updateExistingTrainee'])->name('trainees.update');

Route::delete('/trainees/{id}', [TrainingController::class, 'deleteTraineeById'])->name('trainees.destroy');
