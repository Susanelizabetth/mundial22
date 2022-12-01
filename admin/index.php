    <?php
    session_start();
    require_once "../connection.php";
    $show_invalid = 0;

    if (isset($_POST['but_submit'])) {

      $uname = mysqli_real_escape_string($conn, $_POST['username']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

      if ($uname != "" && $password != "") {

        $sql_query = "select count(*) as cntUser from users where username='" . $uname . "' and password='" . $password . "' and type=1";
        $result = mysqli_query($conn, $sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if ($count > 0) {
          $_SESSION['uname'] = $uname;
          $show_invalid = 0;
          header('Location: home_admin.php');
        } else {
          $show_invalid = 1;
        }
      }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="style.css" rel="stylesheet">
      <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>

      <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-lg text-center">
          <h1 class="text-2xl font-bold sm:text-3xl">Bienvenido al portal admin!</h1>

          <p class="mt-4 text-gray-500">
            Este portal es solo para usuarios administradores! Les permitira agregar, editar, ver y eliminar datos de nuestra base de datos
          </p>
        </div>

        <form method="post" class="mx-auto mt-8 mb-0 max-w-md space-y-4">
          <div>
            <label for="username" class="sr-only">Username</label>

            <div class="relative">
              <input type="username" class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm" placeholder="Enter username" name="username" />

              <span class="absolute inset-y-0 right-4 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                </svg>
              </span>
            </div>
          </div>

          <div>
            <label for="password" class="sr-only">Password</label>
            <div class="relative">
              <input type="password" class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm" placeholder="Enter password" name="password" />

              <span class="absolute inset-y-0 right-4 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
              </span>
            </div>
          </div>

          <div class="flex items-center justify-center">

            <button type="submit" value="Submit" name="but_submit" id="but_submit" class="ml-3 inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
              Log In
            </button>
          </div>
          <?php
          if ($show_invalid == 1) {
          ?>
            <div role="alert" class="rounded border-l-4 border-red-500 bg-red-50 p-4">
              <strong class="block font-medium text-red-700"> Algo salió mal </strong>

              <p class="mt-2 text-sm text-red-700">
                Revisa que tu usuario y contraseña son los correctos. De ser correctos, puede que tu cuenta no este autorizada para entrar al portal admin
              </p>
            </div>
          <?php
          } else {
            echo "";
          }

          ?>

        </form>

      </div>

    </body>

    </html>