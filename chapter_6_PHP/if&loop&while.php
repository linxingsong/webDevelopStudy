<?php
    $user ="eric";
    if($user == "eric"){
        echo "<p>It is equal</p>";
        
    }else{
        echo "<p>It is not equal</p>";
    }
    
    $age = 18;
    if($age >= 18){
        echo "<p>Over 18.</p>";
    }else{
        echo "<p>Too young.</p>";
    }

    for($i=0; $i<20; $i+=2){
        echo $i."<br>";
    }

    $myArray = array("Rob","Tom","Tommy","Eric");
    foreach($myArray as $key =>$value){
        $myArray[$key] = $value." Percival";
        echo "Array item ".$key." is ".$value."<br>";
    }
    for($i=0; $i<sizeof($myArray); $i++){
        echo $myArray[$i]."<br>";
    }

    $j=5;
    while($j <= 50){
        echo $j."<br>";
        $j+=5;
    }

?>