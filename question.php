<?php 
    $data = file('question.txt') or die("Cannot read file");
    array_shift($data);
    $questions = array();
    foreach($data as $key=>$value){
        $tmp = explode("|",$value);
        $id = $tmp[0];
        $question = $tmp[1];

        $questions[$id] = array("question"=>$question);
        
    }
      
?>