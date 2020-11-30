@extends('layouts.app')
@extends('layouts.menunavegacion')

@section('menunavegacion')

@section('content')
    <div class="container">
        <div class="imagenProd">
            <img style="width: 100%; height: 100%;" src="{{asset('storage/'.$material->imagen)}}" alt="producto">
        </div>
        <div class="informacionProd">
            <div class="informacion1">
                <h1>Historial de Compra</h1>
                <table class="table table-hover">
                    <thead style="background-color: rgb(63,34,18); color:white">
                      <tr>
                        <th scope="col">Piezas Adquiridas</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Gasto Compra</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($agregados as $dato)
                            @if ($dato->id_material == $material->id)
                            <tr style="background-color: white">
                                <td>{{$dato->PiezasAdquiridas}}</td>
                                <td>{{$dato->created_at}}</td>
                                <td>${{$dato->GastoTotal}} MXN</td>
                            </tr>  
                            @endif
                            
                        @endforeach
                     
                   
                    
                    </tbody>
                  </table>
            </div>
            <div class="informacion2">
                <h1>{{$material->Nombre}}</h1>
                <h2>Descripcion:</h2>
                <h3>{{$material->DescripcionUso}}</h3>
                <h2>Tipo de Material:</h2>
                <h3>{{$material->TipoMaterial}}</h3>
                <h2>Costo por Pieza:</h2>
                <h3>${{$material->CostoPieza}}MXN C/u</h3>
                <h2>Piezas Disponibles:</h2>
                <?php $TotalPiezas = 0; ?>
                @foreach ($agregados as $dato)
                @if ($dato->id_material == $material->id)
                    <?php $TotalPiezas = $TotalPiezas + $dato->PiezasAdquiridas?>
                @endif
                @endforeach
                <h3>{{$TotalPiezas}}</h3>
            </div>
    

        </div>
        <button type="button" class="btn btn-success" style="display:scroll;position:fixed;bottom:17%;right:0.5%; color:white" data-toggle="modal" data-target="#myModalAñade" id="open">Añadir</button>
        <button type="button" class="btn btn-primary" style="display:scroll;position:fixed;bottom:10%;right:0.5%; color:white" data-toggle="modal" data-target="#myModalEdita" id="open">Editar</button>
        <button type="button" class="btn btn-danger"  style="display:scroll;position:fixed;bottom:3%;right:0.5%; color:white" onclick="location.href='/BorrarMaterial/{{$material->id}}'">Borrar</button>

        <!--------Modal Añade-------->
        
    <form method="POST" action="/guardaAgregado/{{$material->id}}" id="form" enctype="multipart/form-data">
            @csrf
              <!-- Modal -->
              <div class="modal" tabindex="-1" role="dialog" id="myModalAñade">
              <div class="modal-dialog" role="document">
                <div class="modal-content" style=" color: white; background-color: gray">
                  <div class="alert alert-danger" style="display:none"></div>
                  <div class="modal-header text-center text-align-center">
                    <h5 class="modal-title">Añadir Material</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" class="form-control" name="id_material" id="id_material" value="{{$material->id}}">
                    <input type="hidden" class="form-control" name="CostoPiezaM" id="CostoPiezaM" value="{{$material->CostoPieza}}">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="instalaciones">Piezas Adquiridad:</label><br>
                            <input type="number" class="form-control" name="PiezasAdquiridas" id="PiezasAdquiridas" >
                          </div>
                      </div>

                     

                     
                      
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
     
        
        
        <!--------Modal Edita-------->
        
         <form method="POST" action="/guardaEdicionMaterial" id="form" enctype="multipart/form-data">
            @csrf
              <!-- Modal -->
              <div class="modal" tabindex="-1" role="dialog" id="myModalEdita">
              <div class="modal-dialog" role="document">
                <div class="modal-content" style=" color: white; background-color: gray">
                  <div class="alert alert-danger" style="display:none"></div>
                  <div class="modal-header text-center text-align-center">
                    <h5 class="modal-title">Añadir Material</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="id" value="{{$material->id}}">
                    
                  
                    <div class="row">
                        <div class="form-group col-md-12">
                          <label for="Nombre">Nombre del Material:</label>
                          <input type="text" class="form-control" name="nombre" id="nombre" value="{{$material->Nombre}}">
                        </div>
                      </div>
                      <div class="row" >
                          <div class="form-group col-md-12">
                            <label for="Cantidad">Descripcion de Uso:</label>
                            <input type="text" class="form-control"  name="descripcion" id="descripcion" value="{{$material->DescripcionUso}}">
                          </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                            <label for="instalaciones">Costo por Pieza:</label><br>
                            <input type="number" class="form-control" name="precio" id="precio" value="{{$material->CostoPieza}}">
                          </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label for="Servicio a empresa">Tipo de Material:</label>
                          <select id="tipo" name="tipo" class="rowser-default custom-select" value="{{$material->TipoMaterial}}">
                            <option value="Principal">Principal</option>
                            <option value="Adicional">Adicional</option>
                          </select>     
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label for="Servicio a empresa">Selecciona imagen:</label>
                          <input type="file" class="form-control" name="imagen">     
                        </div>
                      </div>
                  </div>

                  

                  <div class="modal-footer text-center text-align-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <!---<button  class="btn btn-success" id="ajaxSubmit">Save changes</button>--->
                    <button type="submit" class="btn btn-success">Modificar</button>
                    </div>
                </div>
              </div>
            </div>
        </form>
    

    </div>
      
@endsection
