<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentID = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note = $db->query("select * from notes where id = :id", [":id" => $_GET["id"]])->findOrFail();

    authorize($note["user_id"] === $currentID);

    $db->query("delete from notes where id = :id", [
        "id" => $_POST['id']
    ]);

    header('location: /notes');
    exit();
} else {
    $note = $db->query("select * from notes where id = :id", [":id" => $_GET["id"]])->findOrFail();

    authorize($note["user_id"] === $currentID);

    view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note
    ]);
}