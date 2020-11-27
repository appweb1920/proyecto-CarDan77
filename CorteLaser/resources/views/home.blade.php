@extends('layouts.app')
@extends('layouts.menunavegacion')

@section('menunavegacion')

@section('content')
    <div class="container">
        @foreach ($productos as $prod)
            <div class="BloqueProducto">
                <div class="bloqueImagen">
                    <img style="width: 100%; height: 100%;" src="{{asset('storage/'.$prod->imagen)}}" alt="producto">
                </div>
                <h1>{{$prod->Nombre}}</h1>
                <h2>${{$prod->Precio}}MXN</h2>
            <button type="button" class="btn" style="background-color: rgb(122, 17, 17);float: right; color:white; margin-right:5%" onclick="location.href='/verproducto/{{$prod->id}}'">Ver</button>
            </div>
        @endforeach

        
        <button type="button" class="btn" style="background-color: rgb(122, 17, 17);display:scroll;position:fixed;bottom:3%;right:0.5%; color:white" data-toggle="modal" data-target="#myModal" id="open">+ Añadir</button>
    

        <!--------Modal-------->
        
        <form method="POST" action="/guardaProducto" id="form" enctype="multipart/form-data">
            @csrf
              <!-- Modal -->
              <div class="modal" tabindex="-1" role="dialog" id="myModal">
              <div class="modal-dialog" role="document">
                <div class="modal-content" style=" color: white; background-color: gray">
                  <div class="alert alert-danger" style="display:none"></div>
                  <div class="modal-header text-center text-align-center">
                    <h5 class="modal-title">Añadir Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  
                    <div class="row">
                        <div class="form-group col-md-12">
                          <label for="Nombre">Nombre del Producto:</label>
                          <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                      </div>
                      <div class="row" >
                          <div class="form-group col-md-12">
                            <label for="Cantidad">Descripcion del Producto:</label>
                            <input type="text" class="form-control"  name="descripcion" id="descripcion">
                          </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                            <label for="instalaciones">Precio:</label><br>
                            <input type="number" class="form-control" name="precio" id="precio" value="1">
                          </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label for="Servicio a empresa">Fabricado en:</label>
                          <select id="tipoMaterial" name="tipoMaterial" class="rowser-default custom-select">
                            <option value="MDF 3mm">MDF 3mm</option>
                            <option value="Acrilico 3mm">Acrilico 3mm</option>
                          </select>     
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label for="Servicio a empresa">Material Necesario:</label>
                          <input type="number" class="form-control" name="cantidadMaterial" id="cantidadMaterial" value="1">      
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
                    <button type="submit" class="btn btn-success">Agregar</button>
                    </div>
                </div>
              </div>
            </div>
        </form>
    </div>
      
@endsection
