<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Alce - OrderBox - <?php echo $title; ?></title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css?family=Cinzel&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
  </head>
<header>
  <article>
    <a href="home.php">
      <img src="img/logo.PNG" alt="logo">
    </a>
  </article>
  <nav>
    
    <ul>
      <li><a class="hvr-wobble-to-top-right" href="home.php">Home</li>
      <li><a class="hvr-wobble-to-top-right" href="orders.php">Orders</li>
      <li><a class="hvr-wobble-to-top-right" href="customers.php">Customers</a>
      <li><a class="hvr-wobble-to-top-right" href="products.php">Products</a>
        <ul>
          <li><a href="">Canvas</a>
          <li><a href="">Easels</a>
          <li><a href="">Other</a>
        </ul>
        <li><a class="hvr-wobble-to-top-right" href="logout.php">Log Out</a>
        <li><a>User - <?php echo $_SESSION["name_usr"]; ?></a>
        </li>
     </ul>
  </nav>
</header>