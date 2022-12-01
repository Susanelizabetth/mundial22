<?php

require_once "connection.php";
$activePage = basename($_SERVER['PHP_SELF'], ".php");
require_once "header.php";
?>
<div class="p-10">
  <a href="logout.php" class="btn btn-outline btn-error btn-s">log out</a>
</div>
<?php
require_once "footer.php";
?>