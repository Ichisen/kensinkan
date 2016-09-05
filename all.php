<?php

include 'php/json.php';
include 'php/content.php';

$name = htmlspecialchars($_GET["name"]);
$title = htmlspecialchars($_GET["title"]);
$description = htmlspecialchars($_GET["description"]);

echo CONTENT::LoadSection($name, $title, $description);

?>