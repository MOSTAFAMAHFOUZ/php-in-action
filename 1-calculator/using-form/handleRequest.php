<?php 


$number1 = rand(1,10);
$number2 = rand(1,10);
$operators = ["plu","min","mul","div","mod"]; 
$operator = $operators[rand(0,count($operators)-1)];

if(in_array($operator, $operators)){

    if($operator == "plu"){
        $result = $number1 + $number2;
        showResult($result,"summession",$number1,$number2);
    }else if($operator == "min"){
        $result = $number1 - $number2;
        showResult($result,"subtraction",$number1,$number2);
    }else if($operator == "mul"){
        $result = $number1 * $number2;
        showResult($result,"multiplication",$number1,$number2);
    }else if($operator == "div"){
        $result = $number1 / $number2;
        showResult($result,"division",$number1,$number2);
    }else if($operator == "mod"){
        $result = $number1 % $number2;
        showResult($result,"modulus ",$number1,$number2);
    }

}

function showResult($result,$type,$number1,$number2){
    echo "Operation is {$type} and \n";
    echo "Number 1 is {$number1} \n";
    echo "Number 2 is {$number2} \n";
    echo "the result is {$result}";
}