<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["email"]);
unset($_SESSION["name"]);
unset($_SESSION['user_type']);
header("Location:../index.php");
