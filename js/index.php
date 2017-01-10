<?php
function addDaysReadable($date,$days){

    $date = strtotime("+".$days." days", strtotime($date));
    return  date("m/j/Y", $date);

}
function addDaysTimestamp($date,$days){

    $date = strtotime("+".$days." days", strtotime($date));
    return  date("Y-m-d H:i:s", $date);

}


$date = new DateTime();
$date->add(DateInterval::createFromDateString('yesterday'));
echo $date->format('m/j/Y') . "<br />";
echo $date->format('Y/m/d') . '<br />';
$yesterday = $date->format('Y-m-d H:i:s');
$thirty_days_ahead =  strtotime($yesterday, "+30 days") ;
print addDaysTimestamp($yesterday, 30);
?>

