<?php
session_start();
session_destroy();
header('Location: ../index.php');
echo "<script>alert('Sessão encerrada')</script>";
exit();