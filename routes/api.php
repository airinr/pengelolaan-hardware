<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ping', fn () => ['ok' => true]);
// (opsional) contoh endpoint user jika pakai Sanctum:
// Route::middleware('auth:sanctum')->get('/user', fn (Request $r) => $r->user());
