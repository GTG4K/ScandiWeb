<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dav1_users";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
{
    echo $conn->connect_error;
}
?>