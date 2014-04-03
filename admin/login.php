<?php
session_start();
require_once 'functions/membership.php';
$membership = new membership();

//if the user clicks the "Log Out" link on the index page.
if(isset($_GET['status']) && $_GET['status'] == 'logout') {
	$membership->logOut();
}

//did the user enter a password/username and click submit?
if($_POST && !empty($_POST['username']) && !empty($_POST['password'])) {
	$response = $membership->validateUser($_POST['username'], $_POST['password']);
}
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Admin Login</title>
        <meta name="viewport" content="width=device-width">
        
        <link rel="dns-prefetch" href="//ajax.googleapis.com">
        <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">

        <link rel="stylesheet" href="../css/admin.css">
        
        <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
        
    </head>
    <body>
	<div id="container">    
        <form method="post" class="login-form">
          <h1>Talking Stick Admin Log In</h1>
          	<p class="field">
            <label for="username"><i class="icon-user"></i>Username</label>
            <input type="text" name="username" id="username" maxlength="32" placeholder="Username" required>
            </p>
                
            <p class="field">
            <label for="password"><i class="icon-lock"></i>Password</label>
            <input type="password" name="password" id="password" placeholder="Password" class="show-password" autocomplete="off" required>
            </p>
                
			<p class="clearfix">
            <input type="submit" id="submit" name="submit" value="Log in">
            </p>
            
            <?php if(isset($response)) echo "<h4 role='alert' class='alert'>" . $response . "</h4>"; ?>
        </form>
        
        <div role="alert" class="status">
        <?php if (isset($_GET['status']) && $_GET['status'] == 'logout') {echo "<p class=\"logout\">You have been logged out.</p>";} ?><br>
		<a class="home-link" href="../" title="Takes you back to the website homepage">Go back to website homepage</a>
        </div>
        
	</div><!--/container-->

	<?php include("../includes/jquery.php"); ?>

	<script src="../js/admin.js"></script>

</body>
</html>