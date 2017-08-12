<?php
    $myArray = array("Rob","Tom","Tommy","Eric");
    $myArray[] = "Davie";
    print_r($myArray);
    echo $myArray[1];
    echo "<p></p>";
    
    $anotherArry[0]="pizza";
    $anotherArry[1]="milk";
    $anotherArry[10] ="apple";
    $anotherArry["stirngName"]="ice cream";
    print_r($anotherArry);

    echo "<p></p>";
    $thirdArry = array("Frence"=>"French","USA"=>"English");
    print_r($thirdArry);
    echo sizeof($thirdArry);
    unset($thirdArry["USA"]);
    echo "<p></p>";
    print_r($thirdArry);

?>