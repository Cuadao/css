<?php
session_start();
$title = 'Orders NeptunoBox';
require_once 'header.php';
require_once 'validateauth.php';
?>

<h1>Orders</h1>
<br>
<a href="orders_details.php" class="myButton3">Create Orders</a>
<br>

<?php
require_once('db/db.php');
$sql = "SELECT distinct * FROM orders o, products p , order_state s, users u, customers c
where o.id_product = p.id_prod 
and s.id_state = o.state_order
and o.create_by = u.id_user
and c.id_cust = o.id_customer;";
$cmd = $db->prepare($sql);
$cmd->execute();
$orders = $cmd->fetchAll();

echo '<table class="table"><thead><th>Order Date</th><th>Customer Name</th><th>Customer Last Name</th>
        <th>state order</th><th>Created by</th><th>Quantity</th><th>Producto</th><th>Total</th><th>Observations</th><th>Update</th></thead>';
foreach ($orders as $value) {
    echo '<tr><td>' . $value['order_date'] . '</td>
        <td>' . $value['cust_name'] . '</td>
        <td>' . $value['cust_lastname'] . '</td>
        <td>' . $value['state_name'] . '</td>
        <td>' . $value['name_usr'] . '</td>
        <td>' . $value['quatity'] . '</td>
        <td>' . $value['prod_name'] . '</td>
        <td>' . $value['total'] . '</td>
        <td>' . $value['observations'] . '</td>
        <td><a class="myButton5" href="orders_details.php?id_order=' . $value['id_order'] . '">Update</td>
        </tr>';
}

echo '</table>';

$db = null;

?>

    <!-- <input type="hidden" name="id_prod" id="id_prod" value=>
    <button class="offset-md-2 btn btn-primary">Create Product</button> -->
<br>

<?php
require_once('footer.php')
?>