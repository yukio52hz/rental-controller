@extends('layouts.main')

@section('content')
<div class="row">
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2" data-toggle="modal" data-target="#modalRegister"> 
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success  mb-1">
                        Registrar inquilino</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal de registro-->
<div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="modalRegister" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Inquilino</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="admin/usuarios" method="POST">
      @if($message = Session::get('ErrorInsert'))
              <div>
                <h1>Error</h1>
                <ul>
                @foreach($errors->all() as $error)
                      <li>{{ $error}}</li>
                @endforeach
                </ul>  
              </div>
      @endif
        <div class="modal-body">
        @csrf
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="farid" value="{{old('name')}}">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="surname" placeholder="Gamboa Matarrita" value="{{old('surname')}}">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="nickname" placeholder="yukio1996">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="contraseña">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="passwordCheck" placeholder="comprobar contraseña">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="name@example.com">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--Modal actualizar-->
<div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="modalUpdate" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="admin/usuarios/edit" method="POST">
        <div class="modal-body">
        @csrf
                <input type="hidden" class="form-control" name="id" id="idEdit">
              <div class="form-group">
                 <label>Nombre</label>
                <input type="text" class="form-control" name="name" id="nameEdit">
              </div>
              <div class="form-group">
                <label>Apellidos</label>
                <input type="text" class="form-control" name="surname" id="surnameEdit">
              </div>
              <div class="form-group">
                 <label>Nombre de usuario</label>
                <input type="text" class="form-control" name="nickname" id="nickEdit">
              </div>
              <div class="form-group d-none">
                 <label>contraseña</label>
                <input type="text" class="form-control" name="password" id="passwordEdit">
              </div>
              <div class="form-group">
                <label>Correo</label>
                <input type="email" class="form-control" name="email" id="emailEdit">
              </div>
              <div class="form-group">
                <label>Precio de la renta</label>
                <input type="text" class="form-control" name="rental_price" id="rental_priceEdit">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Renta</th>
        <th scope="col">Aciones</th>
      </tr>
    </thead>
    <tbody>
    @foreach($inquilinos as $inqui)
      <tr>
        <th scope="row">{{$inqui->name}}</th>
        <td>{{ $inqui->surname}}</td>
        <td>{{$inqui->rental_price}}</td>
      <td class="row">
          <!--ver-->
          <a  class="btn btn-round btnShow"  href="{{ url('admin/usuarios/show',$inqui->id) }}"><i class="fa fa-eye"></i></a>
          <!--eliminar-->
          <form action="{{ url('admin/usuarios',$inqui->id) }}" method="POST" onsubmit="return confirm('Seguro?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-round"><i class="fa fa-trash"></i></button>
          <input type="hidden" value="{{$inqui->id}}">
          </form>
          <!--editar-->
          <button type="submit" class="btn btn-round btnEdit" data-toggle="modal" data-target="#modalUpdate"
          data-id="{{$inqui->id}}"
          data-name="{{$inqui->name}}"
          data-surname="{{$inqui->surname}}"
          data-nickname="{{$inqui->nickname}}"
          data-password="{{$inqui->password}}"
          data-email="{{$inqui->email}}"
          data-rental_price="{{$inqui->rental_price}}"
          ><i class="fa fa-edit"></i></button>
      </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>       
@endsection

@section('scripts')
   <script>
   $(document).ready(function(){
    @if($message = Session::get('ErrorInsert'))
       $(exampleModal).modal('show')
    @endif

    $(".btnEdit").click(function(){
       $('#idEdit').val($(this).data('id'));
       $('#nameEdit').val($(this).data('name'));
       $('#surnameEdit').val($(this).data('surname'));
       $('#nickEdit').val($(this).data('nickname'));
       $('#passwordEdit').val($(this).data('password'));
       $('#emailEdit').val($(this).data('email'));
       $('#rental_priceEdit').val($(this).data('rental_price'));
    });
    $(".btnShow").click(function(){
       $('#profileShow').val($(this).data('profile'));
       $('#nameShow').val($(this).data('name'));
       $('#surnameShow').val($(this).data('surname'));
       $('#nickShow').val($(this).data('nickname'));
       $('#passwordShow').val($(this).data('password'));
       $('#emailShow').val($(this).data('email'));
       $('#rentShow').val($(this).data('rental_price'));
       

    });

    });

    
   </script>

@endsection
