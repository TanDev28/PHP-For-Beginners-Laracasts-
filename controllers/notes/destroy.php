<?php

use Core\App;
use Core\Database;

// $config = require base_path("config.php");
// $db = new Database($config["database"]);

// $db = App::container()->resolve('Core\Database'); // Cách này và cách dưới giống nhau, nên ưu tiên cách dưới
// $db = App::container()->resolve(\Core\Database::class); // Cách 1

$db = App::resolve(Database::class); // Cách 2, nâng cấp hơn, gọn hơn

$currentID = 1;

$note = $db->query("select * from notes where id = :id", [":id" => $_GET["id"]])->findOrFail();

authorize($note["user_id"] === $currentID);

$db->query("delete from notes where id = :id", [
    "id" => $_POST['id']
]);

header('location: /notes');
exit();