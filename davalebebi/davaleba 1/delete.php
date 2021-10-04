<?php 
    include "db.php";
    
    if (!isset($_POST["user_id"]))
    {
        die("user not found");
    }

    $user_id = $_POST['user_id'];

    $sql = "DELETE FROM `users` WHERE `id` = $user_id";

    if ($conn->query($sql) === TRUE){
        echo "user deleted ggwp";
    }
?>