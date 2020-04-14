<?php
session_start();
$title = 'Order Details NeptunoBox';
require_once 'header.php';
require_once 'validateauth.php';

$id_order = null;
$order_date = null;
$cust_name = null;
$cust_lastname = null;
$state_name = null;
$name_usr = null;
$quatity = null;
$prod_name = null;
$total = null;
$observations = null;

if (!empty($_GET['id_order'])){
    $id_order = $_GET['id_order'];

require_once('db/db.php');

$sql = "SELECT distinct * FROM orders o, products p , order_state s, users u, customers c
where o.id_product = p.id_prod 
and s.id_state = o.state_order
and o.create_by = u.id_user
and c.id_cust = o.id_customer;";
$cmd = $db->prepare($sql);
$cmd->bindParam(':id_order', $id_order, PDO::PARAM_INT);

//execute
$cmd->execute();
$order = $cmd->fetch();
//$product = $cmd->fetch();

$order_date = $order['order_date'];
$cust_name = $order['cust_name'];
$cust_lastname = $order['cust_lastname'];
$state_name = $order['state_name'];
$name_usr = $order['name_usr'];
$quatity = $order['quatity'];
$prod_name = $order['prod_name'];
$total = $order['total'];
$observations = $order['observations'];
//disconnect
$db = null;

}
?>
<h1>Order Form</h1>
   <div class="info"><!-- <a href="https://www.grandvincent-marion.fr" target="_blank"><p> Made with <i class="fa fa-heart"></i> by Marion Grandvincent </p></a> --></div>
  
  <form method="POST" action="create_order.php">
        <h1>Plese complete all information order, any question contact support:</h1>
        
    <div class="contentform">
        <div id="sendmessage"> Your message has been sent successfully. Thank you. </div>


        <div class="leftcontact">
                  <div class="form-group">
                    <p>Order Date<span>*</span></p>
                    <span class="icon-case"><i class="fa fa-male"></i></span>
                    <input name="order_date" id="order_date" value="<?php echo $order_date; ?>"/>
                <div class="validation"></div>
       </div> 

            <div class="form-group">
            <p>Customer Name <span>*</span></p>
            <span class="icon-case"><i class="fa fa-user"></i></span>
            <input name="cust_name" id="cust_name" value="<?php echo $cust_name; ?>"/>
            <!-- <select name="cust_name" id="cust_name">
            <?php

            $id_cust = null;
            $cust_name = null;

            // ckech if there
            if (!empty($_GET['id_cust'])){
             $networkId = $_GET['id_cust'];
            }
            $db = new PDO('mysql:host=localhost; dbname=alceneptunobox', 'root', '');

            //set up SQL command to delete the selected record
            //$sql = "SELECT * FROM networks WHERE networkid = $networkId";

                $sql = $db->query("SELECT * FROM customers"); // Run your query

            //echo '<select name="networkName">'; // Open your drop down box

            // Loop through the query results, outputing the options one by one
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="'.$row['cust_name'].'">'.$row['cust_name'].'</option>';
            }

            //echo '</select>';// Close your drop down box
            //disconnect
            $db = null;
            ?>  
            </select> -->
            <div class="validation"></div>
            </div>

            <div class="form-group">
            <p>Customer Last Name <span>*</span></p>    
            <span class="icon-case"><i class="fa fa-envelope-o"></i></span>
            <input name="cust_lastname" id="cust_lastname" value="<?php echo $cust_lastname; ?>"/>
                <div class="validation"></div>
            </div>  

            <div class="form-group">
            <p>Order State <span>*</span></p>
            <span class="icon-case"><i class="fa fa-home"></i></span>
            <input name="state_name" id="state_name" value="<?php echo $state_name; ?>"/>
                <div class="validation"></div>
            </div>

            <div class="form-group">
            <p>Create By <span>*</span></p>
            <span class="icon-case"><i class="fa fa-location-arrow"></i></span>
            <input name="name_usr" id="name_usr" value="<?php echo $name_usr; ?>"/>
                <div class="validation"></div>
            </div> 


    </div>

    <div class="rightcontact">  

            <div class="form-group">
            <p>Quantity <span>*</span></p>
            <span class="icon-case"><i class="fa fa-building-o"></i></span>
            <input name="quatity" id="quatity" value="<?php echo $quatity; ?>"/>
                <div class="validation"></div>
            </div>  

            <div class="form-group">
            <p>Product Name<span>*</span></p>  
            <span class="icon-case"><i class="fa fa-phone"></i></span>
            <input name="prod_name" id="prod_name" value="<?php echo $prod_name; ?>"/>
                <div class="validation"></div>
            </div>

            <div class="form-group">
            <p>Total <span>*</span></p>
            <span class="icon-case"><i class="fa fa-info"></i></span>
            <input name="total" id="total" value="<?php echo $total; ?>"/>
                <div class="validation"></div>
            </div>

                  
            <div class="form-group">
            <p>Orbsevations <span>*</span></p>
            <span class="icon-case"><i class="fa fa-comments-o"></i></span>
                <textarea name="observations" id="observations" value="<?php echo $observations; ?>"></textarea>
                <div class="validation"></div>
            </div>  
    </div>
    </div>
    <input type="hidden" name="id_order" id="id_order" value="<?php echo $id_order; ?>">
    <button class="bouton-contact">Save</button>

    
</form> 
<!-- 
<form method="POST" action="create_order.php">
    <fieldset>
        <label for="order_date" cclass="col-md-2">Order Date:</label>
        <input name="order_date" id="order_date" value="<?php echo $order_date; ?>"/>
    </fieldset>
    <fieldset>
        <label for="cust_name" class="col-md-2">Customer Name:</label>
        <input name="cust_name" id="cust_name" value="<?php echo $cust_name; ?>"/>
    </fieldset>
    <fieldset>
        <label for="cust_lastname" class="col-md-2">Customer Last Name:</label>
        <input name="cust_lastname" id="cust_lastname" value="<?php echo $cust_lastname; ?>"/>
    </fieldset>
    <fieldset>
        <label for="state_name" class="col-md-2">Order State:</label>
        <input name="state_name" id="state_name" value="<?php echo $state_name; ?>"/>
    </fieldset>
    <fieldset>
        <label for="name_usr" class="col-md-2">Created By:</label>
        <input name="name_usr" id="name_usr" value="<?php echo $name_usr; ?>"/>
    </fieldset>
    <fieldset>
        <label for="quatity" class="col-md-2">Quantity:</label>
        <input name="quatity" id="quatity" value="<?php echo $quatity; ?>"/>
    </fieldset>
    <fieldset>
        <label for="prod_name" class="col-md-2">Product Name:</label>
        <input name="prod_name" id="prod_name" value="<?php echo $prod_name; ?>"/>
    </fieldset>
    <fieldset>
        <label for="total" class="col-md-2">Total:</label>
        <input name="total" id="total" value="<?php echo $total; ?>"/>
    </fieldset>
    <fieldset>
        <label for="observations" class="col-md-2">Observations:</label>
        <input name="observations" id="observations" value="<?php echo $observations; ?>"/>
    </fieldset>
    <input type="hidden" name="id_order" id="id_order" value="<?php echo $id_order; ?>">
    <button class="offset-md-2 btn btn-primary">Save</button>
</form>
 -->
 <?php
require_once('footer.php')
?>


