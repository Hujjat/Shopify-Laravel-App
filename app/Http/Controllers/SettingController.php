<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SettingController extends Controller
{



    public function configureTheme()
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

        $snippet = "Your snippet code updated";

        // Data to pass to our rest api request
        $array = array('asset' => array('key' => 'snippets/codeinspire-wishlist-app.liquid', 'value' => $snippet));

        $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $array);

        // save data into database

        Setting::updateOrCreate(
            ['shop_id' => $shop->name ],
            ['activated' => true]
        );

        return ['message' => 'Theme setup succesfully'];

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
