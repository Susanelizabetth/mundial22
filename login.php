    <?php
    session_start();
    require_once "connection.php";
    $show_invalid = 0;

    if (isset($_POST['init_dash'])) {
      $uname =  $_POST['username'];
      $password =  $_POST['password'];

      $sql_query = "SELECT id FROM users where username='$uname' and password='$password'";
      $succ = mysqli_query($conn, $sql_query);

      if (mysqli_num_rows($succ) > 0) {
        $user_data = mysqli_fetch_array($succ);
        $_SESSION['user'] = $uname;
        $_SESSION['id'] = $user_data['id'];
        $show_invalid = 0;
        header('Location: index.php');
      } else {
        $show_invalid = 1;
      }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login</title>
      <link href="style.css" rel="stylesheet">
      <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>

      <section class="relative flex flex-wrap lg:h-screen lg:items-center">
        <div class="w-full px-4 py-12 sm:px-6 sm:py-16 lg:w-1/2 lg:px-8 lg:py-24">
          <div class="mx-auto max-w-lg text-center">
            <h1 class="text-2xl font-bold sm:text-3xl">Empiece hoy!</h1>

            <p class="mt-4 text-gray-500">
              Podras disfrutar de nuestras opciones y noticias y mas sobre Copa Mundial de la FIFA Catar 2022™ !
            </p>
          </div>

          <form method="post" class="mx-auto mt-8 mb-0 max-w-md space-y-4">
            <div>
              <label for="username" class="sr-only">username</label>

              <div class="relative">
                <input type="text" name="username" class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm" placeholder="Enter username" required />

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
                <input type="password" class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm" placeholder="Enter password" name="password" required />

                <span class="absolute inset-y-0 right-4 inline-flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                </span>
              </div>
            </div>

            <div class="flex items-center justify-between">
              <p class="text-sm text-gray-500">
                No tienes una cuenta?
                <a href="create_account.php" class="underline">Crear Cuenta</a>
              </p>

              <button type="submit" name="init_dash" class="ml-3 inline-block rounded-lg bg-violet-700 hover:bg-violet-800 px-5 py-3 text-sm font-medium text-white">
                Iniciar Sesión
              </button>
            </div>
          </form>
          <?php
          if ($show_invalid == 1) {
          ?>
            <div role="alert" class="rounded border-l-4 border-red-500 bg-red-50 p-4">
              <strong class="block font-medium text-red-700"> Algo salió mal </strong>

              <p class="mt-2 text-sm text-red-700">
                Revisa que tu usuario y contraseña son los correctos. O crea una cuenta
              </p>
            </div>
          <?php
          } else {
            echo "";
          }

          ?>
        </div>

        <div class="relative h-64 w-full sm:h-96 lg:h-full lg:w-1/2">
          <img alt="Welcome" src="https://pbs.twimg.com/media/FhmftiNWYAAsTLJ?format=png&name=900x900" class="absolute inset-0 h-full w-full object-cover" />
        </div>
      </section>

    </body>

    </html>