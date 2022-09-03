<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "lcl_banques";


$con = mysqli_connect($server, $username, $password, $database);
if(!$conn){
  echo "<script>alert('Connection echoue')</script>";
}

?>