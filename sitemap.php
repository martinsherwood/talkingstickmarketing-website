<!DOCTYPE html><!--Author: Martin Sherwood-->
<html class="no-js"><!--DO NOT REMOVE THIS CLASS-->
    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Sitemap</title>
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
        <link rel="stylesheet" href="css/sitemap.css">
		
		<link type="text/plain" rel="author" href="humans.txt">
		
        <?php include_once ("includes/modernizr.php"); ?>

    </head>
    <body id="sitemap">
    
    <?php include_once ("includes/cookieconsent.php"); ?>
    
    	<div class="content-holder">
        	<div role="main" class="content">
    
				<?php require_once ("includes/header.php"); ?>
                
                <div id="main-map" class="first-block">
                    <div class="wrap overlay">
                        <div class="container clearfix">
                            <div class="title">
                                <h1>Sitemap</h1>
                            </div>
                            
                            <div class="main-links">
                                <div class="heading">
                                    <i class="icon-link icon-4x pull-left"></i>
                                    <h2>Main</h2>
                                    <p>Our site</p>
                                </div>
                                    <ul class="link-collection">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="clients">Clients</a></li>
                                        <li><a href="about">About</a></li>
                                        <li><a href="blog">Blog</a></li>
                                        <li><a href="contact">Contact</a></li>
                                        <li><a href="terms">Terms &amp; Conditions</a></li>
                                        <li><a href="privacy">Privacy</a></li>
                                        <li><a href="sitemap">Sitemap</a></li> 
                                    </ul>
                            </div><!--/main-links-->
                            
                            <div class="social-links">
                                <div class="heading">
                                    <i class="icon-globe icon-4x pull-left"></i>
                                    <h2>Social</h2>
                                    <p>Our networks</p>
                                </div>
                                    <ul class="link-collection"><!--these links will be generated from the database eventually-->
                                        <li><a href="https://www.facebook.com/TalkingStickMktg" target="_blank" rel="nofollow">Facebook</a></li>
                                        <li><a href="https://twitter.com/TalkingStickMkt" target="_blank" rel="nofollow">Twitter</a></li>
                                        <li><a href="#" target="_blank" rel="nofollow">Pinterest</a></li> <!--waiting for links from client-->
                                        <li><a href="#" target="_blank" rel="nofollow">Flickr</a></li>
                                        <li><a href="#" target="_blank" rel="nofollow">YouTube</a></li>
                                    </ul>
                            </div><!--/social-links-->
                            
                            <div class="client-links">
                                <div class="heading">
                                    <i class="icon-group icon-4x pull-left"></i>
                                    <h2>Clients</h2>
                                    <p>Our clients</p>
                                </div>
                                    <ul class="link-collection"><!--these links will be generated from the database eventually-->
                                        <li><a href="#">a client name</a></li>
                                        <li><a href="#">a client name</a></li>
                                        <li><a href="#">a client name</a></li>
                                        <li><a href="#">a client name</a></li>
                                    </ul>
                            </div><!--/client-links-->
                              
                        </div>
                    </div>
                </div><!--/main-map-->
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