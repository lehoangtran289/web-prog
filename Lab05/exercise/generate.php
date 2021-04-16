<?php
require_once "./page.php";

$title = $_POST["title"];
$year = $_POST["year"];
$copyright = $_POST["copyright"];
$content = $_POST["content"];

$page = NULL;


$page = new Page($title, $year, $copyright);

$page->addContent($content);
echo $page->get();