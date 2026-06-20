<?php

// Chặn không cho người dùng đăng ký tiếp (sửa link trên url - truy cập thủ công) nếu đang ở trạng thái đăng nhập rồi
// Tuy nhiên nhược điểm là lặp code ở nhiều nơi, vì thể phải sử dụng middleware
// if ($_SESSION['user'] ?? false) {
//     header('location: /');
//     exit();
// }

view('/registration/create.view.php');