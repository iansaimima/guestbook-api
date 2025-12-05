<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GuestBookController;

Route::middleware('api.key')->group(function () {
    Route::apiResource('guestbooks', GuestBookController::class);
});
