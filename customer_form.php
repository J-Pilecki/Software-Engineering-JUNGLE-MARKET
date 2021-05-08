<?php

/*===
    by: Jesse Garcia
    last modified: DECEMBER 4, 2020
    Team 4
===*/


function customer_form()
{
    if ( (! array_key_exists("user_name", $_POST)) or
         (! array_key_exists("user_password", $_POST)) or
         ($_POST["user_name"] == "") or
         ($_POST["user_password"] == "") or
         (! isset($_POST["user_name"])) or
         (! isset($_POST["user_password"])) )
    {
        destroy_and_exit("must enter a username and password!");
    }


    ?>

    
    <form method="post"
          action="<?= htmlentities($_SERVER['PHP_SELF'], 
                                   ENT_QUOTES) ?>" id="customer_order_form">
           
                <h1 id="sign_up_header">Loyalty Sign Up</h1> <!-- <legend> Enter the following for Loyalty Sign up </legend> -->
                <div class="customer_order_sect"> 
                <label for="value1">
                        Enter your first name: </label>
                <input type="text" name="cust_fname"
                       id="value1" required="required" /> <br />

                       <br />

                <label for="value2">
                        Enter your last name: </label>
                <input type="text" name="cust_lname"
                       id="value2" required="required" /> <br />

                       <br />

                <label for="value3">
                        Enter your Phone Number: </label>
                <input type="number" name="cust_phone"
                       id="value3" required="required" /> <br />

                       <br />

                <label for="value4">
                        Insert your email: </label>
                <input type="text" name="cust_email"
                       id="value4" required="required" /> <br />
                </div>
        
            <div class="sub_button">
                    <input type="submit" value="confirm info" id="first_login" />
            </div>
        </form>
    <?php
}
?>

