<?php
$title = 'Login NeptunoBox';
require_once('header3.php');
?>

<div class="form-style-10">
<h1>Login!<span>Fill the user and password!</span></h1>
<form method="post" action="validate.php">
    <div class="section">User Name & Password</div>
    <div class="inner-wrap">
        <label>Your User Name <input name="username" id="username" required type="email" placeholder="email@email.com" /></label>
        <label>Password <input type="password" name="password" id="password" required /></label>
    </label>
    </div>
    <div class="button-section">
    <input type="submit" value="Login" class="btn-btn-info" />
     <!-- <span class="privacy-policy">
     <input type="checkbox" name="field7">You agree to our Terms and Policy. 
     </span> -->
    </div>
</form>
</div>
<a class="myButton3" href="register.php">Register</a>
<!-- 
<main class="container">
        <h1>Login</h1>
        <form method="post" action="validate.php">
            <fieldset class="form-group">
                <label for="username" class="col-md-2">Username:</label>
                <input name="username" id="username" required type="email" placeholder="email@email.com" />
            </fieldset>
            <fieldset class="form-group">
                <label for="password" class="col-md-2">Password:</label>
                <input type="password" name="password" id="password" required />
            </fieldset>
            <div class="offset-md-2">
                <input type="submit" value="Login" class="btn-btn-info" />
            </div>
        </form>
    </main>
 -->    


<?php
require_once('footer.php')
?>