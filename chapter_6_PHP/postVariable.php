<?php
    //$_POST
    if($_POST){
        $myArray = array("Rob","Tom","Tommy","Eric");
        $isKnown = false;
        foreach($myArray as $value){
            if($value == $_POST['name']){
                $isKnown = true;
            }
        }
        if($isKnown){
            echo "<p>Hi.</p>";
        }else{
            echo"<p>who are you?</p>";
        }
    }
?>

<p>What's your name?</p>
<form method="post">
    <input name="name" type="text">
    <input type="submit" value="Go!">
</form>