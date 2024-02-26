<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/myview/{user}', function ($user) {
    return view('home', ['username' => $user]);
});

use App\Models\Fruit;

Route::get('/fruits', function() {
return Fruit::all();
});

use App\Http\Controllers\FruitController;

Route::get('/showFruits', [FruitController::class, 'getFruits']);

Route::get('/showAllFruits', [FruitController::class, 'getAllFruits']);