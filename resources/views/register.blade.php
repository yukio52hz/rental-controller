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
            <form action="admin/registrar" method="POST">
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
      </div