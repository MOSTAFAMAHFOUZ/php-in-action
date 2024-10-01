<?php 


$number1 = rand(1,10);
$number2 = rand(1,10);
$operators = ["+","-","*","/","%"]; 
$operator = $operators[rand(0,count($operators)-1)];

if(in_array($operator, $operators)){

    if($operator == "+"){
        $result = $number1 + $number2;
        showResult($result,"summession",$number1,$number2);
    }else if($operator == "-"){
        $result = $number1 - $number2;
        showResult($result,"subtraction",$number1,$number2);
    }else if($operator == "*"){
        $result = $number1 * $number2;
        showResult($result,"multiplication",$number1,$number2);
    }else if($operator == "/"){
        $result = $number1 / $number2;
        showResult($result,"division",$number1,$number2);
    }else if($operator == "%"){
        $result = $number1 % $number2;
        showResult($result,"modulus ",$number1,$number2);
    }

}

function showResult($result,$type,$number1,$number2){
    echo "<h1>Operation is {$type}  </h1>";
    echo "<h3>Number 1 is {$number1} </h3>";
    echo "<h3>Number 2 is {$number2} </h3>";
    echo "<h3>the result is {$result}</h3>";
}