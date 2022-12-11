<?php

use App\Models\IssueBook;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Models\OverTimeKeppingBookDue;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/your-book-history', [App\Http\Controllers\BooksController::class, "bookHistoryOfYours"])->name("books.history");
    Route::get('/book/{book_id}', [App\Http\Controllers\BooksController::class, "changeStatus"])->name("books.status.changed");
    Route::get('/returned-book/{issued_book_id}', [App\Http\Controllers\BooksController::class, "changeStatusOfReturnedBook"])->name("book.returned.status");
    Route::match( ['get', 'post'], '/books', [App\Http\Controllers\BooksController::class, "index"])->name("books.index");
});