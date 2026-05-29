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

$filteredBooks = array_filter($books, function ($book) {
    return $book['releaseYear'] < 1990;
});

require "index.view.php";