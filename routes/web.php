<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/message', function () {
    $message = request()->get('message');
    $senderType = request()->get('sender');
    $event = new \App\Events\MessageSent(
        senderType: $senderType,
        message: $message
    );
    event($event);
    return response()->json(['message' => 'Message sent']);
})->name('send.message');
