<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;

class ProductosController extends Controller
{
    public function EnviaProductos()
    {
        $productos=Productos::all();
        return view('home')->with('productos', $productos);
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

        $productos = Productos::all();
        return redirect('/home')->with('productos', $productos);

    }

    public function VistaProducto($id)
    {
        $producto=Productos::find($id);
        return view('VistaProducto')->with('producto',$producto);
    }

    public function guardaEdicion(Request $request)
    {
        $producto =  Productos::find($request->id);
        $producto->Nombre=$request->nombre;
        $producto->Descripcion=$request->descripcion;
        $producto->Precio=$request->precio;
        $producto->TipoMaterial=$request->tipoMaterial;
        $producto->MaterialNecesario=$request->cantidadMaterial;
        
        $request->file('imagen')->storeAs('public',$producto->Nombre.'.'.$request->file('imagen')->getClientOriginalExtension());
        $producto->imagen=$producto->Nombre.'.'.$request->file('imagen')->getClientOriginalExtension();
        
        $producto->save();

        
        return view('VistaProducto')->with('producto',$producto);

    }

    public function BorrarProd($id)
   {
       $producto=Productos::find($id);
       $producto->delete();

       return redirect('/home');
   }

}
