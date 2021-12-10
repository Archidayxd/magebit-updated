<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="../application/controllers/userController.php">
        <input type="email" required name="email">
        <button type="submit">Submit</button>
    </form>
    <form method="get">
        <input type="text" name="search" value="<?php
        echo $search;
        ?>">
        <button type="submit">Search</button>
    </form>
    <table>
        <?php
            echo "<tr>
                <th><a href='?search=$search&order=Id&sort=$sort'>Id</th>
                <th><a href='?search=$search&order=email&sort=$sort'>Email</a></th>
                <th><a href='?search=$search&order=time&sort=$sort'>Time</a></th>
                <th>Delete</th>
            </tr>";
    foreach ($emails as $key => $data){
        echo "<tr><td><input type='checkbox' name='xport[]' value='{$data['Id']}'>" . $data["Id"] . "</td><td>" . $data["email"] . "</td><td>" . $data["time"] . "</td><td> <a href='delete.php?id=$data[Id]'>Delete </a>" . "</tr>";
    }
    ?>
    </table>
</body>
</html>
