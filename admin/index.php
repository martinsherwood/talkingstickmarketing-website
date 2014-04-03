<?php
require_once 'functions/membership.php';
$membership = new membership();
$membership->confirmMember();
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Admin Control Panel</title>
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="../css/admin.css">
        
        <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
        
    </head>
    <body>
    	<div id="wrapper">

			<?php include("includes/header.php"); ?>

            <div id="main" class="clearfix">
        
                <div id="content">
                    <h2>Welcome to Admin Control Panel</h2>
                    <hr>
                    <p>Here you can add, edit and delete clients, edit basic website information and add news users to access this section of the website.</p>
                </div><!--/content-->
        
			<?php include("includes/actionspanel.php"); ?>
        
            </div><!--/main-->

		</div><!--/wrapper-->

</body>
</html>
