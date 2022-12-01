<?php
require_once "../connection.php";
$activePage = 'games';
require_once "header.php";

$id = $_GET['id'];

$sql = "SELECT * FROM games WHERE id = $id";

$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

if (isset($_POST['insert_group'])) {
  $datetime = $_POST['datetime'];
  $team_a = $_POST['team_a'];
  $team_b = $_POST['team_b'];
  $gol_team_a = $_POST['gol_team_a'];
  $gol_team_b = $_POST['gol_team_b'];

  $sql = "UPDATE games SET datetime='$datetime', id_team_a='$team_a', id_team_b='$team_b', gol_team_a='$gol_team_a', gol_team_b='$gol_team_b' WHERE id=$id;";
  if (mysqli_query($conn, $sql)) {
    header("Location: games.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>
<div class="flex gap-10 mb-3">
  <a class="inline-block rounded-full border border-indigo-600 p-2 text-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring active:bg-indigo-500" href="games.php">

    <div class="flex items-center gap-3">
      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
      </svg>
      <span class=""> Volver </span>
    </div>

  </a>
  <h1 class=" font-bold text-xl self-center">Formulario para insertar juego</h1>
</div>

<form method="post" class="space-y-4 mb-4">
  <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
    <div>
      <label for="datetime" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Fceha y hora del juego </span>

        <input type="datetime-local" id="datetime" name="datetime" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" value="<?php echo $row['datetime']  ?>" required />
      </label>

    </div>
    <div>
      <label for="team_a" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Equipo A </span>

        <select id="team_a" name="team_a" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" required>
          <option value="" selected disabled hidden>Elige un grupo</option>
          <?php
          $sql = "SELECT id,name FROM teams";
          $teams = mysqli_query($conn, $sql);

          if (!$teams) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          } else {
            while ($team = mysqli_fetch_assoc($teams)) {
              if ($team['id'] == $row['id_team_a']) {
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
      <label for="team_b" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Equipo B </span>

        <select id="team_b" name="team_b" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" required>
          <option value="" selected disabled hidden>Elige un grupo</option>
          <?php
          $sql = "SELECT id,name FROM teams";
          $teams = mysqli_query($conn, $sql);

          if (!$teams) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          } else {
            while ($team = mysqli_fetch_assoc($teams)) {
              if ($team['id'] == $row['id_team_b']) {
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
  </div>
  <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
    <div>


    </div>
    <div>
      <label for="gol_team_a" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Goles del equipo A </span>

        <input type="number" placeholder="Goles del equipo A" id="gol_team_a" name="gol_team_a" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" value="<?php echo $row['gol_team_a']  ?>" required />
      </label>
    </div>

    <div>
      <label for="gol_team_b" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <span class="text-xs font-medium text-gray-700"> Goles del equipo B </span>

        <input type="number" placeholder="Goles del equipo B" id="gol_team_b" name="gol_team_b" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" value="<?php echo $row['gol_team_b']  ?>" required />
      </label>
    </div>
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