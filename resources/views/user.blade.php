@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-center">
<div class="card" style="width: 18rem;">
  <img src="{{asset('/img_profile/'.Auth::user()->profile)}}" height="200px" width="200px" class="card-img-top" alt="profile">
  <div class="card-body">
    <h5 class="card-title">Datos de: {{ Auth::user()->name}}</h5>
    <p class="card-text">Nombre completo: {{ Auth::user()->name}} {{ Auth::user()->surname}}</p>
    <p class="card-text">Nombre de usuario: {{ Auth::user()->nickname}} </p>
    <p class="card-text">Correo: {{ Auth::user()->email}}</p>
    <p class="card-text">Renta: {{ Auth::user()->rental_price}} </p>
  </div>
</div>

</div>
@endsection