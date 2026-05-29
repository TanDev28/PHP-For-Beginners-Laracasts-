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
    // $books = [
    //     "Số đỏ",
    //     "Nỗi buồn chiến tranh",
    //     "Tuổi thơ dữ dội"
    // ];
    // echo $books[2]; //Truy cập mảng chỉ số

    $books = [
        [
            'name' => 'Số đỏ',
            'author' => 'Vũ Trọng Phụng',
            'purchaseUrl' => 'https://vnexpress.net/'
        ],
        [
            'name' => 'Nỗi buồn chiến tranh',
            'author' => 'Bảo Ninh',
            'purchaseUrl' => 'https://vnexpress.net/'
        ]
    ];
    ?>

    <ul>
        <?php foreach ($books as $book) : ?>
        <a href="<?= $book['purchaseUrl'] ?>">
            <li>
                <?= $book['name'] ?>
            </li>
        </a>
        <?php endforeach; ?>
    </ul>


</body>

</html>