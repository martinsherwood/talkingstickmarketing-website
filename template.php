<!DOCTYPE html><!--Author: Martin Sherwood-->
<html class="no-js"><!--DO NOT REMOVE THIS CLASS-->
    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Page Title</title>
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
        
        <meta name="google-translate-customization" content="1a1d28b28ea4aff8-3b804a3574745b7b-g9dc950b4c976a8d2-21">
        <meta name="format-detection" content="telephone=no"><!--stops ios highlighting numbers-->
        
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/template.css"> <!--change this-->
		
		<link type="text/plain" rel="author" href="humans.txt">
		
        <?php include_once ("includes/modernizr.php"); ?>

    </head>
    <body id="page-id-here">
    
    <?php include_once ("includes/cookieconsent.php"); ?>
    
    	<div class="content-holder">
        	<div role="main" class="content">
    
				<?php require_once ("includes/header.php"); ?>
                
                <div id="a-content-id" class="first-block">
                    <div class="wrap overlay">
                        <div class="container clearfix">
                            <div class="title">
                                <h1>Heading of page, if needed</h1>
                                <p>if you want some small entry text, add here. Looks good without it though!</p>
                            </div>
                            
                            <!--YOUR CONTENT HERE
                            
                                Seperate words in ID and class names with a dash, all lower case as caps can cause weird issues sometimes, keep them short if you can as its cleaner and easier to code with
                                
                                I've put all/most colour values with RGB or RGBA, if alpha channel is needed for a desired effect, nice converter here, http://rem.im/rgb2hex.html, IE8 and below doesn't support RGBA so provide fall backs for any major elements
                                
                                There's a host of reusable classes in the main.css file
                                
                                Headings h1 to h4 are styled and respond to viewports
                                
                                p tags and body text are styled, p looks better for text, more readable
                                
                                Font-awesome icons is installed, http://fortawesome.github.com/Font-Awesome/
                                
                                Add your styles to template.css, save as new files + change author
                                
                                ---
                                
                                Hope this helps!
                                
                                This comment can be deleted!                 
                            
                            -->
                            
                        </div>
                    </div>
                </div><!--/end-->
                
                <!--another block here and so on-->
                  
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