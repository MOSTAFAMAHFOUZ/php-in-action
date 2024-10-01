<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto border p-5 my-5">
                <?php 
                if(isset($_POST["number1"]) && $_POST["number2"] && $_POST["operator"]){
                    $number1 = rand(1,10);
                    $number2 = rand(1,10);
                    $operators = ["plu","min","mul","div","mod"]; 
                    $operator = $_POST["operator"];

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
                }

function showResult($result,$type,$number1,$number2){
    echo "<h2>Operation is {$type}  <h2>";
    echo "<h2>Number 1 is {$number1} <h2>";
    echo "<h2>Number 2 is {$number2} <h2>";
    echo "<h2>The result is {$result} <h2>";
}
                ?>
                <h1 class="text-center border p-3">Calculator</h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="mb-3 p-2">
                        <label for="number1">Type The First Number</label>
                        <input type="number" name="number1" class="form-control">
                    </div>
                    <div class="mb-3 p-2">
                        <label for="number2">Type The Second Number</label>
                        <input type="number" name="number2" class="form-control">
                    </div>
                    <div class="mb-3 p-2">
                        <label for="op">Choose The Operator</label>
                        <select name="operator" class="form-control">
                            <option value="">choose --- </option>
                            <option value="plu">+</option>
                            <option value="sub">-</option>
                            <option value="mul">*</option>
                            <option value="div">/</option>
                            <option value="mod">%</option>
                        </select>
                    </div>
                    <div class="mb-3 p-2">
                        <input type="submit" name="submit" class="form-control bg-success text-white">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>