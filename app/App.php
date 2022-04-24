<?php

declare(strict_types = 1);

use function PHPSTORM_META\map;

// Your Code

function getTransactionFiles(string $dirPath):array
{
       $files=[];
       foreach(scandir($dirPath) as $file){
              if(is_dir($file)){
                     continue;
              }
             $files[]=$dirPath.$file;
       }
       return $files;
}

function getTransactions(string $fileName, ?callable $transactionHandler=null):array{
       if(!file_exists($fileName)){
              trigger_error('File "'.$fileName.'" does not exist!',E_USER_ERROR);
       }
       $file=fopen($fileName,"r");
       $transactions=[];
       fgetcsv($file);
       while(($line=fgetcsv($file))!==false){
              if($transactionHandler!==null){
                     $line=$transactionHandler($line);
              }
             $transactions[]=$line;     
       }
       return $transactions;
}
function extractTransaction(array $transactionRow){
       list($date,$check,$description,$amount) = $transactionRow;

       $amount=(float)str_replace(['$',','],'',$amount);

       return [
              "date"=>$date,
              "check"=>$check,
              "description"=>$description,
              "amount"=>$amount
       ];
}
function calculateTotals(array $transactions):array{
       $totals = ["totalIncome"=>0,'totalExpence'=>0,'netTotal'=>0];
       foreach($transactions as $transaction){
              $totals['netTotal'] += $transaction['amount'];
              if($transaction['amount']>0){
                     $totals['totalIncome'] += $transaction['amount'];
              } else{
                     $totals['totalExpence'] += $transaction['amount'];
              }
       }
       return $totals;
}