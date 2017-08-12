<?php
    //common: type variable in URL and get those variables.
    if(is_numeric($_GET['number'])&& $_GET['number']>0){
        
        $i = 2;
        $isPrime =true;
        while($i < $_GET['number']){
            if($_GET['number'] % $i ==0){
                $isPrime = false;
            }
            $i++;
        }
        if($isPrime){
            echo "<p>".$i." is a prime number."."</p>";
        }else{
            echo "<p>".$i." is not a prime number."."</p>"; 
        }
    } else if ($_GET){
        echo "<p>Please enter a positive number.</p>";
    }
    
?>

<p>What's your name?</p>
<form>
    <input name="number" type="text">
    <input type="submit" value="Go!">
</form>