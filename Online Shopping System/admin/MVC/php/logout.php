<?php
session_start();
session_destroy();
header("Location: ../../../User/MVC/php/index.php");
exit();
?>
