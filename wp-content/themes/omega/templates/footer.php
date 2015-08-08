<!--<footer class="content-info" role="contentinfo">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
</footer>
-->

<!--<footer class="content-info" role="contentinfo">
  <div class="container">
  	<div class="row">
    	<div class="col-xs-12 col-sm-4 col-sm-push-8 col-md-2 col-md-push-10 col-lg-4 col-lg-push-8 social-link-container">
            area for social media
		</div>
	  	<div class="col-xs-12 col-sm-8 col-sm-pull-4 col-md-10 col-md-pull-2 col-lg-8 col-lg-pull-4 footer-link-container">
	    <?
		    //$id = array('en'=>4,'zh-hant'=>16,'zh-hans'=>14);
		    wp_nav_menu(array('menu' => 'footer_navigation','menu_class' => 'footer_link clearfix', 'depth' => 2));
	    ?>
		</div>
	</div>
    <div class="copyright">
    	<? //=get_field("copyright_text",4)?>
    	<span>|</span> <a href="#">Terms of Use</a>
        <span>|</span> <a href="#">Privacy Policy</a>
    </div>
  </div>
</footer>-->

<div class="footer clearfix container">
		<div class="copyright">Copyright &copy; 2014. www.omegacompliance.com. All rights reserved.</div>
		<div class="disclaimer"><a href="disclaimer.html">Disclaimer</a></div>
	</div>
<?php wp_footer(); ?> 