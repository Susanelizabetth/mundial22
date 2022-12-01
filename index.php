<?php

require_once "connection.php";
$activePage = basename($_SERVER['PHP_SELF'], ".php");
require_once "header.php";
?>
<div class="hero h-96" style="background-image: url(https://turismo.org/wp-content/uploads/2021/11/Catar.jpg);">
  <div class="hero-overlay bg-base-content  bg-opacity-70"></div>
  <div class="hero-content text-center text-neutral-content">
    <div class="max-w-md">
      <h1 class="mb-5 text-5xl font-bold text-secondary-content">Copa Mundial de la FIFA Catar 2022™</h1>

      <p class="mb-5 text-secondary-content font-medium font-mono">La Copa Mundial de Fútbol de la FIFA Catar 2022 es la vigésima segunda edición de la Copa Mundial de Fútbol masculino organizada por la FIFA. Se está desarrollando desde el 20 de noviembre al 18 de diciembre del presente año en Catar, que consiguió los derechos de organización el 2 de diciembre de 2010​.</p>
    </div>
  </div>
</div>
<div class="p-10">
  <h2 class="text-xl font-semibold font-mono">Próximos juegos</h2>
  <div class="flex justify-between">
    <?php

    $sql = "SELECT t.name as 'team_name_a',t.logo as 'team_logo_a',t2.name as 'team_name_b',t2.logo as 'team_logo_b',g.gol_team_a,g.gol_team_b,g.datetime,g.id FROM `games` as g INNER JOIN teams as t on g.id_team_a=t.id INNER JOIN teams as t2 on g.id_team_b=t2.id WHERE g.datetime > NOW() ORDER BY g.datetime ASC LIMIT 4;";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } else {
      while ($row = mysqli_fetch_array($result)) {
        $datetime = date_create($row['datetime']);
    ?>


        <div class="card w-80 bg-base-100 shadow-2xl">
          <div class="card-body">
            <div class="flex justify-between">
              <h2 class="card-title"><?php echo date_format($datetime, 'd-M') ?></h2>
              <h2 class="card-title"><?php echo date_format($datetime, 'g:i A') ?></h2>
            </div>

            <div class="flex flex-col gap-2">
              <div class="flex gap-5">
                <img src="<?php echo $row['team_logo_a'] ?>" class="w-10 h-10 rounded-full" />
                <p class=""><?php echo $row['team_name_a'] ?></p>
              </div>
              <div class="flex gap-5">
                <img src="<?php echo $row['team_logo_b'] ?>" class="w-10 h-10 rounded-full" />
                <p class=""><?php echo $row['team_name_b'] ?></p>
              </div>

            </div>
          </div>
        </div>


    <?php
      }
    }
    ?>
  </div>
</div>

<div class="p-10">
  <div class="flex justify-between mb-4">
    <h2 class="text-xl font-semibold font-mono"><?php
                                                if ($_SESSION != '') : echo 'Equipos Favoritos';
                                                else : echo 'Equipos';
                                                endif;  ?></h2>
    <a class="btn btn-ghost btn-sm" href="teams.php">ver todos</a>
  </div>
  <div class="flex  <?php
                    if ($_SESSION != '') : echo 'gap-5';
                    else : echo 'justify-between';
                    endif;  ?>">
    <?php
    if ($_SESSION['user'] == "") :

      $sql = "SELECT * FROM `teams` ORDER BY name ASC LIMIT 7;";

      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="card h-48 w-52 bg-base-100 shadow-xl">
          <figure><img src="<?php echo $row['logo'] ?>" alt="<?php echo $row['name'] ?>" /></figure>
          <div class="card-body p-2 justify-center items-center">
            <a class="btn btn-ghost btn-xs" href='team.php?id=<?php echo $row["id"] ?>'><?php echo $row['name'] ?></a>
          </div>
        </div>
      <?php
      }
    else :

      ?>
      <?php
      $sql = "SELECT teams.name, teams.id,teams.logo,favorite.id as 'favorite_id' FROM `teams` INNER JOIN favorite ON teams.id = favorite.id_team WHERE favorite.id_user = '" . $_SESSION['id'] . "' ORDER BY name ASC LIMIT 6;";

      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($result)) {

      ?>
        <div class="card h-48 w-52 bg-base-100 shadow-xl">
          <figure><img src="<?php echo $row['logo'] ?>" alt="<?php echo $row['name'] ?>" /></figure>
          <div class="card-body p-2 justify-center items-center">
            <a class="btn btn-ghost btn-xs" href='team.php?id=<?php echo $row["id"] ?>'><?php echo $row['name'] ?></a>
            <a class="badge badge-warning " href='favorite_delete.php?id=<?php echo $row["favorite_id"] ?>&return=index.php'>favorito</a>
          </div>
        </div>
    <?php

      }
    endif;
    ?>
  </div>
</div>



<?php
require_once "footer.php";
?>