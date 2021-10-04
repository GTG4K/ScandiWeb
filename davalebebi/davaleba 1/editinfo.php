<?php 
    include "db.php";

    if (!isset($_POST["user_id"]))
    {
        die("user not found");
    }

    $user_id = $_POST['user_id'];

    $sql = "SELECT * FROM `users` WHERE `id` = $user_id";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
    margin: auto;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }

    </style>
</head>
<body>
<table>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>surname</th>
        <th>birthday</th>
        <th>register_at</th>
        <th>action</th>
    </tr>
    <form method = "POST" action="edit.php">
    <tr>
        <td><p>ID</p></td>
        <td><input type="text" name="name" placeholder="name" value="<?php echo $row['name']?>"></td>
        <td><input type="text" name="surname" placeholder="surname" value="<?php echo $row['surname']?>"></td>
        <td><input type="DATE" name="birthday" value="<?php echo $row['birthday']?>"></td>
        <td><p>registration date</p></td>
        <td><button>UPDATE ENTRY</button></td>
        <input type="hidden" name="user_id" value="<?php echo $row['id']?>">
    </tr>
    </form>
</table>
  
</body>
</html>