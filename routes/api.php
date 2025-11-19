<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tasks', function () {
        return \App\Models\Task::all();
    });

    Route::post('/tasks', function (\Illuminate\Http\Request $request) {
        return \App\Models\Task::create($request->all());
    });
});
