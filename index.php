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
            margin:2rem auto;
            border:1px solid black;
        }
        .container .question{
            margin:2rem;
        }
        .container ul{
            list-style-type: none;
        }

        .container ul li{
            margin-top:0.5rem;
        }

        .container form input[type=submit]{
            margin:1rem auto;
            text-align:center;
            display:block;
        }
        
    </style>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
    <?php 
        require_once 'question.php';//questions
        require_once 'options.php';//option


        $newarray = array();
        $newarray = $questions;
        foreach($option as $key => $value)
        {
            $newarray[$key]["sentence"] = $option[$key];
        }
        
        function Showchoose($array,$questions,$keyquestion){
            $result ='';
            $result .='<div class="question">';
            $result .= '<p><span>Câu hỏi '.$questions.'</span> '.$array["question"].'?</p>';
            $result .='<ul>';
            foreach($array["sentence"] as $key =>$value)
            {
                foreach($value as $keyC => $valueC)
                {
                    $result .='<li><label for=""><input  name="'.$keyquestion.'" type="radio" value ="'.$value["point"].'">'.$value["option"].'</label></li>';
                    break;
                }
                
                
            }
            $result .= '</ul>';
            $result .= '</div>';        
            echo $result;
        }
        
        
    
    ?>
    <div class="container">
        <form action="result.php" method="POST">
            <?php 
            $i = 1;
            foreach($newarray as $key => $value){
                Showchoose($value,$i,$key);
                $i++;
            }
            
            ?>
           <input type="submit" value="submit" name="submit">
        </form>
        <?php 
        $total = 0;
        if(isset($_REQUEST["submit"]))
        {
            for($i = 0;$i<count($newarray);$i++)
            {
                if(isset($_REQUEST[$i])){
                    $point_choose = $_REQUEST[$i];
                    settype($point_choose,"int");
                    $total += $point_choose;
                }
            }
            echo $total;
        }
       
        ?>


    </div>
    <script type="text/javascript">
        var numItem = $('.question').length;
        for($i = 0;$i<numItem;$i++)
        {
            $('$i').on('change',function(){
            $('$i').not(this).prop('checked',false);
            });
        }
        
    </script>
</body>
</html>