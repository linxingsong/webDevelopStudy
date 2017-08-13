<?php
    //simple example but not good.
    $emailTo="linxingsong@gmail.com";
    $subject ="For Testing";
    $body="This email is for testing";
    $headers ="From: test@email.com";
    if(mail($emailTo, $subject, $body, $headers)){
        echo "<p>This email is successful.</p>";
    }else{
        echo "<p>Fail.</p>";
    }
?>
