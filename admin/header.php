<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin</title>
  <link href="style.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <header aria-label="Site Header" class="bg-white">
    <div class="mx-auto flex h-16 max-w-screen-xl items-center gap-8 px-4 sm:px-6 lg:px-8">
      <a class="block text-teal-600" href="home_admin.php">
        <span class="sr-only">Home</span>
        <img class="h-8" src="../img/Logo_de_la_Copa_Mundial_de_fútbol_2022.svg.png" alt="">
      </a>

      <div class="flex flex-1 items-center justify-end md:justify-between">
        <nav aria-label="Site Nav" class="hidden md:block">
          <ul class="flex items-center gap-6 text-sm">
            <li>
              <a class="text-gray-500 transition hover:text-gray-500/75 <?= ($activePage == 'teams') ? 'font-bold text-black' : ''; ?>" href="teams.php">
                Equipos
              </a>
            </li>

            <li>
              <a class="text-gray-500 transition hover:text-gray-500/75  <?= ($activePage == 'players') ? 'font-bold text-black' : ''; ?>" href="players.php">
                Jugadores
              </a>
            </li>

            <li>
              <a class="text-gray-500 transition hover:text-gray-500/75 <?= ($activePage == 'groups') ? 'font-bold text-black' : ''; ?>" href=" groups.php">
                Grupos
              </a>
            </li>

            <li>
              <a class="text-gray-500 transition hover:text-gray-500/75 <?= ($activePage == 'games') ? 'font-bold text-black' : ''; ?>" href="games.php">
                Juegos
              </a>
            </li>

            <li>
              <a class="text-gray-500 transition hover:text-gray-500/75 <?= ($activePage == 'users') ? 'font-bold text-black' : ''; ?>" href="users.php">
                Usuarios
              </a>
            </li>


          </ul>
        </nav>

        <div class="flex items-center gap-4">
          <div class="sm:flex sm:gap-4">
            <a class="block rounded-md bg-rose-700 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-rose-800" href="logout.php">
              Logout
            </a>



          </div>


        </div>
      </div>
    </div>
  </header>
  <div class="px-24 mb-10">