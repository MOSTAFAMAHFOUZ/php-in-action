<?php 

// get first number 
// get second number 
// choose the operator 

$number1 = rand(1,10);
$number2 = rand(1,10);
$operators = ["+","-","*","/","%"];
$operator = $operators[array_rand($operators)];


if($operator == "+"){
    $result = $number1 + $number2;
    showResult("summession",$number1,$number2,$result);
}else if($operator == "-"){
    $result = $number1 - $number2;
    showResult("subtraction",$number1,$number2,$result);

}else if($operator == "*"){
    $result = $number1 * $number2;
    showResult("multiplication",$number1,$number2,$result);
}else if($operator == "/"){
    $result = $number1 / $number2;
    showResult("division",$number1,$number2,$result);
}else if($operator == "%"){
    $result = $number1 % $number2;
    showResult("modulus",$number1,$number2,$result);
}


function showResult($type,$n1,$n2,$result){
    echo "<h1>operation is {$type} <h1>";
    echo "<h2>number 1 is {$n1} <br> number 2 is  {$n2} <h2>";
    echo "<h1>the result is : {$result} <h1>";
}