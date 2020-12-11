<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\Materiales;

class ProductosController extends Controller
{
    public function EnviaProductos()
    {
        $productos=Productos::all();
        $materiales=Materiales::all();
        return view('home')->with('productos', $productos)->with('materiales', $materiales);
    }
    public function guardaProducto(Request $request)
    {
        $producto =  new Productos();
        $producto->Nombre=$request->nombre;
        $producto->Descripcion=$request->descripcion;
        $producto->Precio=$request->precio;
        $producto->TipoMaterial=$request->tipoMaterial;
        $producto->MaterialNecesario=$request->cantidadMaterial;
        
        $request->file('imagen')->storeAs('public',$producto->Nombre.'.'.$request->file('imagen')->getClientOriginalExtension());
        $producto->imagen=$producto->Nombre.'.'.$request->file('imagen')->getClientOriginalExtension();
        
        $producto->save();

        return redirect('/home');

    }

    public function VistaProducto($id)
    {
        $producto=Productos::find($id);
        
        $materiales=Materiales::all();
        return view('VistaProducto')->with('producto',$producto)->with('materiales', $materiales);
    }

    public function guardaEdicion(Request $request)
    {
        $producto =  Productos::find($request->id);
        $producto->Nombre=$request->nombre;
        $producto->Descripcion=$request->descripcion;
        $producto->Precio=$request->precio;
        $producto->TipoMaterial=$request->tipoMaterial;
        $producto->MaterialNecesario=$request->cantidadMaterial;
        
        if(!is_null($request->file('imagen')))
        {
            $request->file('imagen')->storeAs('public',$producto->Nombre.'.'.$request->file('imagen')->getClientOriginalExtension());
            $producto->imagen=$producto->Nombre.'.'.$request->file('imagen')->getClientOriginalExtension();
        

        }

        
        $producto->save();

        $materiales=Materiales::all();
        return view('VistaProducto')->with('producto',$producto)->with('materiales', $materiales);

    }

    public function BorrarProd($id)
   {
       $producto=Productos::find($id);
       $producto->delete();

       return redirect('/home');
   }

}
