<?php

require_once "connection.php";
$activePage = basename($_SERVER['PHP_SELF'], ".php");
require_once "header.php";

$id = $_SESSION['id'];
$sql = "SELECT * FROM `users` WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if (isset($_POST['update_user'])) {
  $name = $_POST['name'];
  $last_name = $_POST['last_name'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "UPDATE users SET name='$name', last_name='$last_name',username='$username',password='$password' WHERE id = '$id'";

  if (mysqli_query($conn, $query)) {
?>
    <div class="alert alert-success shadow-lg">
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>Tu cuenta ha sido editada exitosamente!</span>
      </div>
    </div>
<?php

  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

?>
<div class="p-10">
  <form method="post" class="space-y-4 mb-4">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
      <div>
        <label for="name" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
          <span class="text-xs font-medium text-gray-700"> Nombre </span>

          <input type="text" id="name" placeholder="Nombre" name="name" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" value="<?php echo $row['name'] ?>" />
        </label>
      </div>

      <div>
        <label for="last_name" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
          <span class="text-xs font-medium text-gray-700"> Apellido </span>

          <input type="text" id="last_name" placeholder="Apellido" name="last_name" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" value="<?php echo $row['last_name'] ?>" />
        </label>
      </div>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
      <div>
        <label for="username" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
          <span class="text-xs font-medium text-gray-700"> Nombre de usuario </span>

          <input type="text" id="username" placeholder=" Nombre de usuario" name="username" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" value="<?php echo $row['username'] ?>" />
        </label>
      </div>

      <div>
        <label for="password" class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
          <span class="text-xs font-medium text-gray-700"> Contraseña </span>

          <input type="text" id="password" placeholder="Contraseña" name="password" class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" value="<?php echo $row['password'] ?>" />
        </label>
      </div>
    </div>

    <div class="mt-4 flex justify-between">
      <button type="submit" class="inline-flex w-full items-center justify-center rounded-lg bg-black px-5 py-2 text-white sm:w-auto" name="update_user">
        <span class="font-medium"> Guardar Usuario </span>

        <svg xmlns="http://www.w3.org/2000/svg" class="ml-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
        </svg>
      </button>
    </div>
  </form>


  <div class="py-10">
    <div class="flex justify-between mb-4">
      <h2 class="text-xl font-semibold font-mono"> Equipos Favoritos</h2>
      <a class="btn btn-ghost btn-sm" href="teams.php">ver todos</a>
    </div>
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

            <a class="badge badge-warning " href='favorite_delete.php?id=<?php echo $row["favorite_id"] ?>&return=account.php'>favorito</a>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>

  <div class="">
    <a href="logout.php" class="btn btn-outline btn-error btn-s">log out</a>
  </div>

</div>
<?php
require_once "footer.php";
?>