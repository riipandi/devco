<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['reset' => false]);

Route::get('logout', 'Auth\LogoutController@logout')->name('logout');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

// Passport Routes
Route::group(['prefix' => 'passport', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return redirect(route('passport.clients'));
    });

    Route::get('clients', function () {
        return view('passport.clients');
    })->name('passport.clients');

    Route::get('tokens', function () {
        return view('passport.tokens');
    })->name('passport.tokens');

    Route::get('authorized', function () {
        return view('passport.authorized');
    })->name('passport.authorized');
});
