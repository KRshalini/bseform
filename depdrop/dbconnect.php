<?php
$dbhost= "localhost";
$dbUser = "root";
$dbPass ="";
$dbname="details";
$db = new mysqli($dbhost,$dbUser,$dbPass,$dbname);
if($db->connect_error){
    die("connection fail" . $db->connect_error);
}else{
  // echo "Succesfully Connected";
}
?>