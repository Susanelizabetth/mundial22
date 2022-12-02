<?php

require_once "connection.php";
$activePage = basename($_SERVER['PHP_SELF'], ".php");
require_once "header.php";


$id = $_GET['id'];

$sql = "SELECT * FROM teams WHERE id = $id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>
<div class="p-10">
  <div class="flex gap-2 w-full">
    <div class="flex flex-col h-96 gap-2 w-2/5">
      <div class="flex gap-5 h-full items-center">
        <img class="h-10" src="<?php echo $row['logo'] ?>" alt="<?php echo $row['name'] ?>">
        <h1 class="text-xl font-bold text-gray-900 sm:text-3xl">Equipo de <?php echo $row['name'] ?></h1>
      </div>
      <div class="h-full">
        <img src="<?php echo $row['img_team'] ?>" class=" object-cover object-top h-full" />
      </div>
    </div>
    <div class="w-3/5">
      <h2 class="card-title text-xl font-semibold font-mono mb-4">Porteros</h2>
      <div class="flex flex-wrap gap-3 justify-around">
        <?php
        $query2 = "SELECT players.name,players.last_name,players.picture,positions.name as 'position' FROM `players` INNER JOIN positions ON players.position_id=positions.id WHERE id_team = '" . $id . "' and positions.id='3' ORDER BY  name ";
        $result2 = mysqli_query($conn, $query2);
        while ($row2 = mysqli_fetch_array($result2)) {

        ?>
          <div class="card w-56 h-96 bg-base-100 shadow-2xl">
            <figure><img src="<?php echo $row2['picture'] ?>" alt="<?php echo $row2['name'] ?>" /></figure>
            <div class="card-body">
              <h2 class="card-title justify-center text-sm uppercase">
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
  <div class="divider"></div>
  <h2 class="card-title text-xl font-semibold font-mono mb-4">Defensor</h2>
  <div class="w-full flex flex-wrap gap-3 justify-around">

    <?php
    $query2 = "SELECT players.name,players.last_name,players.picture,positions.name as 'position' FROM `players` INNER JOIN positions ON players.position_id=positions.id WHERE id_team = '" . $id . "' and positions.id='1' ORDER BY  name";
    $result2 = mysqli_query($conn, $query2);
    while ($row2 = mysqli_fetch_array($result2)) {

    ?>
      <div class="card w-56 h-96 bg-base-100 shadow-2xl">
        <figure><img src="<?php echo $row2['picture'] ?>" alt="<?php echo $row2['name'] ?>" /></figure>
        <div class="card-body">
          <h2 class="card-title justify-center  text-sm uppercase">
            <?php echo $row2['name'] . " " . $row2['last_name'] ?>

          </h2>
          <p class="font-mono text-center"><?php echo $row2['position'] ?></p>

        </div>
      </div>

    <?php
    }
    ?>

  </div>
  <div class="divider"></div>
  <h2 class="card-title text-xl font-semibold font-mono mb-4">Mediocampista</h2>
  <div class="w-full flex flex-wrap gap-3 justify-around">

    <?php
    $query2 = "SELECT players.name,players.last_name,players.picture,positions.name as 'position' FROM `players` INNER JOIN positions ON players.position_id=positions.id WHERE id_team = '" . $id . "' and positions.id='2' ORDER BY  name";
    $result2 = mysqli_query($conn, $query2);
    while ($row2 = mysqli_fetch_array($result2)) {

    ?>
      <div class="card w-56 h-96 bg-base-100 shadow-2xl">
        <figure><img src="<?php echo $row2['picture'] ?>" alt="<?php echo $row2['name'] ?>" /></figure>
        <div class="card-body">
          <h2 class="card-title justify-center  text-sm uppercase">
            <?php echo $row2['name'] . " " . $row2['last_name'] ?>

          </h2>
          <p class="font-mono text-center"><?php echo $row2['position'] ?></p>

        </div>
      </div>

    <?php
    }
    ?>

  </div>

  <div class="divider"></div>
  <h2 class="card-title text-xl font-semibold font-mono mb-4">Delantero</h2>
  <div class="w-full flex flex-wrap gap-3 justify-around">

    <?php
    $query2 = "SELECT players.name,players.last_name,players.picture,positions.name as 'position' FROM `players` INNER JOIN positions ON players.position_id=positions.id WHERE id_team = '" . $id . "' and positions.id='4' ORDER BY  name";
    $result2 = mysqli_query($conn, $query2);
    while ($row2 = mysqli_fetch_array($result2)) {

    ?>
      <div class="card w-56 h-96 bg-base-100 shadow-2xl">
        <figure><img src="<?php echo $row2['picture'] ?>" alt="<?php echo $row2['name'] ?>" /></figure>
        <div class="card-body">
          <h2 class="card-title justify-center  text-sm uppercase">
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



<?php
require_once "footer.php";
?>