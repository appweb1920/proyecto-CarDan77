@section('menunavegacion')
    

<nav class="navbar navbar-dark" style="background-color: rgb(63,34,18);">
    <a style="color: white;" href="/home">Productos</a>
    <a style="color: white;" href="/pedidosyventas">Pedidos y Ventas</a>
    <?php
    $user = Auth::user()->rol ;
    ?>
    @if( $user == "Admin")
    <a style="color: white;" href="/materiales">Materiales</a>
    <a style="color: white;" href="/gananciasygastos">Ganacias y Gastos</a>
    @endif
    
  </nav>

   
  

  @endsection