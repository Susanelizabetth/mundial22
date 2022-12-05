<?php
require_once "../connection.php";
$activePage = 'teams';
require_once "header.php";
require_once "../classes/classes.php";
$teams =  new Teams;


if (isset($_POST['save'])) {
  $name = $_POST['team_name'];
  $description = $_POST['description'];
  $gw = $_POST['gw'];
  $gd = $_POST['gd'];
  $gl = $_POST['gl'];
  $logo = $_POST['logo'];
  $img_photo = $_POST['img_photo'];
  $grupo = $_POST['group_id'];
  $gf = $_POST['gf'];
  $gc = $_POST['gc'];
  $dg = $_POST['dg'];

  if ($teams->checkBefore($name, $description, $logo,$grupo)) {

    $query = "INSERT INTO teams (name,description,gw,gd,gl,logo,id_group,img_team,gf,gc,dg)
  VALUES ('$name','$description','$gw','$gd','$gl','$logo','$grupo','$img_photo','$gf','$gc','$dg')";

    if (mysqli_query($conn, $query)) {

      header("Location: teams.php");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
}
?>

<div class="flex gap-10 mb-3">
  <a class="inline-block rounded-full border border-indigo-600 p-2 text-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring active:bg-indigo-500" href="teams.php">

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

  <div>
    <label for="teamName" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
      <span class="text-xs font-medium text-gray-700"> Nombre del equipo </span>

      <input type="text" id="teamName" placeholder="Nombre del equipo" name="team_name" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" required />
    </label>
  </div>
  <div>
    <label for="descripcion" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
      <span class="text-xs font-medium text-gray-700"> Descripción del equipo</span>

      <textarea class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" placeholder="Descripción" rows="8" id="descripcion" name="description" required></textarea>
    </label>
  </div>

  <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
    <div>
      <label for="gameWon" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Juegos Ganados </span>

        <input type="number" id="gameWon" placeholder=" Juegos Ganados" name="gw" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" />
      </label>
    </div>

    <div>
      <label for="gameDraw" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Juegos Empatados </span>

        <input type="number" id="gameDraw" placeholder="Juegos Empatados" name="gd" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" />
      </label>
    </div>

    <div>
      <label for="gameLose" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Juegos Perdidos </span>

        <input type="number" id="gameLose" placeholder="Juegos Perdidos" name="gl" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" />
      </label>
    </div>
  </div>

  <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
    <div>
      <label for="gf" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Goles a favor </span>

        <input type="number" id="gf" placeholder="Goles a favor" name="gf" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" />
      </label>
    </div>

    <div>
      <label for="gd" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Goles en contra </span>

        <input type="number" id="gd" placeholder="Goles en contra" name="gc" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" />
      </label>
    </div>

    <div>
      <label for="dg" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Diferencia de goles </span>

        <input type="number" id="dg" placeholder="Diferencia de goles" name="dg" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" />
      </label>
    </div>
  </div>



  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
    <div>
      <label for="logo" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Link del logo del país </span>

        <input type="text" id="logo" placeholder="Link del logo del país" name="logo" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" required />
      </label>
    </div>

    <div>
      <label for="img_photo" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Link de foto del equipo </span>

        <input type="text" id="img_photo" placeholder="Link de foto del equipo" name="img_photo" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" />
      </label>
    </div>
  </div>
  <div>
    <label for="groupId" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
      <span class="text-xs font-medium text-gray-700"> Grupo al que pertenece </span>

      <select id="groupId" name="group_id" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" required>
        <option value="" selected disabled hidden>Elige un grupo</option>
        <?php
        $sql = "SELECT * FROM groups";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } else {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
          }
        }
        ?>
      </select>
    </label>
  </div>





  <div class="mt-4 flex justify-between">
    <button type="submit" class="inline-flex w-full items-center justify-center rounded-lg bg-black px-5 py-2 text-white sm:w-auto" name="save">
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