<?php 
    include "db.php";
    $sql = "SELECT * FROM `users`";
    $result = $conn->query($sql);
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

    button{
      border-radius: 3px;
      width: 100%;
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
  <?php while ($row = $result->fetch_assoc()) :?>
  <tr>
    <td><?php echo $row['id'] ?></td>
    <td><?php echo $row['name']?></td>
    <td><?php echo $row['surname']?></td>
    <td><?php echo $row['birthday']?></td>
    <td><?php echo $row['register_at']?></td>
    <td>
        <form method="POST" action="delete.php">
            <input type="hidden" name="user_id" value="<?php echo $row['id']?>">
            <button>DELETE</button>
        </form>
        <form method="POST" action="editinfo.php">
            <input type="hidden" name="user_id" value="<?php echo $row['id']?>">
            <button>EDIT</button>
        </form>
    </td>
  </tr>
  <?php endwhile?>
  <form method="POST" action="add.php">
    <tr>
    <td><p>ID</p></td>
    <td><input type="text" name="name" placeholder="name"></td>
    <td><input type="text" name="surname" placeholder="surname"></td>
    <td><input type="DATE" name="birthday"></td>
    <td><p>registration date</p></td>
    <td><button>ADD ENTRY</button></td>
    <tr>
  </form>
</table>
</body>
</html>