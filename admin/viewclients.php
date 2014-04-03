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
                    <hr>
					<?php
						//connect to the database
						$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
						
						//number of results to show per page
						$perPage = 10;
						
						//figure out the total pages in the database
						if ($result = $mysqli->query("SELECT * FROM client_information ORDER BY id")) {
							if ($result->num_rows != 0) {
								$totalResults = $result->num_rows;
								//ceil() returns the next highest integer value by rounding up value if necessary
								$totalPages = ceil($totalResults / $perPage);
								
								//check if the 'page' variable is set in the URL (ex: view-paginated.php?page=1)
								if (isset($_GET['page']) && is_numeric($_GET['page'])) {
									$showPage = $_GET['page'];
									
									//make sure the $showPage value is valid
									if ($showPage > 0 && $showPage <= $totalPages) {
										$start = ($showPage - 1) * $perPage;
										$end = $start + $perPage;
									} else {
										$start = 0;	//error - show first set of results
										$end = $perPage;
									}
								} else {	
									$start = 0; //if page isn't set, show first set of results
									$end = $perPage;
								}
								
								//display pagination
								echo "<nav class='view-nav'><strong>Page: </strong>";
								for ($i = 1; $i <= $totalPages; $i++) {
									if (isset($_GET['page']) && $_GET['page'] == $i) {
										echo $i . " ";
									} else {
										echo "<a href='viewclients.php?page=$i'>$i</a>, ";
									}
								}
								//echo "</p>";
								echo "<a class='nav-opt' href='viewclients-all.php' title='View all clients at once on a single page'>View All</a>"; 
								echo "</nav>";
								echo "<hr>";
								//display data in table
								echo "<div id='view'>";
								/*?>echo "<span class='heading'>ID</span><span class='heading'>Client Name</span><span class='heading'>Location</span><span class='heading'>Description</span><span class='heading'>Features</span><span class='heading'>URL</span><span class='heading'>Facebook</span><span class='heading'>Twitter</span>";<?php */
								
								//loop through results of database query 
								for ($i = $start; $i < $end; $i++) {
									//make sure that PHP doesn't try to show results that don't exist
									if ($i == $totalResults) {
										break;
									}
									
									$result->data_seek($i); //find specific row
									$row = $result->fetch_row();
									
									//echo out the contents
									echo "<div class='client'>";
									echo "<p>" . "<span>ID: </span>" . $row[0] . "</p>";
									echo "<p>" . "<span>Client Name: </span>" . $row[1] . "</p>";
									echo "<p>" . "<span>Location: </span>" . $row[2] . "</p>";
									echo "<p>" . "<span class='block'>Description: </span>" . $row[3] . "</p>";
									echo "<p>" . "<span class='block'>Features: </span>" . $row[4] . "</p>";
									echo "<p>" . "<span>URL: </span>" . $row[5] . "</p>";
									echo "<p>" . "<span>Facebook: </span>" . $row[6] . "</p>";
									echo "<p>" . "<span>Twitter: </span>" . $row[7] . "</p>";
									echo '<div class="options"><a href="manageclients.php?id=' . $row[0] . '">Edit</a> | ';
									echo '<a href="functions/delete/client.php?id=' . $row[0] . '">Delete</a></div>';
									echo "</div>";
								}
								
								//close
								echo "</div>";
							} else {
								echo "No clients have been found.";
							}
						}
						//error with the query
						else {
							echo "Error: " . $mysqli->error;
						}
						
						// close database connection
						$mysqli->close();
                    ?>

                </div><!--/content-->
        
			<?php include("includes/actionspanel.php"); ?>
        
            </div><!--/middle-->
		</div><!--/wrapper-->
</body>
</html>
