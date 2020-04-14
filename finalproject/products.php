<?php
session_start();
$title = 'Products NeptunoBox';
require_once 'header.php';
require_once 'validateauth.php';
?>
<h1>Categories</h1>
<br>
<a class="myButton3" href="category_details.php">Create Category</a>
<br>
<?php
require_once('db/db.php');
$sql = "SELECT * FROM categories";
$cmd = $db->prepare($sql);
$cmd->execute();
$categories = $cmd->fetchAll();

echo '<table class="table"><thead><th>Name</th><th>Description</th><th>Update</th></thead>';
foreach ($categories as $value) {
    echo '<tr><td>'. $value['categ_name'] . '</td>
                <td>' . $value['categ_desc'] . '</td>
                <td><a class="myButton5" href="category_details.php?id_categ=' . $value['id_categ'] . '">
                Update</td></tr>';
}

echo '</table>';

?>


<br>
<br>

<h1>Products</h1>

<a class="myButton3" href="product_details.php">Create Product</a>

<?php

$sql = "SELECT distinct * FROM products, categories 
        where id_categ = id_category";
$cmd = $db->prepare($sql);
$cmd->execute();
$products = $cmd->fetchAll();

echo '<table class="table"><thead><th>Name</th><th>Description</th><th>Store Price</th>
        <th>wholesale Price</th><th>Category</th><th>Update</th><th>Delete</th></thead>';
foreach ($products as $value) {
    echo '<tr><td>' . $value['prod_name'] . '</td>
        <td>' . $value['prod_descr'] . '</td>
        <td>' . $value['prod_price1'] . '</td>
        <td>' . $value['prod_price2'] . '</td>
        <td>' . $value['categ_name'] . '</td>
        <td><a class="myButton5" href="product_details.php?id_prod=' . $value['id_prod'] . '">
        Update</td>
        <td><a class="myButton4" href="delete_product.php?id_prod=' . $value['id_prod'] .'"
            onclick=return confirmDelete();">Delete</td>
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