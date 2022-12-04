<?php
require_once "connection.php";
$activePage = basename($_SERVER['PHP_SELF'], ".php");
require_once "header.php";
?>
<div class="bg-red-700 py-5 px-10">
  <h1 class="text-base-100 font-semibold font-mono text-xl uppercase">Tabla de posiciones</h1>
</div>
<div class="p-10">

  <div class="flex flex-wrap gap-2 justify-around">
    <?php

    $sql = "SELECT * FROM `groups`;";

    $result = mysqli_query($conn, $sql);


    while ($row = mysqli_fetch_array($result)) {
    ?>
      <div class="card w-2/5 bg-base-100 shadow-xl">
        <div class="card-body">
          <h2 class="card-title"><?php echo $row['name']  ?></h2>
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
              <?php
              $sql2 = "SELECT name,logo,gw,gd,gl,gf,gc,dg,gw+gd+gl as 'pj' ,(gw*3)+(gd*1)+(gl*0) as 'puntos' FROM `teams` WHERE `id_group` = '" . $row['id'] . "' ORDER BY puntos DESC;";
              $result2 = mysqli_query($conn, $sql2);
              while ($row2 = mysqli_fetch_array($result2)) {
              ?>
                <tr>
                  <td>
                    <div class="flex gap-2 items-center">
                      <img class="h-4" src="<?php echo $row2['logo'] ?>" alt="<?php echo $row2['name'] ?>">
                      <?php echo $row2['name'] ?>

                    </div>

                  </td>
                  <td><?php echo $row2['pj'] ?></td>
                  <td><?php echo $row2['gw'] ?></td>
                  <td><?php echo $row2['gd'] ?></td>
                  <td><?php echo $row2['gl'] ?></td>
                  <td><?php echo $row2['gf'] ?></td>
                  <td><?php echo $row2['gc'] ?></td>
                  <td><?php echo $row2['dg'] ?></td>
                  <td><?php echo $row2['puntos'] ?></td>

                </tr>
              <?php
              }

              ?>




            </tbody>
          </table>

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