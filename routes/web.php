<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Route::middleware(['auth.shopify'])->group(function () {


    Route::get('/', function () {
        return view('dashboard');
    })->name('home');



    Route::view('/products', 'products');
    Route::view('/customers', 'customers');
    Route::view('/settings', 'settings');

    Route::get('test', function ()
    {
        $shop = Auth::user();

        $themes = $shop->api()->rest('GET', '/admin/themes.json');

        // get active theme id
        $activeThemeId = "";
        foreach($themes['body']->container['themes'] as $theme){
            if($theme['role'] == "main"){
                $activeThemeId = $theme['id'];
            }
        }

        $snippet = "Your snippet code";

        // Data to pass to our rest api request
        $array = array('asset' => array('key' => 'snippets/codeinspire-wishlist-app.liquid', 'value' => $snippet));

        $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $array);

        return "Success";

    });


});
