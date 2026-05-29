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
        [
            'name' => 'Số đỏ',
            'author' => 'Vũ Trọng Phụng',
            'releaseYear' => 1936,
            'purchaseUrl' => 'https://vnexpress.net/'
        ],
        [
            'name' => 'Nỗi buồn chiến tranh',
            'author' => 'Bảo Ninh',
            'releaseYear' => 1990,
            'purchaseUrl' => 'https://vnexpress.net/'
        ],
        [
            'name' => 'Tuổi thơ dữ dội',
            'author' => 'Phùng Quán',
            'releaseYear' => 1988,
            'purchaseUrl' => 'https://vnexpress.net/'
        ]
    ];

    $filterByAuthor = function ($books, $author) {
        $filteredBooks = [];

        foreach ($books as $book) {
            if ($book['author'] === $author) {
                $filteredBooks[] = $book;
            }
        }

        return $filteredBooks;
    };

    $filteredBooks = $filterByAuthor($books, "Bảo Ninh");
    ?>

    <ul>
        <?php foreach ($filteredBooks as $book) : ?>
        <a href="<?= $book['purchaseUrl'] ?>">
            <li>
                <?= $book['name'] ?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
            </li>
        </a>
        <?php endforeach; ?>
    </ul>

</body>

</html>