<?php

namespace App\Http\Controllers;

use App\Models\productos_vendidos;
use App\Http\Requests\Storeproductos_vendidosRequest;
use App\Http\Requests\Updateproductos_vendidosRequest;

class ProductosVendidosController extends Controller
{
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
     * @param  \App\Http\Requests\Storeproductos_vendidosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeproductos_vendidosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productos_vendidos  $productos_vendidos
     * @return \Illuminate\Http\Response
     */
    public function show(productos_vendidos $productos_vendidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productos_vendidos  $productos_vendidos
     * @return \Illuminate\Http\Response
     */
    public function edit(productos_vendidos $productos_vendidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateproductos_vendidosRequest  $request
     * @param  \App\Models\productos_vendidos  $productos_vendidos
     * @return \Illuminate\Http\Response
     */
    public function update(Updateproductos_vendidosRequest $request, productos_vendidos $productos_vendidos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productos_vendidos  $productos_vendidos
     * @return \Illuminate\Http\Response
     */
    public function destroy(productos_vendidos $productos_vendidos)
    {
        //
    }
}
