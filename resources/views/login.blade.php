<h1>hola login</h1>


<form action="/login" method="POST">
 @csrf
<input type="text" name="nickname" placeholder="Nombre usuario">
<input type="password" name="password" placeholder="Cotraseña">
<button type="submit">Iniciar</button>


</form>