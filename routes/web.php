<?php

use App\Http\Controllers\JobOfferController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('jobs.index'));

Route::resource('jobs', JobOfferController::class)->only(['index']);
