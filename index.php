<?php
	require_once("onload.php");
	require_once("header.php");
?>
<body id="page">
<div id="frame" class="width850">
<div id="container" class="width850">
	<form id="frmMain" name="frmMain" action="" method="post">
	<div id="header-dialog" class="">
		<div class="dialog type1">
		<div class="content">
		<div class="t"></div>
			<div id="header">
				<div id="logo">
					<a href="#home_page" onclick="doHomePage();">
						<img src="<?php echo $rsa['config']['local_userfiles']."images/logo.png"; ?>" width="180" height="100"/></a>	
				</div>
				<div id="menu-box">
					<?php  GetMainMenuBox(); ?>
				</div>
			</div>
			<!-- header -->			
		</div>
		<div class="b"><div></div></div>
		</div>
		<!-- dialog -->
	</div>
	<div id="center-dialog" class="">
		<div class="dialog type2">
		<div class="content">
		<div class="t"></div>
			<div class="width820 height400">
				<div id="center" class="width820 height380">
					<?php GetFeaturedBox(); ?>
				</div>
				<!-- center -->	
			</div>	
		</div>
		<div class="b"><div></div></div>
		</div>
		<!-- dialog -->
	</div>
	<div id="footer-dialog" class="">
		<div class="dialog type3">
		<div class="content">
		<div class="t"></div>
			<div id="footer" class="width820">
				<br/><br/>
				<center><span>Copyright &copy 2008 RSA Properties Investments.</span></center>
				<br/>
			</div>
			<!-- footer -->			
		</div>
		<div class="b"><div></div></div>
		</div>
		<!-- dialog -->
	</div>
	<div style="margin-top:-5px;">
		<img src="<?php echo $rsa['config']['local_userfiles']."images/footer_shadow.png"; ?>" width="850" height="52" /></div>
	</form>
</div>
</div>
<div id="loading"></div>
</body>
<?php
	require_once("footer.php");	
	require_once("unload.php");
?>