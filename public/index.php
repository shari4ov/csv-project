<?php

declare(strict_types = 1);

$root = dirname(__DIR__).DIRECTORY_SEPARATOR;
// echo ($root)."<br>";
define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

/* YOUR CODE (Instructions in README.md) */

require APP_PATH."App.php";
require APP_PATH."Helpers.php";
$files=getTransactionFiles(FILES_PATH);

$transactions=[];

foreach($files as $file){
       $transactions=array_merge($transactions,getTransactions($file,'extractTransaction'));
}
$totals=calculateTotals($transactions);

// var_dump($transactions);
require VIEWS_PATH."transactions.php";