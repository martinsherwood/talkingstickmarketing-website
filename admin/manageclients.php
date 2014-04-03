<?php
require_once 'functions/membership.php';
$membership = new membership();
$membership->confirmMember();
?>

<?php
	//connect to the database
	$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

	//creates the form, used multiple times so its a function
	function renderForm($clientname = '', $location = '', $description = '', $features = '', $url = '', $facebook = '', $twitter = '', $error = '', $id = '') { ?>
	
	<!DOCTYPE html>
    <html class="no-js">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <title><?php if ($id != '') { echo "Edit Client"; } else { echo "New Client"; } ?></title>
            <meta name="viewport" content="width=device-width">

            <link rel="stylesheet" href="../css/admin.css">
            
            <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
            
        </head>
        <body>
            <div id="wrapper">
            	<?php include("includes/header.php"); ?>        
                	<div id="main" class="clearfix">
                    	<div id="content">
							<h2><?php if ($id != '') { echo "Edit Client"; } else { echo "New Client"; } ?></h2>
                            <hr>
                                <?php if ($error != '') { echo "<div class='error'>" . $error . "</div>";} ?>
                                        <form action="#" method="post" class="client-form">
                                        	<?php if ($id != '') { ?>
                                            	<input type="hidden" name="id" value="<?php echo $id; ?>" readonly/>
                                            	<p><em>Currently editing client with the ID of: <strong><?php echo $id; ?></strong>, and name: <strong><?php echo $clientname; ?></strong></em></p>
                                            <?php } ?>
                                                <label for="clientname">Client Name: *</label>
                                                <input type="text" name="clientname" id="clientname" value="<?php echo $clientname; ?>" tabindex="1" required>
                                                
                                                <label for="location">Location: *</label>
                                                <input type="text" name="location" id="location" value="<?php echo $location; ?>" tabindex="2" required>
                                                
                                                <label for="description">Description: *</label> 
                                                <textarea name="description" id="description" wrap="soft" spellcheck="true" tabindex="3" required><?php echo $description; ?></textarea>
                                                
                                                <label for="features">Features: *</label>
                                                <textarea name="features" id="features" wrap="soft" spellcheck="true" tabindex="4" required><?php echo $features; ?></textarea>
                                                
                                                <label for="url">URL (web address): *</label>
                                                <input type="url" name="url" id="url" value="<?php echo $url; ?>" tabindex="5" required> Enter the full URL.

                                                <label for="facebook">Facebook:</label>
                                                <input type="url" name="facebook" id="facebook" value="<?php echo $facebook; ?>" tabindex="6"> Enter the full address.
                                                
                                                <label for="twitter">Twitter:</label>
                                                <input type="url" name="twitter" id="twitter" value="<?php echo $twitter; ?>" tabindex="7"> Enter the full address.
  
                                                <p>* Required field</p>
                                                <input type="submit" name="submit" value="Submit" tabindex="8">
                                        </form>
                				
        						    <?php }
				
				/*Edit Client - if the 'id' variable is set in the URL*/
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
										$clientname = htmlentities($_POST['clientname'], ENT_QUOTES);
										$location = htmlentities($_POST['location'], ENT_QUOTES);
										$description = htmlentities($_POST['description'], ENT_QUOTES);
										$features = htmlentities($_POST['features'], ENT_QUOTES);
										$url = htmlentities($_POST['url'], ENT_QUOTES);
										$facebook = htmlentities($_POST['facebook'], ENT_QUOTES);
										$twitter = htmlentities($_POST['twitter'], ENT_QUOTES);
										
										
										//make sure fields aren't empty
										if ($clientname == '' || $location == '' || $description == '' || $features == '' || $url == '' || $facebook == '' || $twitter == '') {
												$error = 'Error: Please fill in all required fields!';
												renderForm($clientname = '', $location = '', $description = '', $features = '', $url = '', $facebook = '', $twitter = '', $error, $id);
										}
										else {
												//update the record in the database
												if ($stmt = $mysqli->prepare("UPDATE client_information SET clientname = ?, location = ?, description = ?, features = ?, url = ?, facebook = ?, twitter = ? WHERE id = ?")) {
														$stmt->bind_param("sssssssi", $clientname, $location, $description, $features, $url, $facebook, $twitter, $id);
														$stmt->execute();
														$stmt->close();
												}
												//if query error
												else {
													echo "Error: could not prepare SQL statement.";
												}
												
												//redirect the user
												header("Location: viewclients.php");
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
														if($stmt = $mysqli->prepare("SELECT * FROM client_information WHERE id=?")) {
																$stmt->bind_param("i", $id);
																$stmt->execute();
																
																$stmt->bind_result($id, $clientname, $location, $description, $features, $url, $facebook, $twitter);
																$stmt->fetch();
																
																renderForm($clientname, $location, $description, $features, $url, $facebook, $twitter, NULL, $id);
																
																$stmt->close();
														}
														else {
															echo "Error: could not prepare SQL statement";
														}
													}
													//if the 'id' value is not valid, redirect the user back to admin home
													else {
														header("Location: index.php");
													}
											}
									}

								
								/*New Client - if the 'id' variable is not set in the URL*/
								else {
										//if the form's submit button is clicked, we need to process the form
										if (isset($_POST['submit'])) {
												//get the form data
												$clientname = htmlentities($_POST['clientname'], ENT_QUOTES);
												$location = htmlentities($_POST['location'], ENT_QUOTES);
												$description = htmlentities($_POST['description'], ENT_QUOTES);
												$features = htmlentities($_POST['features'], ENT_QUOTES);
												$url = htmlentities($_POST['url'], ENT_QUOTES);
												$facebook = htmlentities($_POST['facebook'], ENT_QUOTES);
												$twitter = htmlentities($_POST['twitter'], ENT_QUOTES);
												
												//check that the fields are not empty, || $facebook == '' || $twitter == ''
												if ($clientname == '' || $location == '' || $description == '' || $features == '' || $url == '') {
														//if they are empty, show an error message and re-display the form
														$error = 'Error: Please fill in all required fields.';
														renderForm($clientname, $location, $description, $features, $url, $facebook, $twitter, $error);
												}
												else {
														//insert into the database
														if ($stmt = $mysqli->prepare("INSERT client_information (clientname, location, description, features, url, facebook, twitter) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
																$stmt->bind_param("sssssss", $clientname, $location, $description, $features, $url, $facebook, $twitter);
																$stmt->execute();
																$stmt->close();
														}
														//show an error if the query has an error
														else {
																echo "Error: Could not prepare SQL statement.";
														}
														
														//redirect the user
														header("Location: viewclients.php");
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
