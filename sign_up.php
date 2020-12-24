<?php

session_start();
require_once 'connection.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$login = $_POST['login'];
$password = $_POST['password'];

$check_login = mysqli_query($conn, "SELECT * FROM `testdb` WHERE `login` = '$login'");


mysqli_query($conn, "INSERT INTO `testdb` (`id`, `first_name`, `last_name`, `password`, `login`, `id_role` ) VALUES (NULL, '$first_name','$last_name', '$password', '$login', 1)");

$_SESSION['message'] = 'Регистрация прошла успешно!';
header('Location: login.php');

?>
