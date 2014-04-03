<?php
require_once 'functions/membership.php';
$membership = new membership();
$membership->confirmMember();
?>

<?php
	//connect to the database
	$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

	//make a form function again
	function renderForm($network = '', $url = '', $error = '', $id = '') { ?>
	
	<!DOCTYPE html>
    <html class="no-js">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <title><?php if ($id != '') { echo "Edit Network"; } else { echo "New Network"; } ?></title>
            <meta name="viewport" content="width=device-width">

            <link rel="stylesheet" href="../css/admin.css">
            
            <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
            
        </head>
        <body>
            <div id="wrapper">
            	<?php include("includes/header.php"); ?>        
                	<div id="main" class="clearfix">
                    	<div id="content">
							<?php
							echo "<h2>Current Social Networks</h2>";
							echo "<hr>";
                                //connect to the database
                                $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
                                
                                //query the database and if entries exist, display them
                                if ($result = $mysqli->query("SELECT * FROM social_networks ORDER BY id")) {
                                    if ($result->num_rows > 0) {
                                        echo "<table>";
                                        echo "<tr><th>ID</th><th>Network</th><th>URL</th></tr>";
                                        while ($row = $result->fetch_object()) {
                                            echo "<tr>";
                                            echo "<td>" . $row->id . "</td>";
                                            echo "<td>" . $row->network . "</td>";
                                            echo "<td>" . $row->url . "</td>";
                                            echo "<td><a href='social.php?id=" . $row->id . "'>Edit</a></td>";
                                            echo "<td><a href='functions/delete/socialnetwork.php?id=" . $row->id . "'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                        echo "<hr>";
                                    } else {
                                        echo "No networks have been found."; //show a message if no entries exist
                                    }
                                } else {
                                    echo "Error: " . $mysqli->error; //show an error if there is an issue with the database query
                                }
                                $mysqli->close(); //close database connection
                            ?>
							
							<h2><?php if ($id != '') { echo "Edit Network:"; } else { echo "New Network:"; } ?></h2>
                                <?php if ($error != '') { echo "<div class='error'>" . $error . "</div>";} ?>
                                        <form action="#" method="post" class="social-form validate">
                                        	<?php if ($id != '') { ?>
                                            	<input type="hidden" name="id" value="<?php echo $id; ?>" readonly/>
                                            	<p><em>Currently editing: <strong><?php echo $network; ?></strong></em></p>
                                            <?php } ?>
                                                <label for="network">Network Name: *</label>
                                                <input type="text" name="network" id="network" placeholder="Network name" value="<?php echo $network; ?>" tabindex="1" required readonly>
                                                
                                                <label for="url">URL: *</label>
                                                <input type="text" name="url" id="url" placeholder="Network address" value="<?php echo $url; ?>" tabindex="2" required>
                                                
                                                <p>* Required field</p>
                                                <input type="submit" name="submit" value="Submit" tabindex="3">
                                        </form>
                				
        						    <?php }
				
									/*Edit Network - if the 'id' variable is set in the URL*/
									if (isset($_GET['id']))
									{
											//process the form
											if (isset($_POST['submit']))
											{
													//check the id
													if (is_numeric($_POST['id']))
													{
															//get variables from form
															$id = $_POST['id'];
															$network = htmlentities($_POST['network'], ENT_QUOTES);
															$url = htmlentities($_POST['url'], ENT_QUOTES);
															
															//make sure fields aren't empty
															if ($network == '' || $url == '') {
																	$error = 'Error: Please fill in all required fields!';
																	renderForm($network = '', $ul = '', $error, $id);
															}
															else {
																	//update the record in the database
																	if ($stmt = $mysqli->prepare("UPDATE social_networks SET network = ?, url = ? WHERE id = ?")) {
																			$stmt->bind_param("ssi", $network, $url, $id);
																			$stmt->execute();
																			$stmt->close();
																	}
																	//if query error
																	else {
																		echo "Error: could not prepare SQL statement.";
																	}
																	
																	//redirect the user
																	header("Location: social.php");
																	}
																	
																	}
																		//if the 'id' is not valid, show an error message
																		else {
																			echo "Error: Not a valid ID";
																		}
																	}
																	
																	//get information from database
																	else {
																		if (is_numeric($_GET['id']) && $_GET['id'] > 0) {	
																			$id = $_GET['id']; //get id from URL
																			
																			//query the database
																			if($stmt = $mysqli->prepare("SELECT * FROM social_networks WHERE id = ?")) {
																					$stmt->bind_param("i", $id);
																					$stmt->execute();
																					
																					$stmt->bind_result($id, $network, $url);
																					$stmt->fetch();
																					
																					renderForm($network, $url, NULL, $id);
																					
																					$stmt->close();
																			}
																			else {
																				echo "Error: could not prepare SQL statement";
																			}
																		}
																		//if the 'id' value is not valid, redirect
																		else {
																			header("Location: social.php");
																		}
																}
														}
														
														/*New Network - if the 'id' variable is not set in the URL*/
														else {
																//if the form's submit button is clicked, we need to process the form
																if (isset($_POST['submit'])) {
																		//get the form data
																		$network = htmlentities($_POST['network'], ENT_QUOTES);
																		$url = htmlentities($_POST['url'], ENT_QUOTES);
																		
																		//check that the fields are not empty
																		if ($network == '' || $url == '') {
																				//if they are empty, show an error message and re-display the form
																				$error = 'Error: Please fill in all required fields.';
																				renderForm($network, $url, $error);
																		}
																		else {
																				//insert into the database
																				if ($stmt = $mysqli->prepare("INSERT social_networks (network, url) VALUES (?, ?)")) {
																						$stmt->bind_param("ss", $network, $url);
																						$stmt->execute();
																						$stmt->close();
																				}
																				//show an error if the query has an error
																				else {
																						echo "Error: Could not prepare SQL statement.";
																				}
																				
																				//redirect the user
																				header("Location: social.php");
																		}
																		
																}
																//if the form hasn't been submitted yet, show the form
																else {
																	renderForm();
																}
														}
														
														//close the connection
														$mysqli->close();
													?>
   
                    </div><!--/content-->
                    <?php include("includes/actionspanel.php"); ?>  
                </div><!--/main-->	
		</div><!--/wrapper-->

</body>
</html>
