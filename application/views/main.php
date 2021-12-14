<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../web/style/main.css">
    <title>Document</title>
    <link rel="stylesheet" href="../../../web/fonts/style.css">
</head>

<body>
<div class="container">
    <div class="left">
        <?php
        require("components/header.php");
        ?>
        <div class="subscription-box">
            <div class="subscription-form">
                <?php
                if ($success) {
                    require_once("components/success_box.php");
                } else {
                    require_once("components/subscription_box.php");
                }
                ?>
                <?php
                require("components/footer.php")
                ?>
            </div>
        </div>
    </div>
    <div class="right"></div>
</div>
<script src="../../../web/scripts/script.js"></script>
</body>

</html>