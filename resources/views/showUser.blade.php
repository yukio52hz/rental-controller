@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-center">
<div class="card" style="width: 30rem;">
  <!--<img src="{{asset('/img_profile/user.jpg')}}" class="card-img-top" alt="...">-->
  <div class="card-body">
    <h5 class="card-title">Datos de:{{$user->name}}</h5>
    <p class="card-text">Nombre completo: {{$user->name}} {{$user->surname}}</p>
    <p class="card-text">Nombre de usuario: {{$user->nickname}} </p>
    <p class="card-text">Correo: {{$user->email}} </p>
    <p class="card-text">Renta: {{$user->rental_price}} </p>

    <a href="{{ url('admin/') }}" class="btn btn-primary">Volver atras</a>
  </div>
</div>

</div>
@endsection
