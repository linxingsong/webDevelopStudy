<?php

    $salt ="isefdafd43KID34";
    $row['id']=73;
    //echo md5("password"); //one way encrytion.
    //echo md5($salt."password"); //append extra string to do it.
    echo md5(md5($row['id'])."password"); //salt is different, only hack for one row if it success.
?>