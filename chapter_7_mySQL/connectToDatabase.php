<?php
    $link = mysqli_connect("localhost", "root","","dairyDB");
    if(mysqli_connect_error()){
        echo "ERROR";
        die ;
    }
    //SQL query for MariaDB server version
    $query ="SELECT ID, email, password, daily FROM users";
    if($result = mysqli_query($link,$query)){
        $row = mysqli_fetch_array($result);
        echo "Your Name is ".$row['email'];
    }else{
        printf("error: %s\n",mysqli_error($link));
    }
    
?>