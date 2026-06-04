<?php

$config = require "config.php";
$db = new Database($config["database"]);

$heading = "My Notes";
$currentID = 1;

$note = $db->query("select * from notes where id = :id", [":id" => $_GET["id"]])->findOrFail();

authorize($note["user_id"] === $currentID);

require "views/note.view.php";