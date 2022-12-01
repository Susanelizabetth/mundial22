<?php
require_once "../connection.php";
$activePage = basename($_SERVER['PHP_SELF'], ".php");
require_once "header.php";
?>

<div class="flex justify-between mb-2">
  <h1 class=" font-bold text-xl self-center">Tabla de grupos</h1>
  <a name="insert" id='insert' class="inline-block rounded border border-emerald-700 bg-emerald-700 px-5 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-emerald-700 focus:outline-none focus:ring active:text-emerald-700" href="group_insert.php">
    Ingresar grupo
  </a>

</div>

<div class="overflow-x-auto border border-gray-200">
  <table class="min-w-full divide-y divide-gray-200 text-sm">
    <thead class="bg-gray-100">
      <tr>
        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
          id
        </th>
        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
          Name
        </th>
        <th>
        </th>
        <th>
        </th>

      </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
      <?php

      $sql = "SELECT * FROM `groups`;";
      $result = mysqli_query($conn, $sql);
      if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      } else {
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $nombre = $row['name'];

      ?>
          <tr>

            <td class='whitespace-nowrap px-4 py-2 text-gray-700'><?php echo $id ?></td>
            <td class='whitespace-nowrap px-4 py-2 text-gray-700'><?php echo $nombre ?></td>
            <td class='whitespace-nowrap px-4 py-2 text-gray-700'><a href='group_update.php?id=<?php echo $row["id"] ?>' class='inline-block rounded border border-indigo-600 bg-indigo-600 px-2 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500'><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg></a></td>
            <td class='whitespace-nowrap px-4 py-2 text-gray-700'><a href='group_delete.php?id=<?php echo $row["id"] ?>' class='inline-block rounded border border-rose-600 bg-rose-600 px-2 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-rose-600 focus:outline-none focus:ring active:text-rose-500'><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg></a></td>


          </tr>
      <?php
        }
      }
      ?>
    </tbody>
  </table>
</div>

<!-- ==================================== FIN ==================================== -->
</div>
</body>

</html>