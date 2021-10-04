<?php 
    include "db.php";
    
    if(!isset($_POST['name'],$_POST['surname'],$_POST['birthday']))
    {
        die("error has occured while fetching data");
    }

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthday = $_POST['birthday'];

    $sql = "INSERT INTO `users`(`name`, `surname`, `birthday`) 
            VALUES ('$name','$surname','$birthday')";

    if ($conn->query($sql) === true){
        echo "entry added";
    }
?>