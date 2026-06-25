<?php
if ($_SESSION["CD_USUARIO"] == "") {
	echo "<script language='javascript'>window.open('login.php', '_self');</script>";
}
?>
<!--- INÍCIO FOOTER --->
<!--- COPYRIGHT --->

<head>
	<style>
		body {
			background-color: white;
		}
	</style>
</head>
<div class="copyrights">
	<div align="center">
		<span>© <?php echo date("Y"); ?> Grupo Pedro Muffato. Todos os direitos reservados.</span>
		<ul class="example-2">
			<li class="icon-content">
				<a href="https://www.youtube.com/@muffataoatacadista" target="_blank" aria-label="Youtube" data-social="youtube">
					<div class="filled"></div>
					<svg
						xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16" xml:space="preserve">
						<path
							d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"
							fill="currentColor"></path>
					</svg>
				</a>
				<div class="tooltip">Youtube</div>
			</li>
			<li class="icon-content">
				<a href="https://www.linkedin.com/company/muffat%C3%A3o-atacado-distribuidor/?viewAsMember=true" target="_blank" aria-label="Linkedin" data-social="linkedin">
					<div class="filled"></div>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
						<path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
					</svg>
				</a>
				<div class="tooltip">Linkedin</div>
			</li>
	</div>
</div>
<!--- FIM COPYRIGHT --->
<!--- FIM DO FOOTER --->
<!--- BOTAO VOLTAR AO TOPO --->
<a href="#" class="scrollup" title="Ir ao Topo"></a>
<!--- BOTÃO FLUTUANTE --->
<style type='text/css'>
	@import url(http://weloveiconfonts.com/api/?family=entypo);

	[class*="entypo-"]:before {
		font-family: 'entypo', sans-serif;
	}

	/* ---------- GERAL ---------- */
	#social-sidebar a {
		text-decoration: none;
	}

	#social-sidebar ul {
		list-style: none;
		margin: 0;
		padding: 0;
	}

	/* ---------- Sidebar ---------- */
	#social-sidebar {
		left: 0;
		margin-top: -110px;
		/* (li * a:width) / -2 */
		position: fixed;
		top: 50%;
	}

	#social-sidebar ul li:first-child a {
		border-radius: 0 5px 0 0;
	}

	#social-sidebar ul li:last-child a {
		border-radius: 0 0 5px 0;
	}

	#social-sidebar ul li a {
		background: #121212;
		color: #fff;
		display: block;
		height: 50px;
		font-size: 18px;
		line-height: 50px;
		position: relative;
		text-align: center;
		width: 50px;
	}

	#social-sidebar ul li a:hover span {
		left: 130%;
		opacity: 1;
	}

	#social-sidebar ul li a span {
		border-radius: 3px;
		line-height: 24px;
		left: -100%;
		margin-top: -16px;
		-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
		filter: alpha(opacity=0);
		opacity: 0;
		padding: 4px 8px;
		position: absolute;
		-webkit-transition: opacity .3s, left .4s;
		-moz-transition: opacity .3s, left .4s;
		-ms-transition: opacity .3s, left .4s;
		-o-transition: opacity .3s, left .4s;
		transition: opacity .3s, left .4s;
		top: 50%;
		z-index: -1;
	}

	#social-sidebar ul li a span:before {
		content: "";
		display: block;
		height: 8px;
		left: -4px;
		margin-top: -4px;
		position: absolute;
		top: 50%;
		-webkit-transform: rotate(45deg);
		-moz-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		-o-transform: rotate(45deg);
		transform: rotate(45deg);
		width: 8px;
		z-index: -2;
	}


	#social-sidebar ul li a[class*="linkedin"]:hover,
	#social-sidebar ul li a[class*="linkedin"] span,
	#social-sidebar ul li a[class*="linkedin"] span:before {
		background: #06C;
	}

