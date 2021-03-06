<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materiales;
use App\HistorialCompraMaterial;
use App\Pedidos;
use App\Productos;

class MaterialesController extends Controller
{
    public function EnviaMateriales()
    {
        $materiales=Materiales::all();
        return view('Materiales')->with('materiales', $materiales);
    }

    public function guardaMaterial(Request $request)
    {
        $material =  new Materiales();
        $material->Nombre=$request->nombre;
        $material->DescripcionUso=$request->descripcion;
        $material->CostoPieza=$request->precio;
        $material->TipoMaterial=$request->tipo;
        
        $request->file('imagen')->storeAs('public',$material->Nombre.'.'.$request->file('imagen')->getClientOriginalExtension());
        $material->imagen=$material->Nombre.'.'.$request->file('imagen')->getClientOriginalExtension();
        
        $material->save();
        return redirect('/materiales');

    }

    public function VistaMaterial($id)
    {
        $material=Materiales::find($id);
        $agregados=HistorialCompraMaterial::all();
        $Pedidos = Pedidos::all();
        $Productos = Productos::all();
        return view('DetalleMaterial')->with('material',$material)->with('agregados', $agregados)
        ->with('Productos', $Productos)
        ->with('Pedidos',$Pedidos);

        
        
        
    }

    public function guardaEdicionMaterial(Request $request)
    {
        $material = Materiales::find($request->id);
        $material->Nombre=$request->nombre;
        $material->DescripcionUso=$request->descripcion;
        $material->CostoPieza=$request->precio;
        $material->TipoMaterial=$request->tipo;

        if(!is_null($request->file('imagen')))
        {
            $request->file('imagen')->storeAs('public',$material->Nombre.'.'.$request->file('imagen')->getClientOriginalExtension());
            $material->imagen=$material->Nombre.'.'.$request->file('imagen')->getClientOriginalExtension();
    
        }
        
       
        $material->save();
        $material=Materiales::find($material->id);
        $agregados=HistorialCompraMaterial::all();
        $Pedidos = Pedidos::all();
        $Productos = Productos::all();
        return view('DetalleMaterial')->with('material',$material)->with('agregados', $agregados)
        ->with('Productos', $Productos)
        ->with('Pedidos',$Pedidos);
        
       

    }
    public function BorrarMaterial($id)
    {
        $material=Materiales::find($id);
        $material->delete();
 
        return redirect('/materiales');
    }

    public function guardaAgregado(Request $request, $id)
    {
      
        $material=Materiales::find($id);
        $agregado = new HistorialCompraMaterial();
        $agregado->id_material=$request->id_material;
        $agregado->PiezasAdquiridas=$request->PiezasAdquiridas;

        $piezas = intval($request->PiezasAdquiridas);
        $CostoMaterial = intval($request->CostoPiezaM);
        
        $GastoTotal = $piezas * $CostoMaterial;
     

        $agregado->GastoTotal= strval($GastoTotal);

        $agregado->save();

       
        return redirect()->to('detallesmaterial/'.$id.'/');

    }
}
