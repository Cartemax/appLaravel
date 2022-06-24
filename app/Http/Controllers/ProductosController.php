<?php

namespace App\Http\Controllers;

use App\Models\productos;
use App\Models\productos_vendidos;
use App\Http\Requests\StoreproductosRequest;
use App\Http\Requests\UpdateproductosRequest;
use Illuminate\Http\Request;
use DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = productos::all();
        $mayorVendido = DB::select(DB::raw("SELECT p.nombre_producto, COUNT(*) as veces, SUM(pv.cantidad) AS cantidad FROM productos_vendidos pv INNER JOIN productos p ON p.id = pv.id_producto GROUP BY id_producto ORDER BY COUNT(*) DESC LIMIT 1"));
        $mayorStock = productos::orderBy('stock', 'DESC')->first();

        return view('productos/productos', compact(array('productos', 'mayorStock', 'mayorVendido')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $readonly = "";

        return view('productos/create', compact('readonly'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new productos();
        $producto->nombre_producto = $request->nombre_producto;
        $producto->referencia = $request->referencia;
        $producto->precio = $request->precio;
        $producto->peso = $request->peso;
        $producto->categoria = $request->categoria;
        $producto->stock = $request->stock;

        $producto->save();

        return redirect()->route('productos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $status = 0)
    {
        $producto = productos::find($id);
        $readonly = "";
        return view('productos/edit', compact('producto', 'readonly', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductosRequest  $request
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $producto = productos::find($request->id);
            $producto->nombre_producto = $request->nombre_producto;
            $producto->referencia = $request->referencia;
            $producto->precio = $request->precio;
            $producto->peso = $request->peso;
            $producto->categoria = $request->categoria;
            $producto->stock = $request->stock;

            $producto->save();
            $status = 1;
        } catch (\Throwable $th) {
            $status = 2;
        }
        
        return redirect()->route('productos.edit', [$request->id, $status]);
    }

    /**
     * sell the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductosRequest  $request
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function sell($id, $status = 0)
    {
        $producto = productos::find($id);
        $readonly = "readonly";
        $vender = true;

        return view('productos/sell', compact('producto', 'readonly', 'status', 'vender'));
    }

    /**
     * Sold out the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductosRequest  $request
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function soldout(Request $request)
    {
        try {
            if ($request->stock > $request->disponible) {
                $status = 2;
            }else{
                $disponibleTotal = $request->disponible - $request->stock;
                $producto = productos::find($request->id);
                $producto->stock = $disponibleTotal;
                $producto->save();
                $status = 1;

                $venta = new productos_vendidos();
                $venta->id_producto = $producto->id;
                $venta->cantidad = $request->stock;
                $venta->save();
            }

        } catch (\Throwable $th) {
            $status = 3;
        }
        
        return redirect()->route('productos.sell', [$request->id, $status]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        productos::find($id)->delete();
        
        return redirect()->route('productos.index');
    }
}
