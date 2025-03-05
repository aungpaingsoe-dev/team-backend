<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TeamMemberController;
use Illuminate\Support\Facades\Route;

Route::get('/team_member', [TeamMemberController::class, 'get']);
Route::get('/team_member/{id}', [TeamMemberController::class, 'detail']);
Route::get('/article', [ArticleController::class, 'get']);
Route::get('/article/{id}', [ArticleController::class, 'detail']);
Route::get('/project', [ProjectController::class, 'get']);
Route::get('/project/{id}', [ProjectController::class, 'detail']);
