<?php 
    include "db.php";

    if (!isset($_POST["user_id"],$_POST["name"],$_POST["surname"],$_POST["birthday"]))
    {
        die("user not found");
    }

    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthday = $_POST['birthday'];

    $sql = "UPDATE `users` 
            SET `name`='$name',`surname`='$surname',`birthday`='$birthday' 
            WHERE `id` = $user_id";

    if($conn->query($sql)===TRUE){
        header('Location:index.php');
    }

?>