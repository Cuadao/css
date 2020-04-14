<?php
session_start();
$title = 'Category Details NeptunoBox';
require_once 'header.php';
require_once 'validateauth.php';

$id_categ = null;
$categ_name = null;
$categ_desc = null;

if (!empty($_GET['id_categ'])){
    $id_categ = $_GET['id_categ'];

require_once('db/db.php');

$sql = "SELECT * FROM categories WHERE id_categ = $id_categ";
$cmd = $db->prepare($sql);
$cmd->bindParam(':id_categ', $id_categ, PDO::PARAM_INT);

//execute
$cmd->execute();
$category = $cmd->fetch();
//$product = $cmd->fetch();

$categ_name = $category['categ_name'];
$categ_desc = $category['categ_desc'];

$db = null;

}
?>

<h1>Customer Form</h1>
   <div class="info"><!-- <a href="https://www.grandvincent-marion.fr" target="_blank"><p> Made with <i class="fa fa-heart"></i> by Marion Grandvincent </p></a> --></div>
  
  <form method="POST" action="create_customer.php">
        <h1>Plese complete all Customer information</h1>
        
    <div class="contentform">
        <div id="sendmessage"> Your message has been sent successfully. Thank you. </div>


        <div class="leftcontact">
            <div class="form-group">
            <p>Category Name<span>*</span></p>
            <span class="icon-case"><i class="fa fa-male"></i></span>
            <input name="categ_name" id="categ_name" value="<?php echo $categ_name; ?>"/>
            <div class="validation"></div>
       </div> 

          
    </div>

    <div class="rightcontact">  

            <div class="form-group">
            <p>Description <span>*</span></p>
            <span class="icon-case"><i class="fa fa-building-o"></i></span>
            <input name="categ_desc" id="categ_desc" value="<?php echo $categ_desc; ?>"/>
                <div class="validation"></div>
            </div>  
 
    </div>
    </div>
    <input type="hidden" name="id_categ" id="id_categ" value="<?php echo $id_categ; ?>">
    <button class="bouton-contact">Save</button>  
</form> 
<!-- 
<form method="POST" action="create_category.php">
    <fieldset>
        <label for="categ_name" cclass="col-md-2">Category Name:</label>
        <input name="categ_name" id="categ_name" value="<?php echo $categ_name; ?>"/>
    </fieldset>
    <fieldset>
        <label for="categ_desc" class="col-md-2">Category Description:</label>
        <input name="categ_desc" id="categ_desc" value="<?php echo $categ_desc; ?>"/>
    </fieldset>
    <input type="hidden" name="id_categ" id="id_categ" value="<?php echo $id_categ; ?>">
    <button class="offset-md-2 btn btn-primary">Save</button>
</form>
 -->
<?php
require_once('footer.php')
?>