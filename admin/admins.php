<?php
require_once 'functions/membership.php';
$membership = new membership();
$membership->confirmMember();
include 'functions/salts.php';
?>

<?php
	//connect to the database
	$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

	//make a form function again
	function renderForm($username = '', $password = '', $error = '', $id = '') { ?>
	
	<!DOCTYPE html>
    <html class="no-js">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <title><?php if ($id != '') { echo "Edit Admin"; } else { echo "New Admin"; } ?></title>
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
							echo "<h2>List of Current Administrators</h2>";
							echo "<hr>";
                                //connect to the database
                                $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
                                
                                //query the database and if entries exist, display them
                                if ($result = $mysqli->query("SELECT * FROM admins ORDER BY id")) {
                                    if ($result->num_rows > 0) {
                                        echo "<table>";
                                        echo "<tr><th>ID</th><th>Username</th><th>Password (salted + hashed)</th></tr>";
                                        while ($row = $result->fetch_object()) {
                                            echo "<tr>";
                                            echo "<td>" . $row->id . "</td>";
                                            echo "<td>" . $row->username . "</td>";
                                            echo "<td>" . $row->password . "</td>";
                                            echo "<td><a href='admins.php?id=" . $row->id . "'>Change Password</a></td>";
                                            echo "<td><a href='functions/delete/admin.php?id=" . $row->id . "'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                        echo "<hr>";
                                    } else {
                                        echo "No admins have been found."; //show a message if no entries exist
                                    }
                                } else {
                                    echo "Error: " . $mysqli->error; //show an error if there is an issue with the database query
                                }
                                $mysqli->close(); //close database connection
                            ?>
							
							<h2><?php if ($id != '') { echo "Edit Administrator:"; } else { echo "New Administrator:"; } ?></h2>
                                <?php if ($error != '') { echo "<div class='error'>" . $error . "</div>";} ?>
                                        <form action="#" method="post" class="admin-form validate">
                                        	<?php if ($id != '') { ?>
                                            	<input type="hidden" name="id" value="<?php echo $id; ?>" readonly/>
                                            	<p><em>Currently editing administrator with the ID of: <strong><?php echo $id; ?></strong>, and username: <strong><?php echo $username; ?></strong></em></p>
                                            <?php } ?>
                                                <label for="username">Username: *</label>
                                                <input type="text" name="username" id="username" maxlength="32" placeholder="New username" value="<?php echo $username; ?>" tabindex="1" required>
                                                
                                                <label for="password">Password: *</label>
                                                <input type="text" name="password" id="password" placeholder="New password" value="" tabindex="2" autocomplete="off" required>
                                                
                                                <p>* Required field</p>
                                                <input type="submit" name="submit" value="Submit" tabindex="3">
                                        </form>
                				
        						    <?php }
				
									/*Edit Admin - if the 'id' variable is set in the URL*/
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
															$username = htmlentities($_POST['username'], ENT_QUOTES);
															$password = htmlentities($_POST['password'], ENT_QUOTES);
															
															//make sure fields aren't empty
															if ($username == '' || $password == '') {
																	$error = 'Error: Please fill in all required fields!';
																	renderForm($username = '', $password = '', $error, $id);
															}
															else {
																	//update the record in the database
																	if ($stmt = $mysqli->prepare("UPDATE admins SET username = ?, password = ? WHERE id = ?")) {
																			$stmt->bind_param("ssi", $username, hash('sha512', $password . $P_SALT . $S_SALT), $id);
																			$stmt->execute();
																			$stmt->close();
																	}
																	//if query error
																	else {
																		echo "Error: could not prepare SQL statement.";
																	}
																	
																	//redirect the user
																	header("Location: admins.php");
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
																			if($stmt = $mysqli->prepare("SELECT * FROM admins WHERE id = ?")) {
																					$stmt->bind_param("i", $id);
																					$stmt->execute();
																					
																					$stmt->bind_result($id, $username, $password, $date);
																					$stmt->fetch();
																					
																					renderForm($username, $password, NULL, $id);
																					
																					$stmt->close();
																			}
																			else {
																				echo "Error: could not prepare SQL statement";
																			}
																		}
																		//if the 'id' value is not valid, redirect the user back to admin home
																		else {
																			header("Location: admins.php");
																		}
																}
														}
														
														/*New Admin - if the 'id' variable is not set in the URL*/
														else {
																//if the form's submit button is clicked, we need to process the form
																if (isset($_POST['submit'])) {
																		//get the form data
																		$username = htmlentities($_POST['username'], ENT_QUOTES);
																		$password = htmlentities($_POST['password'], ENT_QUOTES);
																		
																		//check that the fields are not empty
																		if ($username == '' || $password == '') {
																				//if they are empty, show an error message and re-display the form
																				$error = 'Error: Please fill in all required fields.';
																				renderForm($username, $password, $error);
																		}
																		else {
																				//insert into the database
																				if ($stmt = $mysqli->prepare("INSERT admins (username, password) VALUES (?, ?)")) {
																						$stmt->bind_param("ss", $username, hash('sha512', $password . $P_SALT . $S_SALT));
																						$stmt->execute();
																						$stmt->close();
																				}
																				//show an error if the query has an error
																				else {
																						echo "Error: Could not prepare SQL statement.";
																				}
																				
																				//redirect the user
																				header("Location: admins.php");
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
