<?php
$title = 'Register NeptunoBox';
require_once('header2.php');
?>
<div class="form-style-10">
<h1>Register Now!<span>Fill the user and password!</span></h1>
<form method="post" action="create_user.php">
    <div class="section"><span>1</span>User Name & First Name</div>
    <div class="inner-wrap">
        <label>Your User Name <input name="username" id="username" required type="email" placeholder="email@email.com" /></label>
        <label>Your Full Name <input name="name_usr" id="name_usr" required type="text"/></label>
        
    </div>

    <!-- <div class="section"><span>2</span>Email & Phone</div>
    <div class="inner-wrap">
        <label>Email Address <input type="email" name="field3" /></label>
        <label>Phone Number <input type="text" name="field4" /></label>
    </div> -->

    <div class="section"><span>2</span>Passwords</div>
        <div class="inner-wrap">
        <label>Password <input type="password" name="password" id="password" required
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" /></label>
        <label>Confirm Password <input type="password" name="confirm" id="confirm" required
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" /></label>
    </div>
    <div class="button-section">
    <input type="submit" value="Register" class="btn btn-info" />
     <!-- <span class="privacy-policy">
     <input type="checkbox" name="field7">You agree to our Terms and Policy. 
     </span> -->
    </div>
</form>
</div>

<!-- <main class="container">
    <h1>User Registration</h1>
    <form method="post" action="create_user.php">
        <fieldset class="form-group">
            <label for="username" class="col-md-2">Username:</label>
            <input name="username" id="username" required type="email" placeholder="email@email.com" />
        </fieldset>
        <fieldset class="form-group">
            <label for="password" class="col-md-2">Password:</label>
            <input type="password" name="password" id="password" required
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
        </fieldset>
        <fieldset class="form-group">
            <label for="confirm" class="col-md-2">Confirm Password:</label>
            <input type="password" name="confirm" id="confirm" required
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
        </fieldset>
        <fieldset class="form-group">
            <label for="name_usr" class="col-md-2">Name:</label>
            <input name="name_usr" id="name_usr" required/>
        </fieldset>
        <div class="offset-md-2">
            <input type="submit" value="Register" class="btn btn-info" />
        </div>
    </form>
</main>
 -->
<?php
require_once('footer.php')
?>