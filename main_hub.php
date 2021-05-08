<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<!--

     by: group 4
    last modified: 12-08-2020

-->

<head>
    <title> 458 PROJECT</title>
    <meta charset="utf-8" /> <link href="custom.css"
          type="text/css" rel="stylesheet" />

    <link href=
        "http://nrs-projects.humboldt.edu/~st10/styles/normalize.css"
        type="text/css" rel="stylesheet" />

    <link href="458Project.css" type="text/css"
          rel="stylesheet" />

          <?php
          require("inventroy_update.php");
          require("hsu_conn_sess.php");
          require("after_login_temp.php"); 
          require("login_page.php");
          require("destroy_and_exit.php");
          require("inventory.php");
          require("customer_form.php"); 
          require("insert_function.php"); 

          ?>
</head>

<body>

<div class="store_name">

<img src="logo.png" alt="Logo" width="1250px" height="274px">

</div>



<?php

if (! array_key_exists("next_state",$_SESSION))
{
    login_page();
    $_SESSION["next_state"]="choice";
}

elseif($_SESSION["next_state"] == "choice" and 
        array_key_exists("inventory_submit", $_POST))
{
    $user_name = strip_tags($_POST["user_name"]);
    $user_password = $_POST['user_password'];

    //save for future use
    $_SESSION["user_name"] = $user_name;
    $_SESSION["user_password"] = $user_password;

    inventory_page();
    $_SESSION["next_state"]="inventroy_update";
}

elseif($_SESSION['next_state']=="inventroy_update")
{
    inventroy_update();
    $_SESSION["next_state"]="done";

}

elseif($_SESSION["next_state"] == "choice" and 
        array_key_exists("loyalty_submit", $_POST))
{
    $user_name = strip_tags($_POST["user_name"]);
    $user_password = $_POST['user_password'];

    $_SESSION["user_name"] = $user_name;
    $_SESSION["user_password"] = $user_password;

    customer_form(); 
    $_SESSION["next_state"] = "insertCustomer"; 
}

elseif($_SESSION["next_state"] == "insertCustomer")
{
    insert_stmt(); 
    $_SESSION["next_state"] = "inventory_after_signup"; 
}

elseif($_SESSION["next_state"] == "inventory_after_signup")
{
    inventory_page(); 
    $_SESSION["next_state"] = "to_update"; 
}

elseif($_SESSION["next_state"] == "to_update")
{
    inventroy_update(); 
    $_SESSION["next_state"] = "done"; 
}

elseif($_SESSION['next_state']=="done")
{
    session_destroy(); 
    ?>
     <p> Click 
        <a href="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
            here </a> to start over
    </p>
    <?php
}


else
{
    ?>
    <p> <strong> YIKES! should NOT have been able to reach
        here! </strong> </p>
    <?php
    login_page();    

    session_destroy();
    session_regenerate_id(TRUE);
    session_start();
 
    $_SESSION['next_state'] = "choice";
}


?>

</body>
</html>
