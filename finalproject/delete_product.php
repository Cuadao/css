<?php
$title = 'Delete Products NeptunoBox';
require_once('header.php');

//Read the selected musician id from thee value at the end of the url
$id_prod = $_GET['id_prod'];

//connect

require_once('db/db.php');
//$db = new PDO('mysql:host=localhost; dbname=alceneptunobox', 'root', '');
//set up SQL command to delete the selected record
$sql = "DELETE FROM products WHERE id_prod = :id_prod";


//bind parameter to pass in the selected id
$cmd = $db->prepare($sql);
$cmd->bindParam(':id_prod', $id_prod, PDO::PARAM_INT);

//execute
$cmd->execute();

//disconnect
$db = null;

//take user back to the update list
//header( string  )
header('location:products.php');

?>


<?php
require_once('footer.php')
?>