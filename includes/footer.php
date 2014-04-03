            <footer class="wrap overlay-nobg site-footer">
            	<div class="container clearfix">
                	<div role="contentinfo" class="text float-left">
                        <div class="sub-nav">
                            <a href="sitemap">Sitemap</a> |
                            <a href="terms">Terms &amp; Conditions</a> |
                            <a href="privacy">Privacy</a> |
                            <a href="text">Text</a>
                        </div>
                    	<p class="no-select">&#169; Copyright <?php copyright(); ?>, Talking Stick Marketing.</p>
                        <div id="google_translate_element" class="no-select"></div>
                    </div><!--/foot-text-->
                    <div role="complementary" class="contact-links float-right">
                    	<ul itemscope itemtype="http://schema.org/LocalBusiness">
                    		<li><i class="icon-envelope"></i><a itemprop="email" href="mailto:hello@talkingstickmktg.com">hello@talkingstickmktg.com</a></li>
                        	<li><i class="icon-phone"></i><a itemprop="telephone" href="tel:+44-1242-506444">+44-1242-506444</a></li>
                        	<li><i class="icon-facebook-sign"></i><a itemprop="url" href="https://www.facebook.com/TalkingStickMktg" target="_blank" rel="nofollow">TalkingStickMktg</a></li>
                        	<li><i class="icon-twitter-sign"></i><a itemprop="url" href="https://twitter.com/TalkingStickMkt" target="_blank" rel="nofollow">&#64;TalkingStickMkt</a></li>
                        </ul>
                    </div>
                </div><!--/container-->
            </footer>
            
            <!--copyright year function-->
    		<?php function copyright($year = 'auto') {
					if(intval($year) == 'auto'){ $year = date('Y'); }
					if(intval($year) == date('Y')){ echo intval($year); }
					if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); }
					if(intval($year) > date('Y')){ echo date('Y'); }
				}
			?>