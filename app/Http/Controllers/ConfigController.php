<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Http\Request;
use App\Http\Resources\ConfigCollection;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configs = Config::all()->toArray();
        return array_reverse($configs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $config = new Config([
            'key' => $request->input('key'),
            'value' => $request->input('value')
        ]);
        $config->save();
 
        return response()->json('La configuración se agrego satisfactoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function show(Config $config)
    {
        return response()->json($config);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Config $config)
    {
        $config->update($request->all());

        return response()->json('La configuración se ha actualizado exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function destroy(Config $config)
    {
        $config->delete();
 
        return response()->json('La configuración se eliminó exitosamente');
    }
}
