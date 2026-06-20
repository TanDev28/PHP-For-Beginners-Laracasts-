<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentID = 1;
$note = $db->query("select * from notes where id = :id", [":id" => $_GET["id"]])->findOrFail();

authorize($note["user_id"] === $currentID);

view("notes/edit.view.php", [
    'heading' => 'Edit Notes',
    'errors' => [],
    'note' => $note
]);