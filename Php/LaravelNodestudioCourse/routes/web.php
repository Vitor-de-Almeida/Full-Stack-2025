<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);

// 

// Route::group([
//     'prefix' => 'admin',
//     'as' => 'admin.',
// ], function() {
    
//     Route::get('dashboard', function() {
//         return 'Dashboard';
//     })->name('dashboard');

//     Route::get('customers', function() {
//         return 'Customers';
//     })->name('customers');

//     Route::get('users', function() {
//         return 'Users';
//     })->name('users');
// });

// Route::get('company', function() {
//     return view('site/company');
// });

// route::view('/company','site/company');

// Route::any('/any', function() {
//     return 'Any Method';
// });

// Route::match(['put', 'post'], '/match', function() {
//     return 'Match Method';
// });

// Route::get('/product/{id}/{cat}', function($id, $cat) {
//     return "The Id product is: {$id} and the category is: {$cat}";
// });

// route::get('/about', function() {
//     return redirect('/company');
// });

// Route::redirect('/about', '/company');

// Route::get('/news', function() {
//     return view('news');
// })->name('newsindex');

// Route::get('/latest', function() {
//     return redirect()->route('newsindex');
// });

