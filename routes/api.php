<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Tweet; 
use App\Http\Controllers\TweetController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/tweets', function () {
    //lastest é trazer os dados de maneira desordenada
    //with -> consultas extras
    return Tweet::with('user:id,name,username,avatar')->latest()->get()->paginate(10);
});


