<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\ResiduoTipo;
use Illuminate\Http\Request;
use App\Http\Resources\ResiduoTipoResource;

class ResiduoTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResiduoTipoResource::collection(ResiduoTipo::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return new ResiduoTipoResource(ResiduoTipo::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResiduoTipo  $residuoTipo
     * @return \Illuminate\Http\Response
     */
    public function show(ResiduoTipo $residuoTipo)
    {
        return new ResiduoTipoResource($residuoTipo);

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
        $residuoTipo->update($request->all());//actualizamos
        return new ResiduoTipoResource($residuoTipo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResiduoTipo  $residuoTipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResiduoTipo $residuoTipo)
    {
        $residuoTipo->delete();
        return response()->json(null, 204);

    }
}
