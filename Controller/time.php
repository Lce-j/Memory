<?php
require './Model/time.php';

$min = 5;
$sec = 59;
$time = explode(':',$min);

while($min != 0){
    while($sec != 00){
        $sec = $sec - 01;
        sleep(1);
    }
    if($sec == 00){
        $min = $min - 1;
        $sec = 59;
        sleep(1);
    }
}
if($min == 0 && $sec == 00){
    printf('Le temps est écoulé');
}

require './View/time.php'; 