<?php
    $link = mysqli_connect("localhost", "root","","openemr");
    if(mysqli_connect_error()){
        die("There is error.");
    }
    
   // $query="INSERT INTO prices ('pr_id','pr_selector','pr_level','pr_price') VALUES('1','dir','1','23')";
    //mysqli_query($link, $query);
    
    //update
    $query ="UPDATE 'users' set email = 'eric@qq.com' where id=1 LIMIT 1";
    mysqli_query($link, $query);
    $query ="SELECT * FROM users";
    if($result =mysqli_query($link, $query)){
        $row = mysqli_fetch_array($result);
        echo "Your Name is ".$row[1];
    }
    
?>