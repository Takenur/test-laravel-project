<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group([
    'prefix' => 'project',
], function () {
    Route::post('create', [ProjectController::class, 'createProject']);
    Route::put('update/{project}', [ProjectController::class, 'updateProject']);
    Route::delete('delete/{project}', [ProjectController::class, 'deleteProject']);
    Route::get('/', [ProjectController::class, 'getProject']);
});

Route::group([
    'prefix' => 'project-task',
], function () {
    Route::post('create', [ProjectController::class, 'createProjectTask']);
    Route::put('update/{task}', [ProjectController::class, 'updateProjectTask']);
    Route::delete('delete/{task}', [ProjectController::class, 'deleteProjectTask']);
    Route::post('change-priority', [ProjectController::class, 'changeOrdersProjectTask']);
    Route::get('/', [ProjectController::class, 'getProjectTask']);
});
