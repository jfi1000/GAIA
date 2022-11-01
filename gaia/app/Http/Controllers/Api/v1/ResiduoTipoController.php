<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\ResiduoTipo;
use Illuminate\Http\Request;

class ResiduoTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return ResiduoTipoResource::collection(Client::all());
        return response()->json(ResiduoTipo::all());
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
     * @param  \App\Models\ResiduoTipo  $residuoTipo
     * @return \Illuminate\Http\Response
     */
    public function show(ResiduoTipo $residuoTipo)
    {
        return response()->json($residuoTipo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResiduoTipo  $residuoTipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResiduoTipo $residuoTipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResiduoTipo  $residuoTipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResiduoTipo $residuoTipo)
    {
        //
    }
}
