<?php

use Illuminate\Support\Facades\Route;
use Live\Webhooks\Http\WebhooksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/webhooks/{provider}', [WebhooksController::class, 'postWebhooks'])->name('weebhooks-handler');
