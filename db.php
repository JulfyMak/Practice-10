<?php
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
echo "Connected successfully";
$sql = "SELECT id, first_name, last_name, login, password, id_role FROM testdb";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    echo '<table border="2" cellpadding="5"  align ="center" width="60%" height="40%">';
    echo '<tr> 
        <td> ID </td> 
        <td> First name </td> 
        <td> Last name </td> 
        <td> Login </td> 
        <td> Password </td> 
        <td> Id Role </td> 
        </tr>';    
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";

        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["first_name"] . "</td>";
        echo "<td>" . $row["last_name"] . "</td>";
        echo "<td>" . $row["login"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td>" . $row["id_role"] . "</td>";

        echo "</tr>";
    }
    
    echo '</table>';
} else {
    echo "No results";
}


?>
