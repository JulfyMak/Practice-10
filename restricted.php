<?php
session_start();
if($_SESSION['auth'] == true) 
{
    $log = $_SESSION['login'];
    $output ="
    <html>
    <head>
    <title>User</title>
    </head>
    <body>
    <h1> Hello, $log! You are welcome! </h1>
    <h3>Look at your recent shot!  </h3>
    ";
    $output.="</body></html>";
    echo $output;
    echo "<img src='https://photographers.ua/thumbnails/pictures/4328/800x_isa2613f-ua-7.jpg' height='470'>";
}

else
{  
    $output ="
    <html>
    <head>
    <title>User</title>
    </head>
    <body>
    <h1> Invalid login or password.  </h1>
    <h3> Try again!  </h3>
    <h2> <a href='login.php'> Sign In</a> </h2>
    ";
    $output.="</body></html>"; 
    echo $output;
}
echo '<body align = "center" style="background-color:#E0FFFF;padding:30px;">'; 
?>