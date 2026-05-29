<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>

    <h1>Các cuốn sách văn học</h1>

    <?php
    $books = [
        "Số đỏ",
        "Nỗi buồn chiến tranh",
        "Tuổi thơ dữ dội"
    ];
    ?>

    <h2>Cách 1</h2>
    <!-- Cách 1 -->
    <ul>
        <?php
        foreach ($books as $book) {
            echo "<li>$book</li>";
            // echo "<li>{$book}TM</li>"; //Dùng `{}` để cô lập biến khi nối thêm text.
        }
        ?>
    </ul>

    <h2>Cách 2</h2>
    <!-- Cách 2 -->
    <ul>
        <?php foreach ($books as $book) : ?>
        <li><?= $book ?></li>
        <?php endforeach; ?>
    </ul>

</body>

</html>