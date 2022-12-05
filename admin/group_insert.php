<?php
require_once "../connection.php";
$activePage = 'groups';
require_once "header.php";
require_once "../classes/classes.php";

$group = new Groups;

if (isset($_POST['insert_group'])) {
  $name = $_POST['name'];
  if ($group->ifName($name)) {
    $sql = "INSERT INTO `groups` (`name`) VALUES ('$name');";
    if (mysqli_query($conn, $sql)) {
      header("Location: groups.php");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
 
}
?>
<div class="flex gap-10 mb-3">
  <a class="inline-block rounded-full border border-indigo-600 p-2 text-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring active:bg-indigo-500" href="groups.php">

    <div class="flex items-center gap-3">
      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
      </svg>
      <span class=""> Volver </span>
    </div>

  </a>
  <h1 class=" font-bold text-xl self-center">Formulario para insertar grupo</h1>
</div>

<form method="post" class="space-y-4 mb-4">

  <div>
    <label for="name" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
      <span class="text-xs font-medium text-gray-700"> Nombre del grupo </span>

      <input type="text" id="name" placeholder="Nombre del grupo" name="name" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" required />
    </label>
  </div>


  <div class="mt-4 flex justify-between">
    <button type="submit" class="inline-flex w-full items-center justify-center rounded-lg bg-black px-5 py-2 text-white sm:w-auto" name="insert_group">
      <span class="font-medium"> Guardar grupo </span>

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