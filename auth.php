<?php
session_start();
$_SESSION['auth'] = false;

$login = $_POST['login'];
$password = md5($_POST['password']);

$servername = "localhost";
$username = "root";
$password = "";
$database = "testdb"; //повинна бути створена в субд

// Встановлення з'єднання 
$conn = new mysqli($servername, $username, $password, $database);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    //require_once 'connection.php';
    if (count($_POST)>0) {
		//potential sql injection, 
		$res = mysqli_query($conn, "SELECT * FROM `testdb` WHERE `login`= '".mysqli_real_escape_string($conn, $_POST['login'])."' and `password`='".mysqli_real_escape_string($conn, $_POST['password'])."'");
        if (!$res) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }
        $row = mysqli_fetch_array($res);
		if (is_array($row)){
			$_SESSION['password'] = $row['password'];
            $_SESSION['login'] = $row['login'];
            $_SESSION['auth'] = true;
            header('Location: restricted.php');
        }
        else {
            $_SESSION['message'] = 'Не верный логин или пароль';
            header('Location: login.php');
           }
          
    }

/*
    $login = $_POST['login'];
    $password = md5($_POST['password']);
   
    $check_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "first_name" => $user['first_name'],
            "last_name" => $user['last_name'],
            "login" => $user['login'],
            "password" => $user['password'],
            "id_role" => $user['id_role']
        ];
        $_SESSION['auth'] = true;
        header('Location: restricted.php');

    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: login.php');
    }
*/
?>