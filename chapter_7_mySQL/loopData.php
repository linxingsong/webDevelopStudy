<?php
    $link = mysqli_connect("localhost", "root","","openemr");
    if(mysqli_connect_error()){
        die("There is error.");
    }
    
   // $query="INSERT INTO prices ('pr_id','pr_selector','pr_level','pr_price') VALUES('1','dir','1','23')";
    //mysqli_query($link, $query);
    
    //update
    //$query ="UPDATE 'users' set email = 'eric@qq.com' where id=1 LIMIT 1";
    

    // %: everything in mysql
    // %p%: anything with p
    mysqli_query($link, $query);

    $name = "Rob O'Grady";
    $query ="SELECT 'email' FROM users WHERE name='".mysqli_real_escape_string($link,$name)."'";//deal with $name with '''
    //***mysqli_real_escape_string() is prevent method for injection.***
    if($result =mysqli_query($link, $query)){
        while($row =mysqli_fetch_array($result)){
           print_r($row);
        }
    }
    
?>