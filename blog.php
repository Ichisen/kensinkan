<?php

include 'php/json.php';
include 'php/content.php';

$blogHTML = file_get_contents('content/blog.html');

$newsHTML = file_get_contents('content/news/content.html');
$blogHTML = str_replace('%$newsHTML%', $newsHTML, $blogHTML);


$blogHTML = str_replace('%$articleHTML%', CONTENT::LoadHTML('article', 3), $blogHTML);
$articleURL = 'all.php?name=article';
$blogHTML = str_replace('%$articleURL%', $articleURL, $blogHTML);


$blogHTML = str_replace('%$historyHTML%', CONTENT::LoadHTML('history', 3), $blogHTML);
$historyURL = 'all.php?name=history';
$blogHTML = str_replace('%$historyURL%', $historyURL, $blogHTML);

echo $blogHTML;

?>