<?php
require(dirname(__DIR__) . '/vendor/autoload.php');

// Fetch URLs from CSV
$urls = file('urls.csv', FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);

// Find invalid urls
$scanner = new \Oreilly\ModernPHP\Url\Scanner($urls);
$invalidUrls = $scanner->getInvalidUrls();

// Do something with invalid urls
print_r($invalidUrls);
