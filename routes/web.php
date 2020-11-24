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
    return view('admin.layout.master');
});

Route::name("auth.")->group(function () {
    Route::match(["get", "post"], "register", "AuthController@register")->name("register");
    Route::match(["get", "post"], "login", "AuthController@login")->name("login");
});

Route::get("resume-builder", "ResumeBuilderController@edit")->name("resume-builder.edit");
