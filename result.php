<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }

    .container{
        width:50%;
        margin:1rem auto;
        border:1px solid black;
    }
    .container h1, p{
        text-align:center;
        margin:1rem;
    }
    </style>
</head>
<body>
    <?php
    
    $data = file("question.txt") or die("Cannot read file");
    array_shift($data);
    $point = $_REQUEST;
    $total = 0;
    array_pop($point);
    
    foreach($data as $key => $value)
    {
        $tmp = explode("|",$value);
        $id = $tmp[0];
        $point[$id] = (int)$point[$id];
        $total = $total + $point[$id];
    }

    $data = file("result.txt") or die("Cannot read file");
    array_shift($data);
    
    $array_result = array();
    foreach($data as $key => $value){
        $tmp = explode("|",$value);
        $array_result[$key]["min"] = $tmp[0];
        $array_result[$key]["max"] = $tmp[1];
        $array_result[$key]["description"] = $tmp[2];
    }
    ?>
    <div class="container">
        <h1>Điểm của bạn là <?php echo $total?></h1>
        <p>Bạn được kết quả như sau <br><?php ?></p>
        <?php        
        foreach($array_result as $key =>$value)
        {
            if($total >= $value["min"] && $total <= $value["max"]){
                echo "<p>";
                echo $value["description"];
                echo "</p>";
            }       
        }
        ?>
        
    </div>
</body>
</html>