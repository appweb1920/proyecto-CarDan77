@extends('layouts.app')
@extends('layouts.menunavegacion')

@section('menunavegacion')

@section('content')
    <div class="container">
       
       <div class="botonera">
        <a class="btn" style="background-color: rgb(122, 17, 17);color:white" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Ganancias
        </a>
        <a class="btn" style="background-color: rgb(122, 17, 17);color:white" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
            Gastos
        </a>
       </div>
           
          
          <div class="collapse show" id="collapseExample" style="background-color: rgb(189,138,62)">
            <div class="card card-body" style="background-color: rgb(189,138,62)">
                <h1 style="text-align: center;font-size: 30px;">Ganancias</h1>
                
                <table class="table table-hover" >
                    <thead style="background-color: rgb(63,34,18); color:white">
                      <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                      <?php $ganancia = 0;?>
                      @foreach ($Pedidos as $pedido)
                        @foreach ($Productos as $prod)
                        
                        @if ($pedido->id_producto == $prod->id && $pedido->Vendido == 1)
                          <tr style="background-color: white">
                           
                            <td>{{$prod->Nombre}}</td>
                            <td>${{$prod->Precio}}mxn</td>

                            <?php $ganancia = $ganancia + $prod->Precio?>

                            

                        </tr>  
                              
                          @endif
                            
                        @endforeach
                          
                      @endforeach
                      <tr style="background-color:rgb(0,90,90)">
                      
                      <td style="font-weight: bold; color:white">Total de Ganancia:</td>
                      <td style="font-weight: bold; color:white">${{$ganancia}}mxn</td>
                      </tr>

                    </tbody>
                </table>
            </div>

          </div>

          <div class="collapse show" id="collapseExample1" style="background-color: rgb(189,138,62)">
            <div class="card card-body" style="background-color: rgb(189,138,62)">
                <h1 style="text-align: center;font-size: 30px;">Gastos</h1>
                <table class="table table-hover">
                    <thead style="background-color: rgb(63,34,18); color:white">
                      <tr>
                        
                        <th scope="col">Material</th>
                        <th scope="col"> Piezas</th>
                        <th scope="col">Costo</th>
                        
                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php $gasto = 0;?>
                      @foreach ($agregados as $agregado)
                        @foreach ($materiales as $mat)
                        
                        @if ($agregado->id_material == $mat->id)
                          <tr style="background-color: white">
                           
                            <td>{{$mat->Nombre}}</td>
                            <td>{{$agregado->PiezasAdquiridas}}</td>
                            <td>${{$agregado->GastoTotal}}mxn</td>

                            <?php $gasto = $gasto + $agregado->GastoTotal?>

                            

                        </tr>  
                              
                          @endif
                            
                        @endforeach
                          
                      @endforeach
                      <tr style="background-color:rgb(0,90,90)">
                      
                      <td style="font-weight: bold; color:white">Total de Gastos:</td>
                      <td></td>
                      <td style="font-weight: bold; color:white">${{$gasto}}mxn</td>
                      </tr>

                    </tbody>
                </table>
            </div>
          </div>
 
    </div>
      
@endsection
