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
<script Language="Javascript">
    jQuery.extend(
     {
      /**
       * @see  ?javascript???????json???
       * @param ?????,??object,array,string,function,number,boolean,regexp
       * @return ??json???
       */
      toJSON : function (object)
      {
       var type = typeof object;
       if ('object' == type)
       {
        if (object === null) return 'null';		// added by sunny 2010-02-19, handle null property
        if (Array == object.constructor)
         type = 'array';
        else if (RegExp == object.constructor)
         type = 'regexp';
        else
         type = 'object';
       }
       switch(type)
       {
        case 'undefined':
        case 'unknown':
          return;
          break;
        case 'function':
        case 'boolean':
        case 'regexp':
          return object.toString();
          break;
        case 'number':
          return isFinite(object) ? object.toString() : 'null';
          break;
        case 'string':
          return '"' + object.replace(/(\\|\")/g,"\\$1").replace(/\n|\r|\t/g,
           function(){
                     var a = arguments[0];
            return  (a == '\n') ? '\\n':
                           (a == '\r') ? '\\r':
                           (a == '\t') ? '\\t': ""
                 }) + '"';
          break;
        case 'object':
          if (object === null) return 'null';
            var results = [];
            for (var property in object) {
              var value = jQuery.toJSON(object[property]);
              if (value !== undefined)
                results.push(jQuery.toJSON(property) + ':' + value);
            }
            return '{' + results.join(',') + '}';
          break;
        case 'array':
          var results = [];
            for(var i = 0; i < object.length; i++)
          {
          var value = jQuery.toJSON(object[i]);
               if (value !== undefined) results.push(value);
          }
          return '[' + results.join(',') + ']';
          break;
        }
      }
    });
	
	function isIE () {
		var myNav = navigator.userAgent.toLowerCase();
		return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
	}

	function forgot_password() {
			if (isIE () == 8) {
				alert("You are using an outdated browser that our website is not supported. Please upgrade your browser.\nWe supports many browsers such as Microsoft Internet Explorer 9 to 11, Microsoft Edge, Google Chrome, Mozilla Firefox and other modern browsers.");
				return false;
			}
	
//      alert("forgot_password");
			var ls_param =  $.toJSON({"as_user_login" : $("#loginName2").val(), "as_email" : $("#email").val() });
//      alert("forgot_password ls_param: " + ls_param);
			$.ajax({ 
			  type: "POST",
			  url: "https://connex.omegacompliance.com/userwebsvc.asmx/ForgetPwd",
			  crossDomain: true,
			  data: ls_param,
			  contentType: "application/json; charset=utf-8",
			  dataType: "json",
			  cache: false,
			  success: function(as_result) {
				  if (as_result === "OK") {
					$("#forget_err_message").html("A new password will be sent to your email address in a few minutes");
//              alert("forgot_password_ok");
				  } else {
					$("#forget_err_message").html(as_result);
//              alert("forgot_password_fail");
				  }
				},
			  error: function(XMLHttpRequest, textStatus, errorThrown) {
				   $("#forget_err_message").html(XMLHttpRequest.responseText);
//          alert("forgot_password_ajax_error:" + XMLHttpRequest.responseText);
				}
			});
		}
		  
		function f_login() {
			if (isIE () == 8) {
				alert("You are using an outdated browser that our website is not supported. Please upgrade your browser.\nWe supports many browsers such as Microsoft Internet Explorer 9 to 11, Microsoft Edge, Google Chrome, Mozilla Firefox and other modern browsers.");
				return false;
			}
		
//      alert("login");
			//$.support.cors = true;
			var ls_param =  $.toJSON({"as_user_id" : $("#loginName").val(), "as_password" : $("#password").val() });
//      alert("login ls_param: " + ls_param);
			$.ajax({ 
				type: "POST",
				url: "https://connex.omegacompliance.com/ncnUserWebSvc.asmx/RemoteLogin",
                //url: "https://connex.omegacompliance.com/ncnUserWebSvc2.asmx",
				//url: "https://uattw.weconnor.com/newconnex/ncnUserWebSvc.asmx/RemoteLogin",
				data: ls_param,
				contentType: "application/json; charset=utf-8",
				dataType: "json",
				xhrFields: {
					withCredentials: true
				},
				crossDomain: true,
				cache: false,
				success: function(as_result) {
						if (as_result === "OK") {
							//success
							window.location.assign("https://connex.omegacompliance.com/ncnmenu.aspx");
							//window.location.assign("https://uattw.weconnor.com/newconnex/ncnmenu.aspx");
						} else if (as_result === "OKEXP") {
							window.location.assign("https://connex.omegacompliance.com/ncnmenu.aspx?pop=changepwd");
							//window.location.assign("https://uattw.weconnor.com/newconnex/ncnmenu.aspx?pop=changepwd");
						} else {
							$("#login_err_message").html(as_result);
//              alert("login_fail");
						}
					}, 
				error: function(XMLHttpRequest, textStatus, errorThrown) {
						$("#login_err_message").html(XMLHttpRequest.responseText);
//alert("login_ajax_error:" + textStatus);
					}
			});
		}
</script>
<div id="login">
	<form id="Form1" action="" method="POST">
		<table cellpadding="0" cellspacing="0" border="0" class="loginTable" width="100%">
			<tr>
				<td rowspan="4" class="tableTitle" width="40%">CLIENT LOGIN</td>
				<td colspan=2><input type="text" value="USERNAME" id="loginName" name="t_user" /></td>
			</tr>
			<tr>
				<td colspan=2><input type="text" value="PASSWORD" id="password" name="t_pwd" /></td>
			</tr>
			<tr>
				<td colspan=2><input type="submit" value="LOGIN" id="btn-login" onclick="f_login();return false;"/></td>
			</tr>
			<tr>
				<td><font color="red"><span id="login_err_message">
				 <!--[if lt IE 9]>
					You are using an outdated browser that our website is not supported. Please upgrade your browser. We supports many browsers such as Microsoft Internet Explorer 9 to 11, Microsoft Edge, Google Chrome, Mozilla Firefox and other modern browsers.
				 <![endif]--></span></font></td>
				<td style="text-align:right"><a href="#" class="forgetPassword">FORGOT PASSWORD?</a></td>
			</tr>
		</table>
	</form>
	<form id="Form2" action="" method="POST">
		<table cellpadding="0" cellspacing="0" border="0" class="loginTable" width="100%">
			<tr>
				<td rowspan="5" class="tableTitle" width="40%">FORGOT YOUR PASSWORD?</td>
				<td><input type="text" value="USER ID" id="loginName2" name="t_userid" /></td>
			</tr>
			<tr>
				<td><input type="text" value="EMAIL" id="email" name="t_email" /></td>
			</tr>
			<tr>
				<td><input type="submit" id="btn-get-possword" value="GET NEW PASSWORD" onclick="forgot_password();return false;"/><input type="cancel" id="btn-cancel" value="CANCEL"/></td>
			</tr>
			<tr>
				<td><font color="red"><span id="forget_err_message">
				 <!--[if lt IE 9]>
					You are using an outdated browser that our website is not supported. Please upgrade your browser. We supports many browsers such as Microsoft Internet Explorer 9 to 11, Microsoft Edge, Google Chrome, Mozilla Firefox and other modern browsers.
				 <![endif]--></span></font></td>
			</tr>
			<tr>
				<td><font color='white'>If you have forgotten your Login, please email Omega IT Support at <a href="mailto:technical@omegacompliance.com">technical@omegacompliance.com</a></font></td>
			</tr>
		</table>
	</form>
</div>
<div class="footer clearfix container">
		<div class="linkedin-container">
			<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
<script type="IN/FollowCompany" data-id="481192"></script>
        </div>
		<div class="copyright">Copyright &copy; 2014. www.omegacompliance.com. All rights reserved.</div>
		<div class="disclaimer"><a href="<?=site_url()?>/disclaimer/">Disclaimer</a></div>
	</div>
<?php wp_footer(); ?> 