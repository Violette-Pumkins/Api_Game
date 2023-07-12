<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\DialogueController;
use App\Http\Controllers\Api\UniverseController;
use App\Http\Controllers\Api\CharacterController;

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

// Route::middleware('auth:passeport')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('verify.token')->group(function () {

    //Authentication
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
// });
// Route::middleware('auth:api')->group(function () {

    //User
    // Route::post('/users/create', [UserController::class, 'create']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::get('/users/', [UserController::class, 'index']);
    
    // Univers
    Route::get('/universes/', [UniverseController::class, 'index']);
    Route::post('/universes/create', [UniverseController::class, 'create']);
    Route::get('/universes/{id}', [UniverseController::class, 'show']);
    Route::put('/universes/{id}', [UniverseController::class, 'update']);
    Route::delete('/universes/{id}', [UniverseController::class, 'destroy']); 
    
    // Personnages
    Route::get('/universes/{id}/characters', [CharacterController::class, 'index']);
    Route::post('/universes/{id}/characters/create', [CharacterController::class, 'create']);
    Route::put('/universes/{universe_id}/characters/{character_id}', [CharacterController::class, 'update']);
    Route::delete('/universes/{universe_id}/characters/{character_id}', [CharacterController::class, 'destroy']); 
    
    // Dialogues
    Route::get('/dialogues/', [DialogueController::class, 'index']);
    Route::post('/dialogues/create', [DialogueController::class, 'create']);
    Route::get('/dialogues/{id}', [DialogueController::class, 'show']);
    Route::delete('dialogues/{id}/', [DialogueController::class, 'destroy']); 
    
    // Messages
    Route::get('/dialogues/{id}/messages', [MessageController::class, 'index']);
    Route::post('/dialogues/{id}/messages', [MessageController::class, 'create']);
    Route::post('/dialogues/{id}', [MessageController::class, 'update']);

// });


