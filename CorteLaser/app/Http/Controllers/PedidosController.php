<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedidos;
use App\Productos;
use App\Materiales;
use App\HistorialCompraMaterial;

class PedidosController extends Controller
{
    public function EnviaPedidos()
    {
        
        $Pedidos = Pedidos::all();
        $Productos = Productos::all();
        $materiales=Materiales::all();
        $agregados=HistorialCompraMaterial::all();

        return view('PedidosyVentas')->with('Productos', $Productos)
        ->with('Pedidos',$Pedidos)->with('materiales', $materiales)
        ->with('agregados', $agregados);
    }

    public function EnviaGG()
    {
        $Pedidos = Pedidos::all();
        
        $Productos = Productos::all();
        $materiales=Materiales::all();
        $agregados=HistorialCompraMaterial::all();

        return view('GananciasyGastos')->with('Productos', $Productos)
        ->with('Pedidos',$Pedidos)->with('materiales', $materiales)
        ->with('agregados', $agregados);
    }

    public function guardaPedido(Request $request)
    {
        
        $Productos = Productos::all();
        $Pedidos = Pedidos::all();
        $pedido = new Pedidos();
        $pedido->id_producto = $request->id_producto;
        $pedido->Vendido = $request->pedido;

        $pedido->save();

        return redirect('/pedidosyventas');
    }

    public function BorrarPedido($id)
   {
       $pedido=Pedidos::find($id);
       $pedido->delete();

       return redirect('/pedidosyventas');
   }

   public function Venta($id)
   {
       $pedido=Pedidos::find($id);
       $pedido->Vendido =  1;

       $pedido->save();

       return redirect('/pedidosyventas');
   }
}
