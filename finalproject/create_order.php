<?php
session_start();
$title = 'Create Products NeptunoBox';
require_once 'header.php';
require_once 'validateauth.php';

//$musicianId = $_POST['musicianId'];  // we need the id if we are updating an existing record
$id_order = $_POST['id_order'];
$order_date = $_POST['order_date'];
$cust_name = $_POST['cust_name'];
$cust_lastname = $_POST['cust_lastname'];
$state_name = $_POST['state_name'];
$name_usr = $_POST['name_usr'];

// validate inputs
$ok = true; // variable to determine if we should save or not

if (empty($order_date)) {
    echo 'Name is required<br />';
    $ok = false;
}

// strlen is a PHP function that shows the length of a string value
elseif (strlen($order_date) > 100) {
    echo 'Name must be 100 characters or less<br />';
    $ok = false;
}


// is the form ok?
if ($ok == true) {
    // connect
    //$db = new PDO('mysql:host=localhost; dbname=alceneptunobox', 'root', '');
    require_once('db/db.php');

    // set up insert or update
    if (empty($id_order)) {
        $sql = "INSERT INTO products (order_date, cust_name, cust_lastname, state_name, name_usr) VALUES 
        (:order_date, :cust_name, :cust_lastname, :state_name, :name_usr)";
    }
    else {
        $sql = "UPDATE products SET order_date = :order_date, cust_name = :cust_name, cust_lastname = :cust_lastname, state_name = :state_name, name_usr = :name_usr 
         WHERE id_order = :id_order";
    }
    $cmd = $db->prepare($sql);

    // bind the variables into the INSERT command
$cmd->bindParam(':order_date', $order_date, PDO::PARAM_STR, 45);
$cmd->bindParam(':cust_name', $cust_name, PDO::PARAM_INT, 100);
$cmd->bindParam(':cust_lastname', $cust_lastname, PDO::PARAM_INT);
$cmd->bindParam(':state_name', $state_name, PDO::PARAM_INT);
$cmd->bindParam(':name_usr', $name_usr, PDO::PARAM_INT);
    
if (!empty($id_order)) {
    $cmd->bindParam(':id_order', $id_order, PDO::PARAM_INT);
}
$cmd->execute();

    // disconnect
$db = null;

echo 'Order Created Correctly';
//header('location:products.php');
}
?>

<?php
require_once('footer.php')
?>

