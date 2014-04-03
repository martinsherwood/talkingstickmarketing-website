<?php
$ua = $_SERVER['HTTP_USER_AGENT'];
?>

<!DOCTYPE html><!--Author: Martin Sherwood-->
<html class="no-js"><!--DO NOT REMOVE THIS CLASS-->
    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Talking Stick Marketing</title>
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
		<link rel="stylesheet" href="css/index.css">
        
		<link type="text/plain" rel="author" href="humans.txt">
		
        <?php include_once ("includes/modernizr.php"); ?>
        
    </head>
    <body id="home">
    
	<?php include_once ("includes/cookieconsent.php"); ?>
    
    	<div class="content-holder">
        	<div role="main" class="content">

				<?php require_once ("includes/header.php"); ?>
                
                <div role="marquee" class="wrap banner-bg clearfix">
                    <div id="banner-text" class="clearfix">
                        <span class="banner-line notranslate">Hi, we're Talking Stick Marketing.</span>
                        <span class="banner-line">We help you build your brand.</span>
                        <span class="banner-line">Locally and nationally.</span>
                        <a href="#welcome"><span class="banner-link">Learn More</span></a>
                        <a href="contact"><span class="banner-link">Get Started With Us</span></a>
                    </div><!--/lead-text-->
                </div><!--/banner-->

                <div id="welcome" class="wrap overlay first-block">
                    <div class="container clearfix">
                        <div class="title">
                            <h1>More about us</h1>
                            <p>We offer comprehensive representation, marketing and sales solutions for the tourism and hospitality industry in the United Kingdom. We tailor make all our marketing plans in conjunction with our clients to ensure that it suits their budgets and meets their goals. We are personally on hand at all times to support our clients’ interests, and ensure that they get the maximum exposure and return on investment that they demand in this highly competitive market.</p>
                        </div>
                    </div>
                </div><!--/welcome-->
                
                <div id="places" class="wrap overlay-nobg">
                    <div class="container clearfix">
                        <div class="title">
                            <h1>Amazing places</h1>
                            <p>We have some fantastic clients on our side, from trains to parks and spas to hotels, you're bound to fit in!</p>
                        </div>
                    </div>
                    <div class="slider no-select"><!--the jquery is called on this class-->
                        <ul><!--add another list item to add additional slides-->
                            <li>
                                <figure><img src="img/slides/slide-1.jpg" alt="Restaurant Killa WasiSol &amp; Luna Lodge Spa" title="Restaurant Killa WasiSol &amp; Luna Lodge Spa"/>
                                    <figcaption>Restaurant Killa WasiSol and Luna Lodge Spa</figcaption>
                                </figure>
                            </li>
                            <li>
                                <figure><img src="img/slides/slide-2.jpg" alt="Sol &amp; Luna, Casitas Deluxe con la luz de la tarde" title="Sol &amp; Luna, Casitas Deluxe"/>
                                    <figcaption>Sol and Luna, Casitas Deluxe</figcaption>
                                </figure>
                            </li>
                            <li>
                                <figure><img src="img/slides/slide-3.jpg" alt="Casitas Estandarsol &amp; Luna lodge Spa, sendero a las casitas estandar" title="Casitas Estandarsol &amp; Luna lodge Spa"/>
                                    <figcaption>Casitas Estandarsol and Luna Lodge Spa</figcaption>
                                </figure>
                            </li>
                            <li>
                                <figure><img src="img/slides/slide-4.jpg" alt="Casitas Deluxe, con la luz de la tarde" title="Casitas Deluxe"/>
                                    <figcaption>Casitas Deluxe and Luna Lodge Spa</figcaption>
                                </figure>
                            </li>
                            <li>
                                <figure><img src="img/slides/slide-5.jpg" alt="Sol &amp; Luna Lodge Spa, vista panoramica de Yacu Wasi" title="Sol &amp; Luna Lodge Spa"/>
                                    <figcaption>Sol and Luna Lodge Spa</figcaption>
                                </figure>
                            </li>
                            <li>
                                <figure><img src="img/slides/slide-6.jpg" alt="Wayra, vista lateral del restaurante" title="Wayra, vista lateral del restaurante"/>
                                    <figcaption>Wayra, vista lateral del restaurante</figcaption>
                                </figure>
                            </li> 
                        </ul>
                    </div>
                </div><!--/places-->
                
                <div id="latest-tweets" class="wrap overlay">
                    <div class="container clearfix">
                        <div class="title">
                            <h1>Latest from twitter</h1>
                            <img class="bird centre" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Twitter Bird"/>
                        </div>
                        <div class="tweets centre"><!--this div gets populated via json-->
                        </div>
                    </div>
                </div><!--/latest-tweets-->
    
                <div id="social" class="wrap overlay">
                    <div class="container clearfix">
                        <div class="title">
                            <h1>Find us on</h1>
                        </div>
                        <ul class="centre">
                            <li><a href="https://www.facebook.com/TalkingStickMktg" target="_blank" rel="nofollow"><img class="facebook" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Join us on Facebook" title="Join us on Facebook"/></a></li>
                            <li><a href="https://twitter.com/TalkingStickMkt" target="_blank" rel="nofollow"><img class="twitter" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Follow us on Twitter" title="Follow us on Twitter"/></a></li>
                            <li><a href="#" target="_blank" rel="nofollow"><img class="pinterest" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Follow us on Pinterest" title="Follow us on Pinterest"/></a></li>
                            <li><a href="#" target="_blank" rel="nofollow"><img class="flickr" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Follow us on Flickr" title="Follow us on Flickr"/></a></li>
                            <li><a href="#" target="_blank" rel="nofollow"><img class="youtube" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Subscribe to us on YouTube" title="Subscribe to us on YouTube"/></a></li>
                        </ul>
                    </div>
                </div><!--/social-->
            
        	</div><!--/content-->
    	</div><!--/contentholder-->
        
        <?php require_once ("includes/footer.php"); ?>

        <?php include ("includes/jquery.php");?>
        
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        
		<?php include ("includes/translate.php"); ?>
        <?php include ("includes/analytics.php"); ?>
        
    </body>
</html>