<?php
require_once "connection.php";
$activePage = basename($_SERVER['PHP_SELF'], ".php");
require_once "header.php";
?>
<div class="bg-red-700 py-5 px-10">
  <h1 class="text-base-100 font-semibold font-mono text-xl uppercase">Equipos</h1>
</div>

<?php if ($_SESSION['user'] == '') : ?>
  <div class="p-10">
    <div class="flex flex-wrap gap-2 justify-center">
      <?php

      $sql = "SELECT * FROM `teams` ORDER BY name;";

      $result = mysqli_query($conn, $sql);

      if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      } else {
        while ($row = mysqli_fetch_array($result)) {
      ?>
          <div class="card h-48 w-52 bg-base-100 shadow-xl">
            <figure><img src="<?php echo $row['logo'] ?>" alt="Shoes" /></figure>
            <div class="card-body p-2 justify-center">
              <a class="btn btn-ghost btn-xs" href='team.php?id=<?php echo $row["id"] ?>'><?php echo $row['name'] ?></a>

            </div>
          </div>
      <?php
        }
      }
      ?>

    </div>
  </div>
<?php else : ?>
  <div class="pb-10 px-10 pt-4">
    <div>
      <h2 class="text-xl font-semibold font-mono mb-4">Favoritos</h2>
      <div class="flex gap-5">
        <?php
        $sql = "SELECT teams.name, teams.id,teams.logo,favorite.id as 'favorite_id' FROM `teams` INNER JOIN favorite ON teams.id = favorite.id_team WHERE favorite.id_user = '" . $_SESSION['id'] . "' ORDER BY name ASC LIMIT 6;";

        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {

        ?>
          <div class="card h-48 w-52 bg-base-100 shadow-xl">
            <figure><img src="<?php echo $row['logo'] ?>" alt="<?php echo $row['name'] ?>" /></figure>
            <div class="card-body p-2 justify-center items-center">
              <a class="btn btn-ghost btn-xs" href='team.php?id=<?php echo $row["id"] ?>'><?php echo $row['name'] ?></a>
              <a class="badge badge-warning " href='favorite_delete.php?id=<?php echo $row["favorite_id"] ?>&return=teams.php'>favorito</a>
            </div>
          </div>
        <?php

        }
        ?>
      </div>
    </div>
    <div class="divider"></div>
    <div>
      <h2 class="text-xl font-semibold font-mono mb-4">Equipos</h2>
      <div class="flex flex-wrap gap-2 justify-center">
        <?php

        $sql = "SELECT * FROM `teams` WHERE id NOT IN (select f.id_team from favorite as f WHERE f.id_user = '" . $_SESSION['id'] . "');";

        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {

        ?>
          <div class="card h-48 w-52 bg-base-100 shadow-xl">
            <figure><img src="<?php echo $row['logo'] ?>" alt="<?php echo $row['name'] ?>" /></figure>
            <div class="card-body p-2 justify-center items-center">
              <a class="btn btn-ghost btn-xs" href='team.php?id=<?php echo $row["id"] ?>'><?php echo $row['name'] ?></a>
              <a class="badge badge-warning badge-outline hover:bg-amber-600 hover:text-amber-100" href='favorite_add.php?id=<?php echo $row["id"] ?>&return=teams.php'>favorito</a>
            </div>
          </div>
        <?php

        }
        ?>
      </div>


    </div>
  </div>
<?php endif; ?>



<?php
require_once "footer.php";
?>