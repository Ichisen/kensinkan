<?php

include '../data/php/json.php';
include '../data/php/content.php';

$blogHTML = file_get_contents('../data/content/blog.html');

$newsHTML = file_get_contents('../data/content/news/content.html');
$blogHTML = str_replace('%$newsHTML%', $newsHTML, $blogHTML);


$blogHTML = str_replace('%$articleHTML%', CONTENT::LoadHTML('article', 3), $blogHTML);
$articleURL = '../articles';
$blogHTML = str_replace('%$articleURL%', $articleURL, $blogHTML);


$blogHTML = str_replace('%$historyHTML%', CONTENT::LoadHTML('history', 3), $blogHTML);
$historyURL = '../history';
$blogHTML = str_replace('%$historyURL%', $historyURL, $blogHTML);

echo $blogHTML;

?>