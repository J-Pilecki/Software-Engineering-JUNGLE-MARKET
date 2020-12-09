<?php

// This is a "helper function" courtesy of Sharon Tuttle

    function after_login()
    {
        ?>

        <h3> You have logged in successfully </h3> 

        <?php  

             
             //save for future use

             $user_name = $_SESSION["user_name"]; 
             $user_password = $_SESSION["user_password"]; 

            $conn = hsu_conn_sess($user_name, $user_password);
            
        ?>

        <h3> Your username is: <?= $user_name ?> </h3>

        <?php

            oci_close($conn); 

    }

?>
