<?php
session_start();
$title = 'Product Details NeptunoBox';
require_once 'header.php';
require_once 'validateauth.php';

$id_prod = null;
$prod_name = null;
$prod_descr = null;
$prod_price1 = null;
$prod_price2 = null;
$id_category = null;

if (!empty($_GET['id_prod'])){
    $id_prod = $_GET['id_prod'];

require_once('db/db.php');

$sql = "SELECT * FROM products WHERE id_prod = $id_prod";
$cmd = $db->prepare($sql);
$cmd->bindParam(':id_prod', $id_prod, PDO::PARAM_INT);

//execute
$cmd->execute();
$product = $cmd->fetch();
//$product = $cmd->fetch();

$prod_name = $product['prod_name'];
$prod_descr = $product['prod_descr'];
$prod_price1 = $product['prod_price1'];
$prod_price2 = $product['prod_price2'];
$id_category = $product['id_category'];

//disconnect
$db = null;

}
?>

<form method="POST" action="create_product.php">
    <fieldset>
        <label for="prod_name" cclass="col-md-2">Product Name:</label>
        <input name="prod_name" id="prod_name" value="<?php echo $prod_name; ?>"/>
    </fieldset>
    <fieldset>
        <label for="prod_descr" class="col-md-2">Product Description:</label>
        <input name="prod_descr" id="prod_descr" value="<?php echo $prod_descr; ?>"/>
    </fieldset>
    <fieldset>
        <label for="prod_price1" class="col-md-2">Price 1:</label>
        <input name="prod_price1" id="prod_price1" value="<?php echo $prod_price1; ?>"/>
    </fieldset>
    <fieldset>
        <label for="prod_price2" class="col-md-2">Price2:</label>
        <input name="prod_price2" id="prod_price2" value="<?php echo $prod_price2; ?>"/>
    </fieldset>
    <fieldset>
        <label for="id_category" class="col-md-2">Category id</label>
        <input name="id_category" id="id_category" value="<?php echo $id_category; ?>"/>
    </fieldset>
    <input type="hidden" name="id_prod" id="id_prod" value="<?php echo $id_prod; ?>">
    <button class="offset-md-2 btn btn-primary">Save</button>
</form>
<?php
require_once('footer.php')
?>


