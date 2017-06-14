<?php

include '../data/php/json.php';
include '../data/php/content.php';

$allHTML = file_get_contents('../data/content/news.html');
$contentHTML = file_get_contents('../data/content/news/content.html');

$allHTML = str_replace('%$allHTML%', $contentHTML, $allHTML);

echo $allHTML;

?>