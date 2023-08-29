<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: ../login.php");
    exit;
}

echo "Bienvenido " . $_SESSION['username'] . " a la zona privada!";

