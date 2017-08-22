<?php

    $salt ="isefdafd43KID34";
    $row['id']=73;
    //echo md5("password"); //one way encrytion.
    //echo md5($salt."password"); //append extra string to do it.
    echo md5(md5($row['id'])."password"); //salt is different, only hack for one row if it success.

    //password_hash

    // Generate a hash of the password "mypassword"
    $hash = password_hash("mypassword", PASSWORD_DEFAULT);

    // Echoing it out, so we can see it:
    echo $hash;

    // Some line breaks for a cleaner output:
    echo "<br><br>";

    // Using password_verify() to check if "mypassword" matches the hash.
    // Try changing "mypassword" below to something else and then refresh the page.
    if (password_verify('mypassword', $hash)) {
        echo 'Password is valid!';
    } else {
        echo 'Invalid password.';
    }

?>