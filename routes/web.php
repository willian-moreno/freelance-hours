<?php

use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectsController::class, 'index'])->name('projects.index');

Route::get('/projects/{uuid}', [ProjectsController::class, 'details'])->name('projects.details');
