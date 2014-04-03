<!DOCTYPE html><!--Author: Rosie Ward-->
<html class="no-js"><!--DO NOT REMOVE THIS CLASS-->
    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Contact</title>
        <meta name="description" content="Tourism sales, marketing and representation in the United Kingdom. We want you to grow with us.">
        <meta name="keywords" content="marketing, advertising, representation, tourism, travel, holiday, destination, africa, talking, stick, talking stick, communication">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0">
        
		<?php include ("includes/favicons.php"); ?>
        
		<?php include ("includes/opengraph.php"); ?>
        
        <!--Prefetch DNS for external assets, revise later-->
        <link rel="dns-prefetch" href="//ajax.googleapis.com">
        <link rel="dns-prefetch" href="//connect.facebook.net">
        <link rel="dns-prefetch" href="//platform.twitter.com">
        <link rel="dns-prefetch" href="//cdn.api.twitter.com">
        <link rel="dns-prefetch" href="//translate.google.com">
        <link rel="dns-prefetch" href="//www.google-analytics.com">
        <link rel="dns-prefetch" href="//a.tiles.mapbox.com">
        
        <meta name="google-translate-customization" content="1a1d28b28ea4aff8-3b804a3574745b7b-g9dc950b4c976a8d2-21">
        <meta name="format-detection" content="telephone=no"><!--stops ios highlighting numbers-->
        
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/contact.css">
		
		<link type="text/plain" rel="author" href="humans.txt">
		
        <?php include_once ("includes/modernizr.php"); ?>

    </head>
    <body id="contact">
    
    <?php include_once ("includes/cookieconsent.php"); ?>
    
    	<div class="content-holder">
        	<div role="main" class="content">
    
				<?php require_once ("includes/header.php"); ?>
                
                <div id="hello" class="first-block">
                    <div class="wrap overlay">
                        <div class="container clearfix">
                            <div class="title">
                                <h1>Get in touch</h1>
                                <p>We're a friendly bunch here at Talking Stick, don't be afraid to say hello!</p>
                            </div>
                            
                            <div class="methods centre">
                                <!--contact methods?, popular ones are in the footer, up to you!-->
                        	</div>
                            
                        </div>
                    </div>
                </div><!--/hello-->
                
                <div id="find-us" class="wrap overlay">
                	<div class="container clearfix">
                    	<div class="title">
                        	<h1>Stop by</h1>
                            <p>70 Langdale Road | Cheltenham | GL51 3LY | United Kingdom<p>
                        </div>
                        <div class="map flex-map centre">>
                        	<iframe src="http://a.tiles.mapbox.com/v3/martinsherwood.map-9x8y72rj.html#15/51.888227898938915/-2.105222779464725"></iframe>
                        </div>
                    </div>                
                </div><!--/find-us-->
                
                <div id="contact-us" class="wrap overlay">
                	<div class="container clearfix">
                    	<div class="title">
                        	<h1>Say hello</h1>
                        </div>
                   
                   
                   <div id="form-wrap" > 
                   
            <form role="form" class="center clearfix">					

<form method="post" name="contact_form"
action="contact-form-handler.php">
   
    <div class="row"> 
    <input name="name" type="text" placeholder="Company Name" size="25"> 
 
   
    <input name="email" type="text" placeholder="Email" size="25"> 
    </div> 
    <!--/row-->
    
    
    <br> 
 
    <div class="row">
    <textarea name="message" placeholder="Your Message"></textarea> </div> <!--/row-->
 
    <input type="submit" value="Submit">
</form>  
</div> <!--/form-wrap--> 

                    
                           </div>
                </div>
                   
    		</div><!--/content-->
    	</div><!--/content-holder-->
         
        <?php require_once ("includes/footer.php"); ?>
            
        <?php include ("includes/jquery.php"); ?>
        
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        
		<?php include ("includes/translate.php"); ?>
        <?php include ("includes/analytics.php"); ?>
        
    </body>
</html>
<?php
$errors = '';
$myemail = 'yourname@website.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}
 
$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message = $_POST['message']; 
 
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
 
{
 
$to = $myemail;
 
$email_subject = "Contact form submission: $name";
 
$email_body = "You have received a new message. ".
 
" Here are the details:\n Name: $name \n ".
 
"Email: $email_address\n Message \n $message";
 
$headers = "From: $myemail\n";
 
$headers .= "Reply-To: $email_address";
 
mail($to,$email_subject,$email_body,$headers);
 
//redirect to the 'thank you' page
 
header('Location: contact-form-thank-you.html');
 
}

?> 