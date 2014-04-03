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
                    <h2>Viewing Clients</h2>
                    <nav class="view-nav"><strong>All</strong><a class="nav-opt" href="viewclients.php" title="Go back to the main client view">View Paginated</a></nav>
                    <hr>
                    <?php
						//connect to the database
						$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
						
						//query the database and if entries exist, display them
						if ($result = $mysqli->query("SELECT * FROM client_information ORDER BY id")) {
							if ($result->num_rows > 0) {
								echo "<table>";
								echo "<tr><th>ID</th><th>Client Name</th><th>Location</th><th>Description</th><th>Features</th><th>URL</th><th>Facebook</th><th>Twitter</th></tr>";
								while ($row = $result->fetch_object()) {
									echo "<tr>";
									echo "<td>" . $row->id . "</td>";
									echo "<td>" . $row->clientname . "</td>";
									echo "<td>" . $row->location . "</td>";
									echo "<td>" . $row->description . "</td>";
									echo "<td>" . $row->features . "</td>";
									echo "<td>" . $row->url . "</td>";
									echo "<td>" . $row->facebook . "</td>";
									echo "<td>" . $row->twitter . "</td>";
									echo "<td><a href='manageclients.php?id=" . $row->id . "'>Edit</a></td>";
									echo "<td><a href='functions/delete/client.php?id=" . $row->id . "'>Delete</a></td>";
									echo "</tr>";
								}
								echo "</table>";
								echo "<hr>";
							} else {
								echo "No clients have been found."; //show a message if no entries exist
							}
						} else {
							echo "Error: " . $mysqli->error; //show an error if there is an issue with the database query
						}
						$mysqli->close(); //close database connection
					?>
                </div><!--/content-->
        
			<?php include("includes/actionspanel.php"); ?>
        
            </div><!--/middle-->

		</div><!--/wrapper-->

</body>
</html>
