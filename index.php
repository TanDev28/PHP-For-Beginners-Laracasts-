<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        display: grid;
        place-items: center;
        height: 100vh;
        margin: 0;
        font-family: sans-serif;
    }
    </style>
</head>

<body>

    <?php

    $name = "Lập trình PHP";
    $read = true;
    if ($read) {
        $message = "Tôi đã đọc cuốn $name";
    } else {
        $message = "Tôi CHƯA đọc cuốn $name";
    }

    ?>

    <h1>
        <!-- Không cần dấu chấm phẩy -->
        <?= $message ?>
    </h1>


</body>

</html>