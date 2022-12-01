<?php

require_once "connection.php";
$activePage = basename($_SERVER['PHP_SELF'], ".php");
require_once "header.php";
?>


<div class="bg-red-700 py-5 px-10">
  <h1 class="text-base-100 font-semibold font-mono text-xl uppercase">Servicios Api</h1>
</div>
<div class="p-10 flex flex-col gap-10">
  <div>
    <h1 class="mb-4 font-semibold font-mono text-2xl">Obtener todos los equipos</h1>
    <div class="alert shadow-lg">
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info flex-shrink-0 w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <div>
          <h3 class="font-bold font-mono">http://localhost/project-sem/api/teams.php</h3>

        </div>
      </div>
      <div class="flex-none">
        <a class="btn btn-sm" href="api/teams.php">Probar</a>
      </div>
    </div>
  </div>
  <div>
    <h1 class="mb-4 font-semibold font-mono text-2xl">Obtener un equipo por id</h1>
    <div class="alert shadow-lg">
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info flex-shrink-0 w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <div class="w-full">
          <h3 class="font-bold font-mono">http://localhost/project-sem/api/team.php?id=3</h3>
          <div>
            <select id="teams" name="teams" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" required>
              <option value="" selected disabled hidden>Elige un grupo</option>
              <?php
              $sql = "SELECT id,name FROM teams";
              $result = mysqli_query($conn, $sql);
              if (!$result) {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              } else {
                while ($team = mysqli_fetch_assoc($result)) {

                  echo "<option value='" . $team['id'] . "'>" . $team['name'] . "</option>";
                }
              }
              ?>
            </select>



          </div>
        </div>
      </div>

      <div class="flex-none">
        <a class="btn btn-sm" onclick="team_by_id()">Probar</a>
      </div>
    </div>
  </div>
  <div class="divider"></div>
  <div>
    <h1 class="mb-4 font-semibold font-mono text-2xl">Obtener todos los jugadores</h1>
    <div class="alert shadow-lg">
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info flex-shrink-0 w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <div>
          <h3 class="font-bold font-mono">http://localhost/project-sem/api/players.php</h3>

        </div>
      </div>
      <div class="flex-none">
        <a class="btn btn-sm" href="api/players.php">Probar</a>
      </div>
    </div>
  </div>
  <div>
    <h1 class="mb-4 font-semibold font-mono text-2xl">Obtener un jugador por id</h1>
    <div class="alert shadow-lg">
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info flex-shrink-0 w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <div class="w-full">
          <h3 class="font-bold font-mono">http://localhost/project-sem/api/player.php?id=3</h3>
          <div>
            <select id="players" name="players" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" required>
              <option value="" selected disabled hidden>Elige un grupo</option>
              <?php
              $sql = "SELECT id,name,last_name FROM players";
              $result = mysqli_query($conn, $sql);
              if (!$result) {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              } else {
                while ($player = mysqli_fetch_assoc($result)) {

                  echo "<option value='" . $player['id'] . "'>" . $player['name'] . " " . $player['last_name'] . "</option>";
                }
              }
              ?>
            </select>



          </div>
        </div>
      </div>

      <div class="flex-none">
        <a class="btn btn-sm" onclick="player_by_id()">Probar</a>
      </div>
    </div>
  </div>
  <div>
    <h1 class="mb-4 font-semibold font-mono text-2xl">Obtener jugadores por id de equipo</h1>
    <div class="alert shadow-lg">
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info flex-shrink-0 w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <div class="w-full">
          <h3 class="font-bold font-mono">http://localhost/project-sem/api/playerby_team.php?id_team=3</h3>
          <div>
            <select id="teams2" name="teams2" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" required>
              <option value="" selected disabled hidden>Elige un grupo</option>
              <?php
              $sql = "SELECT id,name FROM teams";
              $result = mysqli_query($conn, $sql);
              if (!$result) {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              } else {
                while ($player = mysqli_fetch_assoc($result)) {

                  echo "<option value='" . $player['id'] . "'>" . $player['name'] . "</option>";
                }
              }
              ?>
            </select>



          </div>
        </div>
      </div>

      <div class="flex-none">
        <a class="btn btn-sm" onclick="player_by_id_team()">Probar</a>
      </div>
    </div>
  </div>
</div>
<script>
  function team_by_id() {
    let id = document.getElementById("teams").value;
    window.location.href = "api/team.php?id=" + id;
  }

  function player_by_id() {
    let id = document.getElementById("players").value;
    window.location.href = "api/player.php?id=" + id;
  }

  function player_by_id_team() {
    let id = document.getElementById("teams2").value;
    window.location.href = "api/playerby_team.php?id_team=" + id;
  }
</script>

<?php
require_once "footer.php";
?>