<?php
session_start();
//on détruit la session en cours
session_destroy();
header('Location: auth.php');
exit;
?>