</style>
<style type="text/css">
	#content2 {
		float: left;
		width: 100%;
	}

	.post {
		margin: 0 auto;
		padding-bottom: 50px;
		float: left;
		width: 960px;
	}

	.btn-sign {
		width: 150px;
		margin-bottom: 20px;
		margin: 0 auto;
		padding: 5px;
		border-radius: 0px;
		background: -moz-linear-gradient(center top, #00c6ff, #018eb6);
		background: -webkit-gradient(linear, left top, left bottom, from(#00c6ff), to(#018eb6));
		background: -o-linear-gradient(top, #00c6ff, #018eb6);
		filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#00c6ff', EndColorStr='#018eb6');
		text-align: center;
		font-size: 12px;
		color: #fff;
		text-transform: uppercase;
	}

	.btn-sign a {
		color: #fff;
		text-shadow: 0 1px 2px #161616;
	}

	#mask {
		display: none;
		background: #000;
		position: fixed;
		left: 0;
		top: 0;
		z-index: 10;
		width: 100%;
		height: 100%;
		opacity: 0.8;
		z-index: 999;
	}

	.login-popup {
		display: none;
		background: rgba(3, 0, 0, 0.87);
		padding: 10px;
		border: 2px solid #ddd;
		float: left;
		font-size: 1.2em;
		position: fixed;
		top: 50%;
		left: 50%;
		z-index: 99999;
		box-shadow: 0px 0px 20px #999;
		-moz-box-shadow: 0px 0px 20px #999;
		/* Firefox */
		-webkit-box-shadow: 0px 0px 20px #999;
		/* Safari, Chrome */
		border-radius: 3px 3px 3px 3px;
		-moz-border-radius: 3px;
		/* Firefox */
		-webkit-border-radius: 3px;
		/* Safari, Chrome */
	}

	img.btn_close {
		float: right;
		margin: -28px -28px 0 0;
	}

	fieldset {
		border: none;
	}

	form.signin .textbox label {
		display: block;
		padding-bottom: 7px;
	}

	form.signin .textbox span {
		display: block;
	}

	form.signin p,
	form.signin span {
		color: #999;
		font-size: 11px;
		line-height: 18px;
	}

	form.signin .textbox input {
		background: #666666;
		border-bottom: 1px solid #333;
		border-left: 1px solid #000;
		border-right: 1px solid #333;
		border-top: 1px solid #000;
		color: #fff;
		border-radius: 3px 3px 3px 3px;
		-moz-border-radius: 3px;
		-webkit-border-radius: 3px;
		font: 13px Arial, Helvetica, sans-serif;
		padding: 6px 6px 4px;
		width: 200px;
	}

	.button:hover {
		background: #ddd;
	}

	.example-2 {
		margin-top: 15px;
		list-style: none;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.example-2 .icon-content {
		margin: 0 10px;
		position: relative;
	}

	.example-2 .icon-content .tooltip {
		position: absolute;
		top: -30px;
		left: 50%;
		transform: translateX(-50%);
		color: #fff;
		padding: 6px 10px;
		border-radius: 5px;
		opacity: 0;
		visibility: hidden;
		font-size: 14px;
		transition: all 0.3s ease;
	}

	.example-2 .icon-content:hover .tooltip {
		opacity: 1;
		visibility: visible;
		top: -50px;
	}

	.example-2 .icon-content a {
		position: relative;
		overflow: hidden;
		display: flex;
		justify-content: center;
		align-items: center;
		width: 50px;
		height: 50px;
		border-radius: 50%;
		color: #4d4d4d;
		background-color: #fff;
		transition: all 0.3s ease-in-out;
	}

	.example-2 .icon-content a:hover {
		box-shadow: 3px 2px 45px 0px rgb(0 0 0 / 12%);
	}

	.example-2 .icon-content a svg {
		position: relative;
		z-index: 1;
		width: 30px;
		height: 30px;
	}

	.example-2 .icon-content a:hover {
		color: white;
	}

	.example-2 .icon-content a .filled {
		position: absolute;
		top: auto;
		bottom: 0;
		left: 0;
		width: 100%;
		height: 0;
		background-color: #000;
		transition: all 0.3s ease-in-out;
	}

	.example-2 .icon-content a:hover .filled {
		height: 100%;
	}

	.example-2 .icon-content a[data-social="youtube"] .filled,
	.example-2 .icon-content a[data-social="youtube"]~.tooltip {
		background-color: #ff0000;
	}

	.example-2 .icon-content a[data-social="linkedin"] .filled,
	.example-2 .icon-content a[data-social="linkedin"]~.tooltip {
		background-color: #0a66c2;
	}

	.copyrights {
		width: 100%;
		font-size: 14px;
		color: #858585;
		margin: 0;
		padding: 20px 0;
		background-color: #2e2e2e;
		box-sizing: border-box;
		overflow: hidden;
		display: flex;
		justify-content: center;
		align-items: center;
	}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('a.entypo-calendar').click(function() {

			// Getting the variable's value from a link 
			var loginBox = $(this).attr('href');
			//Fade in the Popup and add close button
			$(loginBox).fadeIn(300);

			//Set the center alignment padding + border
			var popMargTop = ($(loginBox).height() + 24) / 2;
			var popMargLeft = ($(loginBox).width() + 24) / 2;

			$(loginBox).css({
				'margin-top': -popMargTop,
				'margin-left': -popMargLeft
			});

			// Add the mask to body
			$('body').append('<div id="mask"></div>');
			$('#mask').fadeIn(300);

			return false;
		});

		// When clicking on the button close or the mask layer the popup closed
		//$('a.close, #mask').live('click', function() { 
		// $('#mask , .login-popup').fadeOut(300 , function() {
		//$('#mask').remove();  
		//}); 
		//return true;
		//});
	});
</script>