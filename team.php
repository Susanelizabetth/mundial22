<?php
require_once "connection.php";
$activePage = 'teams';
require_once "header.php";

$id = $_GET['id'];

$sql = "SELECT * FROM teams WHERE id = $id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>

<div class="hero h-96 " style="background-image: url(<?php echo $row['img_team']  ?>);">
  <div class="flex gap-5 px-10 items-center justify-around w-full flex-col lg:flex-row hero-overlay bg-base-100 bg-opacity-60">
    <img src="<?php echo $row['logo']  ?>" class="bg-cover h-48 rounded-lg shadow-2xl" />
    <div>
      <h1 class="text-5xl font-bold"><?php echo $row['name']  ?></h1>
      <p class="py-6"><?php echo $row['description']  ?>.</p>
    </div>
  </div>
</div>
<div class="p-10">
  <div class="card w-full bg-base-100 shadow-xl">
    <div class=" card-body">
      <h2 class="card-title text-xl font-semibold font-mono mb-4"><?php echo $row['name']  ?> en la Tabla de puntuación</h2>
      <table class="table w-full">
        <!-- head -->
        <thead>
          <tr>
            <th>Equipo</th>
            <th>PJ</th>
            <th>G</th>
            <th>E</th>
            <th>P</th>
            <th>GF</th>
            <th>GC</th>
            <th>DG</th>
            <th>Pts</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td>
              <div class="flex gap-2 items-center">
                <img class="h-4" src="<?php echo $row['logo'] ?>" alt="<?php echo $row['name'] ?>">
                <?php echo $row['name'] ?>

              </div>

            </td>
            <td><?php echo $row['gw'] + $row['gd'] + $row['gl']  ?></td>
            <td><?php echo $row['gw'] ?></td>
            <td><?php echo $row['gd'] ?></td>
            <td><?php echo $row['gl'] ?></td>
            <td><?php echo $row['gf'] ?></td>
            <td><?php echo $row['gc'] ?></td>
            <td><?php echo $row['dg'] ?></td>
            <td><?php echo ($row['gw'] * 3) + ($row['gd'] * 1) + ($row['gl'] * 0) ?></td>

          </tr>





        </tbody>
      </table>

    </div>
  </div>
  <div class=" my-4">
    <h2 class="card-title text-xl font-semibold font-mono mb-4">Juegos de <?php echo $row['name'] ?></h2>
    <div class="flex gap-3">
      <?php
      $query2 = "SELECT t.name as 'team_name_a',t.logo as 'team_logo_a',t2.name as 'team_name_b',t2.logo as 'team_logo_b',g.gol_team_a,g.gol_team_b,g.datetime,g.id FROM `games` as g INNER JOIN teams as t on g.id_team_a=t.id INNER JOIN teams as t2 on g.id_team_b=t2.id WHERE g.id_team_a = '" . $id . "' OR g.id_team_b = '" . $id . "'";
      $result2 = mysqli_query($conn, $query2);
      while ($row2 = mysqli_fetch_array($result2)) {
        $date2 = date_create($row2['datetime']);
      ?>
        <div class="card w-80 bg-base-100 shadow-2xl">
          <div class="card-body">
            <div class="flex justify-between">
              <h2 class="card-title"><?php echo date_format($date2, 'd-M') ?></h2>
              <h2 class="card-title"><?php echo date_format($date2, 'g:i A') ?></h2>
            </div>

            <div class="flex flex-col gap-2">
              <div class="flex gap-5">
                <img src="<?php echo $row2['team_logo_a'] ?>" class="w-10 h-10 rounded-full" />
                <p class=""><?php echo $row2['team_name_a'] ?></p>
                <p><?php echo $row2['gol_team_a'] ?></p>
              </div>
              <div class="flex gap-5">
                <img src="<?php echo $row2['team_logo_b'] ?>" class="w-10 h-10 rounded-full" />
                <p class=""><?php echo $row2['team_name_b'] ?></p>
                <p><?php echo $row2['gol_team_b'] ?></p>

              </div>

            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
  <div class="my-4">
    <div class="flex justify-between">
      <h2 class="card-title text-xl font-semibold font-mono mb-4">Jugadores <?php echo $row['name'] ?></h2>
      <a class="btn btn-ghost btn-sm" href="players.php?id=<?php echo $id ?>">ver todos</a>

    </div>

    <div class="flex gap-3">
      <?php
      $query2 = "SELECT players.name,players.last_name,players.picture,positions.name as 'position' FROM `players` INNER JOIN positions ON players.position_id=positions.id WHERE id_team = '" . $id . "' ORDER BY  name DESC LIMIT 6";
      $result2 = mysqli_query($conn, $query2);
      while ($row2 = mysqli_fetch_array($result2)) {

      ?>
        <div class="card w-64 bg-base-100 shadow-2xl">
          <figure><img src="<?php echo $row2['picture'] ?>" alt="<?php echo $row2['name'] ?>" /></figure>
          <div class="card-body">
            <h2 class="card-title justify-center">
              <?php echo $row2['name'] . " " . $row2['last_name'] ?>

            </h2>
            <p class="font-mono text-center"><?php echo $row2['position'] ?></p>

          </div>
        </div>

      <?php
      }
      ?>
    </div>
  </div>
</div>
</div>


<?php
require_once "footer.php";
?>