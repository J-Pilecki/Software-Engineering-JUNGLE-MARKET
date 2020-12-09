<?php
    function inventory_page()
    {
        ?>
        <?php

  
        $user_name = htmlspecialchars(strip_tags($_SESSION["user_name"]));
        $user_password = htmlspecialchars(strip_tags($_SESSION["user_password"]));
  
        $conn = hsu_conn_sess($user_name, $user_password);
        
        $show_inventory_str = "select *
                               from Product";

        $show_inventory_query = oci_parse($conn, $show_inventory_str); 
        $num = oci_execute($show_inventory_query, OCI_DEFAULT); 



$trees = array("coconut", "palm", "oak", "fern", "date", "cacao", "redwood", "eucalyptus",
		"cedar", "maple", "apple", "banana", "baobab", "foxglove", "gumbolimbo");


        ?>

        <div id="table_stuff2">
            <table> 
                <caption> Inventory </caption>
                <tr> <th scope="col"> id </th>
                     <th scope="col"> name </th> 
                     <th scope="col"> price </th>
                     <th scope="col"> quantity </th>
		     <th scope="col"> picture </th> </tr>        
            <?php
            while(oci_fetch($show_inventory_query))
            {
                $curr_id = oci_result($show_inventory_query, "PROD_ID"); 
                $curr_name = oci_result($show_inventory_query, "PROD_NAME"); 
                $curr_price = oci_result($show_inventory_query, "PROD_PRICE"); 
                $curr_inv = oci_result($show_inventory_query, "PROD_INVENTORY"); 
		$curr_pic = oci_result($show_inventory_query, "PIC_NUM");

                ?>
                 <tr> <td> <?= $curr_id ?> </td>
                      <td> <?= $curr_name ?> </td>
                      <td> $<?= $curr_price ?> </td>
                      <td> <?= $curr_inv ?> </td> 
<td> <img src='http://nrs-projects.humboldt.edu/~jp431/proj458/<?= $trees[$curr_pic] ?>.jpg'> </td> </tr>
<?php 
//} 
?>
                      
            <?php
            }
            ?>
            </table>
        </div>

        <?php
        oci_free_statement($show_inventory_query); 

        $show_inventory_str = "select *
                               from Product";

        $show_inventory_query = oci_parse($conn, $show_inventory_str); 

        oci_execute($show_inventory_query, OCI_DEFAULT); 
        
        ?>
        <form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'],
                              ENT_QUOTES) ?>" id="inventory_form"                                                                                                                                                   >
        
        <h1 id="inventory_header"> Order </h1>

        <div class="inventory_sect"> 

        <label for="product_dropdown"> Choice of product: </label>

        <select name="product_choice" id="product_dropdown"> 
        <?php
            while(oci_fetch($show_inventory_query))
            {
                $curr_id = oci_result($show_inventory_query, "PROD_ID"); 
                $curr_name = oci_result($show_inventory_query, "PROD_NAME"); 
                $curr_price = oci_result($show_inventory_query, "PROD_PRICE"); 
                $curr_inv = oci_result($show_inventory_query, "PROD_INVENTORY"); 
        ?>
                <option value="<?= $curr_id ?>">
                    <?= $curr_name ?> 
                </option>
        <?php
            }
        ?>
        </select>

            <label for="number_field"> How many do you want to buy? </label>
            <input type="number" name="qunt_selected"  id="number_field"/> 
            
        </div>
        
        <div id="submit_sect2">
                <input type="submit" name="submitbutton" value="confirm order" id="first_login" />
            </div>
            
        </form>

        <?php

        oci_free_statement($show_inventory_query); 
        oci_close($conn); 
    }
    
    ?>
