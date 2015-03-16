<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['count']);
unset($_SESSION['isValid']);
unset($_SESSION['pass']);
session_destroy();
header('Location: ../Final/FinalProjLogin.html');
?>
