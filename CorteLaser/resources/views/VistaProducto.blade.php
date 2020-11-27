@extends('layouts.app')
@extends('layouts.menunavegacion')

@section('menunavegacion')

@section('content')
    <div class="container">
        <div class="imagenProd">
            <img style="width: 100%; height: 100%;" src="{{asset('storage/'.$producto->imagen)}}" alt="producto">
        </div>
        <div class="informacionProd">
            <h1>{{$producto->Nombre}}</h1>
            <h2>Descripcion:</h2>
            <h3>{{$producto->Descripcion}}</h3>
            <h2>Realizado en:</h2>
            <h3>{{$producto->TipoMaterial}}</h3>
            <h2>Material Necesario:</h2>       
            @if ($producto->MaterialNecesario > 1)
                <h3>{{$producto->MaterialNecesario}} tablas</h3>
            @else
                <h3>{{$producto->MaterialNecesario}} tabla</h3>
            @endif
            <h2>Precio:</h2>
            <h3>${{$producto->Precio}}MXN</h3>
        </div>

        <button type="button" class="btn btn-primary" style="display:scroll;position:fixed;bottom:10%;right:0.5%; color:white" data-toggle="modal" data-target="#myModalEdicion" id="open">Editar</button>
    <button type="button" class="btn btn-danger"  style="display:scroll;position:fixed;bottom:3%;right:0.5%; color:white" onclick="location.href='/BorrarProd/{{$producto->id}}'">Borrar</button>


         <!--------Modal-------->
        
         <form method="POST" action="/guardaEdicion" id="form" enctype="multipart/form-data">
            @csrf
              <!-- Modal -->
              <div class="modal" tabindex="-1" role="dialog" id="myModalEdicion">
              <div class="modal-dialog" role="document">
                <div class="modal-content" style=" color: white; background-color: gray">
                  <div class="alert alert-danger" style="display:none"></div>
                  <div class="modal-header text-center text-align-center">
                    <h5 class="modal-title">Edita Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="id" value="{{$producto->id}}">
                        
                    <div class="row">
                        <div class="form-group col-md-12">
                          <label for="Nombre">Nombre del Producto:</label>
                          <input type="text" class="form-control" name="nombre" id="nombre" value="{{$producto->Nombre}}">
                        </div>
                      </div>
                      <div class="row" >
                          <div class="form-group col-md-12">
                            <label for="Cantidad">Descripcion del Producto:</label>
                            <input type="text" class="form-control"  name="descripcion" id="descripcion" value="{{$producto->Descripcion}}">
                          </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                            <label for="instalaciones">Precio:</label><br>
                            <input type="number" class="form-control" name="precio" id="precio" value="{{$producto->Precio}}">
                          </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label for="Servicio a empresa">Fabricado en:</label>
                          <select id="tipoMaterial" name="tipoMaterial" class="rowser-default custom-select" value="{{$producto->TipoMaterial}}">
                            <option value="MDF 3mm">MDF 3mm</option>
                            <option value="Acrilico 3mm">Acrilico 3mm</option>
                          </select>     
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label for="Servicio a empresa">Material Necesario:</label>
                          <input type="number" class="form-control" name="cantidadMaterial" id="cantidadMaterial" value="{{$producto->MaterialNecesario}}">      
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
