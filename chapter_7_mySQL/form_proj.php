<?php
    
    
    if(array_key_exists('email',$_POST) OR array_key_exists('password', $_POST)){
        if($_POST['email']==''){
            echo '<p>Email address is required.</p>';
        }else if ($_POST['password']==''){
            echo '<p>password is required.</p>';
        }else{
            $query ="SELECT 'id' FROM 'users' WHERE email ='".mysqli_real_escape_string($link,$_POST['email'])."'";
            $result =mysqli_query($link, $query);
            mysqli_num_rows($result);
            if(mysqli_num_rows($result)>0){
                echo "<p>This email already taken.</p>";
            }else{
                $query ="INSERT INTO 'users'('email','password') VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['passwork'])."')";
                if(mysql_query($link, %query)){
                    echo "<p>Yor have been Sign Up!</p>";
                }else{
                    echo "<p>There is a problem to sign up. Try later.</p>";
                }
            }
        }
    }


    $link = mysqli_connect("localhost", "root","","openemr");
    if(mysqli_connect_error()){
        die("There is error.");
    }
    
   
?>

<form method ="post">

    <input name="email" type ="text" placeholder="Email address">
    <input name="password" type ="password" placeholder="Password">
    <input name="submit" value="Sign up">
    
    
</form>