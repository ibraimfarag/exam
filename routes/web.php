<?php

use Illuminate\Support\Facades\Route;

//Namespace frontend home page 
use App\Http\Controllers\HomePage;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ContactController;

//Namespace Auth
use App\Http\Controllers\Auth\LoginController;

//Namespace Admin
use App\Http\Controllers\Admin\AdminController;

//Namespace User
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ProfileController;

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


Route::get('/', [HomePage::class, 'index_front'])->name('home');




Route::group(['namespace' => 'Admin', 'middleware' => 'auth', 'prefix' => 'admin'], function () {


	Route::get('/', [AdminController::class, 'index'])->name('admin')->middleware(['can:admin']);
	Route::get('homepage', [HomePage::class, 'index_backend'])->name('homepageedit')->middleware(['can:admin']);
	Route::post('/submit-form', [HomePage::class, 'submitForm'])->name('submit-form');

	Route::post('/contact', [ContactController::class, 'store'])->name('store.inbox');
	Route::get('/inbox', [ContactController::class, 'inbox'])->name('inbox');



	// Show a list of cards
	Route::get('/cards', [CardController::class, 'index'])->name('cards.index');

	// Show the form to create a new card
	Route::get('/cards/create', [CardController::class, 'create'])->name('cards.create');

	// Store a newly created card
	Route::post('/cards', [CardController::class, 'store'])->name('cards.store');

	// Show the form to edit a card
	Route::get('/cards/{card}/edit', [CardController::class, 'edit'])->name('cards.edit');

	// Update the card in the database
	Route::put('/cards/{card}', [CardController::class, 'update'])->name('cards.update');

	// Delete a card
	Route::delete('/cards/{card}', [CardController::class, 'destroy'])->name('cards.destroy');

	//Route Rescource
	Route::resource('/user', 'UserController')->middleware(['can:admin']);

	//Route View

});

Route::group(['namespace' => 'User', 'middleware' => 'auth', 'prefix' => 'user'], function () {
	Route::get('/', [UserController::class, 'index'])->name('user');
	Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
	Route::patch('/profile/update/{user}', [ProfileController::class, 'update'])->name('profile.update');
});

Route::group(['namespace' => 'Auth', 'middleware' => 'guest'], function () {
	Route::view('/login', 'auth.login')->name('login');
	Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
});

// Other
Route::view('/register', 'auth.register')->name('register');
Route::view('/forgot-password', 'auth.forgot-password')->name('forgot-password');
Route::post('/logout', function () {
	return redirect()->to('/login')->with(Auth::logout());
})->name('logout');
