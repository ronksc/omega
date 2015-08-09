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
<div id="login">
	<form id="Form1" action="" method="POST">
		<table cellpadding="0" cellspacing="0" border="0" class="loginTable" width="435">
			<tr>
				<td rowspan="4" class="tableTitle" width="40%">CLIENT LOGIN</td>
				<td colspan=2><input type="text" value="USERNAME" id="loginName" name="t_user" /></td>
			</tr>
			<tr>
				<td colspan=2><input type="text" value="PASSWORD" id="password" name="t_pwd" /></td>
			</tr>
			<tr>
				<td colspan=2><input type="submit" value="LOGIN" id="btn-login" onclick="javascript:f_login();return false;"/></td>
			</tr>
			<tr>
				<td><font color="red"><span id="login_err_message"></span></font></td>
				<td style="text-align:right"><a href="#" class="forgetPassword">FORGOT PASSWORD?</a></td>
			</tr>
		</table>
	</form>
	<form id="Form2" action="" method="POST">
		<table cellpadding="0" cellspacing="0" border="0" class="loginTable" width="435">
			<tr>
				<td rowspan="5" class="tableTitle" width="40%">FORGOT YOUR PASSWORD?</td>
				<td><input type="text" value="USER ID" id="loginName2" name="t_userid" /></td>
			</tr>
			<tr>
				<td><input type="text" value="EMAIL" id="email" name="t_email" /></td>
			</tr>
			<tr>
				<td><input type="submit" id="btn-get-possword" value="GET NEW PASSWORD" onclick="javascript:forgot_password();return false;"/><input type="cancel" id="btn-cancel" value="CANCEL"/></td>
			</tr>
			<tr>
				<td><font color="red"><span id="forget_err_message"></span></font></td>
			</tr>
			<tr>
				<td><font color='white'>If you have forgotten your Login, please email Omega IT Support at <a href="mailto:technical@omegacompliance.com">technical@omegacompliance.com</a></font></td>
			</tr>
		</table>
	</form>
</div>
<div class="footer clearfix container">
		<div class="copyright">Copyright &copy; 2014. www.omegacompliance.com. All rights reserved.</div>
		<div class="disclaimer"><a href="disclaimer.html">Disclaimer</a></div>
	</div>
<?php wp_footer(); ?> 