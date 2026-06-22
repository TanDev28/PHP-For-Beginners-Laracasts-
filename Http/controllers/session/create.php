<?php

use Core\Session;

view('session/create.view.php', [
    'errors' => Session::get('errors') // Không lấy được vì làm gì có key = errors nào, phải cập nhật tiếp phương thức get của Session
]);