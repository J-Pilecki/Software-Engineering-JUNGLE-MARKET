<?php
    /*---
        last modified: 12/08/20
        Team 4
    ---*/

    function inventroy_update()
    {
        $username = $_SESSION["user_name"];
        $password = $_SESSION["user_password"];
            
        $conn = hsu_conn_sess($username, $password);

        $stock_update = trim(htmlspecialchars($_POST['qunt_selected']));
        $product_name = trim(htmlspecialchars($_POST['product_choice']));

        
        $update_stock = "update Product
                        set prod_inventory = prod_inventory - :qunt_selected, 
                                total_sales = total_sales + (prod_price * :qunt_selected)
                        where prod_id = :curr_id ";

        $get_total = 'begin :total_sales := grab_total_sales(); end;';
        
        $total_sales_stmt = oci_parse($conn, $get_total);
        
        oci_bind_by_name($total_sales_stmt, ":total_sales", $sumtotal, 4);

        oci_execute($total_sales_stmt, OCI_DEFAULT);        
        
        $somethingcool = oci_parse($conn, $update_stock);
        
        oci_bind_by_name($somethingcool, ":qunt_selected", $stock_update);
        oci_bind_by_name($somethingcool, ":curr_id", $product_name);

        
        oci_execute($somethingcool, OCI_DEFAULT);
        oci_commit($conn);

        $updaing_every_sale = "update Quarterly_Finances
                                set  actual_sales = :get_total
                                where projected_sales = 100 ";
        
        $somethingcool2 = oci_parse($conn, $updaing_every_sale);

        oci_bind_by_name($somethingcool2, ":get_total", $sumtotal);
        oci_execute($somethingcool2, OCI_DEFAULT);
            
        oci_commit($conn);
        
        ?>
        
        <h1>
            Thank you for shopping with us.
        </h1>

                
        <p> <a href="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
            Start Over </a> </p>
        <?php


                
        oci_close($conn);
    }
?>
        
