<?php
require_once "connection.php";
$show_invalid = 0;
if (isset($_POST['insert_user'])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];

  $uname =  $_POST['username'];
  $password =  $_POST['password'];

  $sql_query = "INSERT INTO users (name,last_name,username,password,type) VALUES ('$first_name','$last_name','$uname','$password','0')";

  if (mysqli_query($conn, $sql_query)) {
    header('Location: login.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sing up</title>
  <link href="style.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <!--
  This component uses @tailwindcss/forms

  yarn add @tailwindcss/forms
  npm install @tailwindcss/forms

  plugins: [require('@tailwindcss/forms')]
-->

  <section class="bg-white">
    <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
      <section class="relative flex h-32 items-end bg-gray-900 lg:col-span-5 lg:h-full xl:col-span-6">
        <img alt="Night" src="https://media.admagazine.com/photos/62fea299fb331739724e0990/16:9/w_2560%2Cc_limit/Ahmad%2520Bin%2520Ali%2520Stadium%2520(5).jpg" class="absolute inset-0 h-full w-full object-cover opacity-80" />

        <div class="hidden lg:relative lg:block lg:p-12">
          <a class="block text-white" href="/">
            <span class="sr-only">Home</span>

          </a>

          <h2 class="mt-6 text-2xl font-bold text-white sm:text-3xl md:text-4xl">
            Bienvenido a Copa Mundial de la FIFA Catar 2022™
          </h2>

          <p class="mt-4 leading-relaxed text-white/90">
            Al registrarte podras obtener la información necesria de este mundial de tus equipos favoritos
          </p>
        </div>
      </section>

      <main aria-label="Main" class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:py-12 lg:px-16 xl:col-span-6">
        <div class="max-w-xl lg:max-w-3xl">

          <form method="post" class="mt-8 grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
              <label for="FirstName" class="block text-sm font-medium text-gray-700">
                First Name
              </label>

              <input type="text" id="FirstName" name="first_name" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="LastName" class="block text-sm font-medium text-gray-700">
                Last Name
              </label>

              <input type="text" id="LastName" name="last_name" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="username" class="block text-sm font-medium text-gray-700">
                Username
              </label>

              <input type="text" id="username" name="username" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="password" class="block text-sm font-medium text-gray-700">
                Password
              </label>

              <input type="password" id="password" name="password" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
            </div>



            <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
              <button type="submit" name="insert_user" class="inline-block shrink-0 rounded-md border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500">
                Create an account
              </button>

              <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                Already have an account?
                <a href="login.php" class="text-gray-700 underline">Log in</a>.
              </p>
            </div>
          </form>
        </div>
      </main>
    </div>
  </section>

</body>

</html>