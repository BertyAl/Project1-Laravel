<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('abou   ');
});

Route::get('/mahasiswa', function () {
    echo "halaman Mahasiswa";
});

Route::get('/user/{id}', function($id){
    echo "halaman user: $id";
});

Route::get('/users/{name?}', function ($name = 'Irvan'){
    echo "halaman user $name";
});

Route::get('/post/{post}/comments/{comment}', function ($postId,$commentId) {
    echo "post id : $postId, comment id : $commentId";
});

Route::get('/userss/{id}', function($id){
   echo "halaman user: $id";
})->where ('id', '[0-9]+');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
