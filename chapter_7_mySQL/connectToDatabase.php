<?php
    $link = mysqli_connect("localhost", "root","","openemr");
    if(mysqli_connect_error()){
        die("There is error.");
    }
    
    $query ="SELECT * FROM registry";
    if($result =mysqli_query($link, $query)){
        $row = mysqli_fetch_array($result);
        echo "Your Name is ".$row['name'];
    }
    
?>