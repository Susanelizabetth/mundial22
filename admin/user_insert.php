<?php
require_once "../connection.php";
$activePage = 'users';
require_once "header.php";
require_once "../classes/classes.php";
$users =  new Users;

if (isset($_POST['insert_user'])) {
  $name = $_POST['name'];
  $last_name = $_POST['last_name'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $type = $_POST['type'];

  if ($users->checkBefore($name, $last_name, $username, $password, $type)) {
    $query = "INSERT INTO users (name,last_name,username,password,type)
  VALUES ('$name','$last_name','$username','$password','$type')";

    if (mysqli_query($conn, $query)) {

      header("Location: users.php");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
}
?>

<div class="flex gap-10 mb-3">
  <a class="inline-block rounded-full border border-indigo-600 p-2 text-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring active:bg-indigo-500" href="users.php">

    <div class="flex items-center gap-3">
      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
      </svg>
      <span class=""> Volver </span>
    </div>

  </a>
  <h1 class=" font-bold text-xl self-center">Formulario para insertar un Equipo</h1>
</div>
<form method="post" class="space-y-4 mb-4">
  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
    <div>
      <label for="name" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Nombre </span>

        <input type="text" id="name" placeholder="Nombre" name="name" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" required />
      </label>
    </div>

    <div>
      <label for="last_name" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Apellido </span>

        <input type="text" id="last_name" placeholder="Apellido" name="last_name" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" />
      </label>
    </div>
  </div>

  <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
    <div>
      <label for="username" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Nombre de usuario </span>

        <input type="text" id="username" placeholder=" Nombre de usuario" name="username" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" required />
      </label>
    </div>

    <div>
      <label for="password" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Contraseña </span>

        <input type="text" id="password" placeholder="Contraseña" name="password" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" required />
      </label>
    </div>

    <div>
      <label for="type" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Tipo de usuario </span>

        <select id="type" name="type" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" required>
          <option value="" selected disabled hidden>Elige un grupo</option>
          <option value="0">Cliente</option>
          <option value="1">Administrador</option>
        </select>
      </label>
    </div>


    <div class="mt-4 flex justify-between">
      <button type="submit" class="inline-flex w-full items-center justify-center rounded-lg bg-black px-5 py-2 text-white sm:w-auto" name="insert_user">
        <span class="font-medium"> Guardar equipo </span>

        <svg xmlns="http://www.w3.org/2000/svg" class="ml-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
        </svg>
      </button>
    </div>

</form>

<!-- ==================================== FIN ==================================== -->
</div>
</body>

</html>