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


function Fibonacci($no){
    if($no==1){
        return 1;
    }elseif($no==2){
        return 1;
    }else{
        return Fibonacci($no-1)+Fibonacci($no-2);
    }
}
//1 1 2 3 5 8 13 21
var_dump(Fibonacci(8));
