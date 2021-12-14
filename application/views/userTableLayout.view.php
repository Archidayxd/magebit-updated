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
<a href="/home">BACK</a>
<form method="get">
    <input type="text" name="search" value="<?php
    echo $search;
    ?>">
    <button type="submit">Search</button>
    <input type="hidden" name="domain" value="<?php echo $domain ?>">
</form>
<form action="/users">
    <button type="submit">Reset</button>
</form>
<form method="get" action="/users/download">
    <button type="submit">Download</button>
    <table>
        <?php
        echo
        "<tr><th><a href='?page=$page&search=$search&domain=$domain&order=Id&sort=$sort'>Id</th>
         <th><a href='?page=$page&search=$search&domain=$domain&order=email&sort=$sort'>Email</a></th>
         <th><a href='?page=$page&search=$search&domain=$domain&order=time&sort=$sort'>Time</a></th>
         <th>Delete</th></tr>";
        foreach ($emails as $key => $data) {
            echo
                "<tr><td><input type='checkbox' name='xport[]' value='{$data['Id']}'>" . $data["Id"] .
                "</td><td>" . $data["email"] . "</td><td>" . $data["time"] .
                "</td><td> <a href='/users/delete?Id=$data[Id]'>Delete </a>" . "</tr>";
        }

        foreach ($domains as $key => $value) {
            echo "<a href='?domain=$domains[$key]''>" . $domains[$key] . '</a>' . "&nbsp;";
        }
        ?>
    </table>
    <h3>Pages:</h3>
    <?php
    for ($i = 1; $i <= $total; $i++) {
        echo "<a href='?page=" . $i . "'" . "search=$search&domain=$domain&order=Id&sort=$sort";
        echo ">" . $i . "</a> ";
    }
    ?>
</form>
</body>
</html>
