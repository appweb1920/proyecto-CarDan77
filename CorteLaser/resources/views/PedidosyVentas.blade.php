@extends('layouts.app')
@extends('layouts.menunavegacion')

@section('menunavegacion')

@section('content')
    <div class="container">
       
       <div class="botonera">
        <a class="btn" style="background-color: rgb(122, 17, 17);color:white" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Pedidos
        </a>
        <a class="btn" style="background-color: rgb(122, 17, 17);color:white" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
            Ventas
        </a>
       </div>
           
          
          <div class="collapse show" id="collapseExample" style="background-color: rgb(189,138,62)">
            <div class="card card-body" style="background-color: rgb(189,138,62)">
                <h1 style="text-align: center;font-size: 30px;">Pedidos Pendientes</h1>
                <button type="button" class="btn" style="background-color: rgb(122, 17, 17);color:white; width:15%; float: right;" data-toggle="modal" data-target="#myModalPedido" id="open">+ Añadir</button>
    
                <table class="table table-hover" >
                    <thead style="background-color: rgb(63,34,18); color:white">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Fabricado en</th>
                        <th scope="col">Material Necesario</th>
                        <th scope="col">Fecha</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php $Necesario=0; $Utilizado=0; $Disponible=0; $TotalPiezas=0;?>

                      
                              @foreach ($materiales as $M)
                              
                                  @foreach ($agregados as $dato)
                                  @if ($dato->id_material == $M->id)
                                      <?php $TotalPiezas = $TotalPiezas + $dato->PiezasAdquiridas?>
                                  @endif
                                  @endforeach
                             
                              @endforeach

                              @foreach ($Pedidos as $pedido)
                                @foreach ($Productos as $prod)
                                  @if ($pedido->id_producto == $prod->id && $pedido->Vendido == 1)
                                    <?php $Utilizado = $Utilizado + $prod->MaterialNecesario;?>
                                    <?php $Disponible = $TotalPiezas - $Utilizado; ?>
                                
                                  @endif
                                    
                                @endforeach
                                  
                              @endforeach

                              <?php $Disponible = $TotalPiezas - $Utilizado; ?>
                     
<!--- Actualmente solo se usa madera-->
                      @foreach ($Pedidos as $pedido)
                        @foreach ($Productos as $prod)

                        @if ($pedido->id_producto == $prod->id && $pedido->Vendido == 0)

                        
                          <tr style="background-color: white">
                           
                            <td>{{$pedido->id}}</td>
                            <td>{{$prod->Nombre}}</td>
                            <td>${{$prod->Precio}}mxn</td>
                            <td>{{$prod->TipoMaterial}}</td>
                            <td>{{$prod->MaterialNecesario}}</td>
                            <td>{{$pedido->created_at}}</td>
                            <td>
                            <button type="button" class="btn btn-danger" onclick="location.href='/borrarPedido/{{$pedido->id}}'">Eliminar</button>
                            </td>
                            
                            @if ($Disponible >= $prod->MaterialNecesario)
                            <td>
                              <button type="button" class="btn btn-success" onclick="location.href='/vendido/{{$pedido->id}}'" >Realizado</button>
                           </td>
                                
                            @else
                            <td style="color: red">
                              Material <br> Insuficiente  
                           </td>
                                
                            @endif
                            
                        </tr>  
                              
                          @endif
                            
                        @endforeach
                          
                      @endforeach
                       

                       

                    </tbody>
                </table>
            </div>

            <!--------Modal-------->
        
        <form method="POST" action="/guardaPedido" id="form" enctype="multipart/form-data">
          @csrf
            <!-- Modal -->
            <div class="modal" tabindex="-1" role="dialog" id="myModalPedido">
            <div class="modal-dialog" role="document">
              <div class="modal-content" style=" color: white; background-color: gray">
                <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header text-center text-align-center">
                  <h5 class="modal-title">Añadir Pedido</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                
                  <div class="row">
                      <div class="form-group col-md-12">
                        <label for="Nombre">Producto:</label>
                        <select class="form-control" name="id_producto">
                          @foreach ($Productos as $prod)
                          <option value="{{$prod->id}}">{{$prod->Nombre}}</option>
                          @endforeach
                          
                        </select>
                        
                      </div>
                    </div>

                    <input type="hidden" class="form-control" name="pedido" id="pedido" value="0">
                        
                    
                    
                </div>

                

                <div class="modal-footer text-center text-align-center">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  <!---<button  class="btn btn-success" id="ajaxSubmit">Save changes</button>--->
                  <button type="submit" class="btn btn-success">Agregar</button>
                  </div>
              </div>
            </div>
          </div>
      </form>
          </div>

          <div class="collapse show" id="collapseExample1" style="background-color: rgb(189,138,62)">
            <div class="card card-body" style="background-color: rgb(189,138,62)">
                <h1 style="text-align: center;font-size: 30px;">Historial de Ventas</h1>
                <table class="table table-hover">
                    <thead style="background-color: rgb(63,34,18); color:white">
                      <tr>
                        
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Fabricado en</th>
                        <th scope="col">Material Utilizado</th>
                        <th scope="col">Fecha</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($Pedidos as $pedido)
                      @foreach ($Productos as $prod)
                        @if ($pedido->id_producto == $prod->id && $pedido->Vendido == 1)
                        <tr style="background-color: white">
                          
                          <td>{{$prod->Nombre}}</td>
                          <td>${{$prod->Precio}}mxn</td>
                          <td>{{$prod->TipoMaterial}}</td>
                          <td>{{$prod->MaterialNecesario}}</td>
                          <td>{{$pedido->updated_at}}</td>
                          
                          
                      </tr>  
                            
                        @endif
                          
                      @endforeach
                        
                    @endforeach

                    

                    </tbody>
                </table>
            </div>
          </div>
 
    </div>
      
@endsection
