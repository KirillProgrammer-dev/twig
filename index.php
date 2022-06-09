<?php

require_once __DIR__ . '/bootstrap.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$logger = new Logger('main');
$logger->pushHandler(new StreamHandler(__DIR__ . '/logs/app.log', Logger::DEBUG));

class First{
  public function writeText(){
    return "Class 1";
  }
  public function wholeText(){
    return "Text of 1 class which will be in others";
  }
}

class Second extends First{
  public function writeText(){
    return "Class 2";
  }
}

class Third extends Second{
  public function writeText(){
    return "Class 3";
  }
}
$info = [
  ['name' => new First()->writeText()],
  ['name' => 'Second item'],
  ['name' => 'Third item'],
];

// Render our view
echo $twig->render('index.html.twig', ['info' => $info]);
$logger->info('New http request');
$logger->info('index.php');
