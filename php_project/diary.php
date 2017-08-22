<?php
    $error ="";
    $result="";
    if(array_key_exists("submit", $_POST)){
        $link = mysqli_connect("localhost","root","","dairyDB");
        if(mysqli_connect_error()){
            die("Database Connection Error.");
        }
        
        if(!$_POST['email']){
            $error .="An email is required.<br>";
        }
        if(!$_POST['password']){
            $error .="A password is required.<br>";
        }
        if($error !=""){
            $error ="<p>There are error in the form.</p>".$error;
        }else{
            $query ="SELECT id FROM 'users' WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'";   
            $result = mysqli_query($link, $query);
            if(mysqli_num_rows($result) > 0){
                $error ="That email address is taken.";
            }else{
                $query = "INSERT INTO 'users'('email','password') VALUES('".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['password'])."')";
                
                if(!mysqli_query($link,$query)){
                    $error ="<p>Could not sign up.</p>";
                }else{
                    echo "Successful";
                }
            }
        }   
    }


?>

<div id="error"><?php echo $error; ?></div>

<form method ="post">
    <input type="email" name="email" placeholder="Email Address">
    <input type="password" name="password" placeholder="password">
    <input type="checkbox" name="stayLogin" value=1>
    <input type="submit" name="submit" value="Sign Up!">  
</form>