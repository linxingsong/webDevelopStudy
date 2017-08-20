<?php

    //setcookie("customerId","1234",time()+60*60*24); //expire 24 hours
    
    //delete cookie after log out
    setcookie("customerId","",time()-60*60); //only unset after next page loaded.
    //$_COOKIE["customerId'].test();    
    
    echo $_COOKIE['customerId'];

    

?>