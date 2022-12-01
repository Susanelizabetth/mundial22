<?php
session_start();
if (!isset($_SESSION['user'])) {
  $_SESSION['user'] = '';
}


?>
<!DOCTYPE html>
<html lang="en" data-theme="autumn">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mundial 2022</title>
  <link href="style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.42.1/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<script>
  function get_mode() {
    if (document.getElementById("mode_page").checked) {
      document.documentElement.setAttribute('data-theme', 'business');
    } else {
      document.documentElement.setAttribute('data-theme', 'autumn');
    }
  }
</script>

<body>
  <header aria-label="Site Header" class="border-b border-gray-100">
    <div class="mx-auto flex h-16 max-w-screen-2xl items-center justify-between sm:px-6 lg:px-8">
      <div class="flex items-center">
        <button type="button" class="p-2 sm:mr-4 lg:hidden">
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>

        <a href="index.php" class="flex">
          <img class="h-8" src="img/Logo_de_la_Copa_Mundial_de_fútbol_2022.svg.png" alt="">
        </a>
      </div>

      <div class="flex flex-1 items-center justify-end">
        <nav aria-label="Site Nav" class="hidden lg:flex lg:gap-4 lg:text-xs lg:font-bold lg:uppercase lg:tracking-wide lg:text-gray-500">
          <a href="index.php" class="block h-16 border-b-4 border-transparent leading-[4rem] hover:border-current hover:text-red-700 <?= ($activePage == 'index') ? 'border-current text-red-700' : ''; ?>">
            Inicio
          </a>
          <a href="teams.php" class="block h-16 border-b-4 border-transparent leading-[4rem] hover:border-current hover:text-red-700 <?= ($activePage == 'teams') ? 'border-current text-red-700' : ''; ?>">
            Equipos
          </a>

          <a href="games.php" class="block h-16 border-b-4 border-transparent leading-[4rem] hover:border-current hover:text-red-700 <?= ($activePage == 'games') ? 'border-current text-red-700' : ''; ?>">
            Juegos
          </a>

          <a href="results.php" class="block h-16 border-b-4 border-transparent leading-[4rem] hover:border-current hover:text-red-700  <?= ($activePage == 'results') ? 'border-current text-red-700' : ''; ?>">
            Resultados
          </a>

          <a href="/contact" class="block h-16 border-b-4 border-transparent leading-[4rem] hover:border-current hover:text-red-700">
            Contact
          </a>
        </nav>

        <div class="ml-8 flex items-center">
          <?php if ($_SESSION['user'] == '') : ?>
            <a href="login.php" class="hidden lg:block h-16 border-b-4 border-transparent leading-[4rem] hover:border-current hover:text-red-700">
              Iniciar sesión
            </a>
          <?php else : ?>

            <div class="flex items-center divide-x divide-gray-100 border-x border-gray-100">


              <span>
                <a href="account.php" class="block border-b-4 border-transparent p-6 hover:border-red-700 <?= ($activePage == 'account') ? 'border-current border-red-700 text-red-700' : ''; ?>"">
                  <svg class=" h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>

                  <span class="sr-only"> Account </span>
                </a>
              </span>



            </div>
          <?php endif; ?>
          <label class="swap swap-rotate p-6">

            <!-- this hidden checkbox controls the state -->
            <input type="checkbox" name="mode_page" id="mode_page" onchange="get_mode()" />


            <!-- sun icon -->
            <svg class="swap-on fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
            </svg>

            <!-- moon icon -->
            <svg class="swap-off fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
            </svg>

          </label>
        </div>

      </div>
    </div>
  </header>