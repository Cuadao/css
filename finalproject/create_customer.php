<?php
$title = 'Create Customer NeptunoBox';
require_once('header.php');
?>

<?php
//$musicianId = $_POST['musicianId'];  // we need the id if we are updating an existing record
$cust_name = $_POST['cust_name'];
$cust_lastname = $_POST['cust_lastname'];
$cust_address = $_POST['cust_address'];
$cust_cellphone = $_POST['cust_cellphone'];
$cust_email = $_POST['cust_email'];
$cust_city = $_POST['cust_city'];
$date_birth = $_POST['date_birth'];

// validate inputs
$ok = true; // variable to determine if we should save or not

if (empty($cust_name)) {
    echo 'Name is required<br />';
    $ok = false;
}

// strlen is a PHP function that shows the length of a string value
elseif (strlen($cust_name) > 100) {
    echo 'Name must be 100 characters or less<br />';
    $ok = false;
}

$db = new PDO('mysql:host=localhost; dbname=alceneptunobox', 'root', '');

$sql = "INSERT INTO customers (cust_name, cust_lastname, cust_address, cust_cellphone, cust_email, cust_city, date_birth) VALUES 
        (:cust_name, :cust_lastname, :cust_address, :cust_cellphone, :cust_email, :cust_city, :date_birth)";

$cmd = $db->prepare($sql);

    // bind the variables into the INSERT command
$cmd->bindParam(':cust_name', $cust_name, PDO::PARAM_STR, 45);
$cmd->bindParam(':cust_lastname', $cust_lastname, PDO::PARAM_STR, 45);
$cmd->bindParam(':cust_address', $cust_address, PDO::PARAM_STR, 45);
$cmd->bindParam(':cust_cellphone', $cust_cellphone, PDO::PARAM_STR, 45);
$cmd->bindParam(':cust_email', $cust_email, PDO::PARAM_STR, 45);
$cmd->bindParam(':cust_city', $cust_city, PDO::PARAM_STR, 45); 
$cmd->bindParam(':date_birth', $date_birth, PDO::PARAM_STR, 45); 

$cmd->execute();

    // disconnect
$db = null;

echo 'Customer Created Correctly';

?>

<?php
require_once('footer.php')
?>