<?php 
function dollarAmount(float $amount):string{
       $isNegative=$amount < 0;
       return ($isNegative ? '-' : '').'$'.number_format(abs($amount),2);
}
function formatDate(string $date){
       return date("M d,Y",strtotime($date));
}
?>