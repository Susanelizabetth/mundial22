<?php
require_once "../connection.php";
$activePage = 'players';
require_once "header.php";
$id = $_GET['id'];

$sql = "SELECT * FROM players WHERE id = $id";

$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

if (isset($_POST['update_player'])) {
  $name = $_POST['name'];
  $last_name = $_POST['last_name'];
  $team = $_POST['team'];
  $position = $_POST['position'];
  $picture = $_POST['picture'];

  $sql = "UPDATE players SET name = '$name', last_name = '$last_name', id_team = '$team', position_id = '$position', picture = '$picture' WHERE id = $id";

  if (mysqli_query($conn, $sql)) {
    header("Location: players.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>

<div class="flex gap-10 mb-3">
  <a class="inline-block rounded-full border border-indigo-600 p-2 text-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring active:bg-indigo-500" href="players.php">

    <div class="flex items-center gap-3">
      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
      </svg>
      <span class=""> Volver </span>
    </div>

  </a>
  <h1 class=" font-bold text-xl self-center">Editar jugador</h1>
</div>
<form method="post" class="space-y-4 mb-4">
  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
    <div>
      <label for="name" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Nombre del jugador </span>

        <input type="text" id="name" placeholder="Nombre del jugador" name="name" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" value="<?php echo $row['name']  ?>" required />
      </label>
    </div>

    <div>
      <label for="last_name" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Apellido del jugador </span>

        <input type="text" id="last_name" placeholder="Apellido del jugador" name="last_name" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" value="<?php echo $row['last_name']  ?>" required />
      </label>
    </div>
  </div>
  <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
    <div>
      <label for="team" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Equipo al que pertenece </span>

        <select id="team" name="team" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" required>
          <option value="" selected disabled hidden>Elige un grupo</option>
          <?php
          $sql = "SELECT id,name FROM teams;";
          $result = mysqli_query($conn, $sql);
          if (!$result) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          } else {
            while ($team = mysqli_fetch_assoc($result)) {

              if ($team['id'] == $row['id_team']) {
                echo "<option value='" . $team['id'] . "' selected>" . $team['name'] . "</option>";
              } else {
                echo "<option value='" . $team['id'] . "'>" . $team['name'] . "</option>";
              }
            }
          }
          ?>
        </select>
      </label>
    </div>

    <div>
      <label for="position" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Posición </span>
        <select id="position" name="position" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" required>

          <option value="" selected disabled hidden>Elige una posición</option>
          <?php
          $sql = "SELECT id,name FROM positions;";
          $result = mysqli_query($conn, $sql);
          if (!$result) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          } else {
            while ($position = mysqli_fetch_assoc($result)) {

              if ($position['id'] == $row['position_id']) {
                echo "<option value='" . $position['id'] . "' selected>" . $position['name'] . "</option>";
              } else {
                echo "<option value='" . $position['id'] . "'>" . $position['name'] . "</option>";
              }
            }
          }
          ?>
        </select>
      </label>
    </div>

    <div>
      <label for="picture" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Link de foto del jugador </span>

        <input type="text" id="picture" placeholder="Link de foto del jugador" name="picture" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" value="<?php echo $row['picture']  ?>" required />
      </label>
    </div>
  </div>


  <div class="mt-4 flex justify-between">
    <button type="submit" class="inline-flex w-full items-center justify-center rounded-lg bg-black px-5 py-2 text-white sm:w-auto" name="update_player">
      <span class="font-medium"> Actualizar jugador </span>

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