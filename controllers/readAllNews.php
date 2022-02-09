<?php
include_once('config.php');
include_once('models/news.php');

$listNews = new News;
$news = $listNews->readAllNews();