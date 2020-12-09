<?php

/*
        This is a 328 "helper function" courtesy of Sharon Tuttle
*/

function login_page()
{
    // create the desired Oracle log-in form
    ?>
    <div class="center">
        <h1 id="login_header">Welcome</h1> 

        <form method="post"
              action="<?= htmlentities($_SERVER['PHP_SELF'], 
                                       ENT_QUOTES) ?>">      
            <div class="text_field">
                <input type="text" name="user_name" required="required" />
                <span></span>
                <label> Username </label>
            </div>                      

            <div class="text_field">
                <input type="password" name="user_password" required="required" />
                <label> Password </label>
            </div>            

            <input type="submit" value="Submit" name="inventory_submit" id="first_login" />
            <br/>
            <br/>
            <input type="submit" value="Create Account" name="loyalty_submit" id="customer_login" /> 
        </form>
    </div>
        <?php
}

?>
