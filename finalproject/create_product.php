<?php
session_start();
$title = 'Create Products NeptunoBox';
require_once 'header.php';
require_once 'validateauth.php';

//$musicianId = $_POST['musicianId'];  // we need the id if we are updating an existing record
$id_prod = $_POST['id_prod'];
$prod_name = $_POST['prod_name'];
$prod_descr = $_POST['prod_descr'];
$prod_price1 = $_POST['prod_price1'];
$prod_price2 = $_POST['prod_price2'];
$id_category = $_POST['id_category'];

// validate inputs
$ok = true; // variable to determine if we should save or not

if (empty($prod_name)) {
    echo 'Name is required<br />';
    $ok = false;
}

// strlen is a PHP function that shows the length of a string value
elseif (strlen($prod_name) > 100) {
    echo 'Name must be 100 characters or less<br />';
    $ok = false;
}


// is the form ok?
if ($ok == true) {
    // connect
    //$db = new PDO('mysql:host=localhost; dbname=alceneptunobox', 'root', '');
    require_once('db/db.php');

    // set up insert or update
    if (empty($id_prod)) {
        $sql = "INSERT INTO products (prod_name, prod_descr, prod_price1, prod_price2, id_category) VALUES 
        (:prod_name, :prod_descr, :prod_price1, :prod_price2, :id_category)";
    }
    else {
        $sql = "UPDATE products SET prod_name = :prod_name, prod_descr = :prod_descr, prod_price1 = :prod_price1, prod_price2 = :prod_price2, id_category = :id_category 
         WHERE id_prod = :id_prod";
    }
    $cmd = $db->prepare($sql);

    // bind the variables into the INSERT command
$cmd->bindParam(':prod_name', $prod_name, PDO::PARAM_STR, 60);
$cmd->bindParam(':prod_descr', $prod_descr, PDO::PARAM_STR, 100);
$cmd->bindParam(':prod_price1', $prod_price1, PDO::PARAM_INT);
$cmd->bindParam(':prod_price2', $prod_price2, PDO::PARAM_INT);
$cmd->bindParam(':id_category', $id_category, PDO::PARAM_INT);
    
if (!empty($id_prod)) {
    $cmd->bindParam(':id_prod', $id_prod, PDO::PARAM_INT);
}
$cmd->execute();

    // disconnect
$db = null;

echo 'Product Created Correctly';
//header('location:products.php');
}
?>

<?php
require_once('footer.php')
?>

