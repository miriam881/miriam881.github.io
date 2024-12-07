<?php
session_start();
session_destroy();
header("location:/plazos/vista/login/login.php");

?>