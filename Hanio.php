<?php 
$i=0;
function Hanoi($num,$x,$y,$z){
    if($num==1){
        var_dump($x.'->'.$z);
    }else {
        Hanoi($num-1,$x,$z,$y);
        var_dump($x.'->'.$z);
        Hanoi($num-1,$y,$x,$z);
    }
}

Hanoi(3,'x','y','z'); 
