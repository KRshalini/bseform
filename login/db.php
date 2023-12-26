<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn) {
 // echo "Connection Success";
}else{
    echo "Connection failed .mysqli_connect_error";
}

?>