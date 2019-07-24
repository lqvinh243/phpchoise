<?php 
    
    $data = file('option.txt') or die("Cannot read file");

    $option = array();
    foreach($data as $key => $value)
    {
        $tmp = explode("|",$value);
        
        $id = $tmp[0];
        $choose = $tmp[1];
        $content = $tmp[2];
        $point = $tmp[3];
        /*if(array_key_exists($id,$option))
        {
            $option[$id] += array($choose=>["content"=>$content,"point"=>$point]);   

        }
        else $option[$id] = array($choose=>["content"=>$content,"point"=>$point]);*/
        $option[$id][$choose]["option"] = $content;
        $option[$id][$choose]["point"] = $point;  
    }
?>