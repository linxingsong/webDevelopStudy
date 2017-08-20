//keep you sign up.
<?php
    session_start();
    
    if($_SESSION['email']){
        echo "Yor are logged in!";
    }else{
        header("Location: login.php");   
    }
    
    
?>