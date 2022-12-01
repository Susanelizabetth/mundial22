<?php
require_once "connection.php";
$activePage = basename($_SERVER['PHP_SELF'], ".php");
require_once "header.php";
?>
<div class="bg-red-700 py-5 px-10">
  <h1 class="text-base-100 font-semibold font-mono text-xl uppercase">Calendario de juegos</h1>
</div>
<div class="p-10">

  <div class="flex flex-col gap-2 justify-center">
    <!-- SELECT DISTINCT DATE(datetime) FROM games; -->
    <?php
    $query = "SELECT DISTINCT DATE(datetime) as 'date' FROM games";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
      $str_date = $row['date'];
      $date = date_create($row['date']);
    ?>
      <div>
        <h1 class="mb-4 font-semibold font-mono text-2xl">
          <?php echo date_format($date, 'd-M'); ?>
        </h1>
        <div class="flex justify-evenly">
          <?php
          $query2 = "SELECT t.name as 'team_name_a',t.logo as 'team_logo_a',t2.name as 'team_name_b',t2.logo as 'team_logo_b',g.gol_team_a,g.gol_team_b,g.datetime,g.id FROM `games` as g INNER JOIN teams as t on g.id_team_a=t.id INNER JOIN teams as t2 on g.id_team_b=t2.id WHERE DATE(g.datetime) = '$str_date' ORDER BY g.datetime;";
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
      <div class="divider"></div>
    <?php
    }
    ?>


  </div>


</div>
<?php
require_once "footer.php";
?>