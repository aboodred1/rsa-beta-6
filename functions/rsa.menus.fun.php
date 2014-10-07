<?php
	
	function GetMainMenuBox()
	{
		global $rsa;
	?>
		<div id="main-menu">
			<?php GetMainMenu(); ?>
		</div>
		<div id="sub-menu"></div>
	<?php 
	}
	
	function GetMainMenu()
	{
		global $rsa;
		
		$menu = new Menus();
		
		$menu->MenuID = NULL;
		$menu->MenuSubID = "0";
		$menu->MenuType = NULL;
		$menu->MenuTitle = NULL;
		$menu->MenuActive = "Y";
		$menu->MenuTime = NULL;
		
		if(!$arr_menu = $menu->GetMenusByAll())
			return false; 
		else
		{
			echo "<ul>";
			
			for($i=0; $i<count($arr_menu)-1; $i++)
			{
				$valeu_Kind = "1";
				$value_MenuID = $arr_menu[$i]['MenuID'];
				$value_MenuSubID = $arr_menu[$i]['MenuSubID'];
				$value_MenuType = trim($arr_menu[$i]['MenuType']);
				$value_MenuTitle = trim($arr_menu[$i]['MenuTitle']);
				
				$value_Hash = "&#47;".$valeu_Kind."&#47;".$value_MenuType."&#47;".$value_MenuID."&#47;".$value_MenuSubID."&#47;".$value_MenuTitle;
				
				if($i != 0) 
					echo "<li class=\"spacer\"></li>";
				?>
				
				<li><a href="javascript:;" onclick="doMainMenu('<?php echo $value_Hash; ?>');">
					<?php echo $value_MenuTitle; ?></a></li>
				
				<?php
			}
			
			echo "</ul>";
		}
		
		return false;
	}
	
	function CheckSubMenu($feeds)
	{
		global $rsa;
		
		$menu = new Menus();
		
		$menu->MenuID = NULL;
		$menu->MenuSubID = $feeds['mains'];
		$menu->MenuType = NULL;
		$menu->MenuTitle = NULL;
		$menu->MenuActive = "Y";
		$menu->MenuTime = NULL;
		
		if(!$arr_menu = $menu->GetMenusByAll())
			return false; 
		else
			return true;
	
		return false;
	}
	
	/*************************************************************/
	
	function GetSubMenu($feeds)
	{
		global $rsa;
		
		$menu = new Menus();
		
		$menu->MenuID = NULL;
		$menu->MenuSubID = $feeds['mains'];
		$menu->MenuType = NULL;
		$menu->MenuTitle = NULL;
		$menu->MenuActive = "Y";
		$menu->MenuTime = NULL;
		
		if(!$arr_menu = $menu->GetMenusByAll())
			return false; 
		else
		{
			echo "<ul>";
			
			for($i=0; $i<count($arr_menu)-1; $i++)
			{
				$valeu_Kind = "1";
				$value_MenuID = $arr_menu[$i]['MenuID'];
				$value_MenuSubID = $arr_menu[$i]['MenuSubID'];
				$value_MenuType = trim($arr_menu[$i]['MenuType']);
				$value_MenuTitle = trim($arr_menu[$i]['MenuTitle']);
				
				$value_Hash = "&#47;".$valeu_Kind."&#47;".$value_MenuType."&#47;".$value_MenuID."&#47;".$value_MenuSubID."&#47;".$value_MenuTitle;
				?>
				<li><a href="javascript:;" onclick="doSubMenu('<?php echo $value_Hash; ?>');">
					<?php echo $value_MenuTitle; ?></a></li>
				<?php
			}
			
			echo "</ul>";
		}
		
		return false;
	}
	
	/*************************************************************/
	
	function GetContentSubWithPages($feeds)
	{
		global $rsa;
		
		$menu = new Menus();
		
		$menu->MenuID = $feeds['mains'];
		$menu->MenuSubID = NULL;
		$menu->MenuType = NULL;
		$menu->MenuTitle = NULL;
		$menu->MenuActive = "Y";
		$menu->MenuTime = NULL;
		
		if(!$arr_menu = $menu->GetMenusByAll())
			return false; 
		else
		{
			$valeu_Kind = "menu";
			$value_MenuID = $arr_menu[0]['MenuID'];
			$value_MenuSubID = $arr_menu[0]['MenuSubID'];
			$value_MenuType = trim($arr_menu[0]['MenuType']);
			$value_MenuTitle = trim($arr_menu[0]['MenuTitle']);
			$value_MenuBrief = trim($arr_menu[0]['MenuBrief']);
			//$value_MenuThumb = trim($arr_menu[0]['MenuThumb']);
			$value_MenuImage = trim($arr_menu[0]['MenuImage']);
			
			$value_MenuImage = $rsa['config']['local_userfiles']."menus/$value_MenuImage";
			
			?>
			<div id="sub-content" class="width820 height380" style="background:transparent url('<?php echo $value_MenuImage; ?>') no-repeat;">
				<ul>
					<li class="sub-content left height360">
						<h2><?php echo $value_MenuTitle; ?></h2>
						<div><?php echo $value_MenuBrief; ?></div>
					</li>
					<li class="sub-content right height360">
						<h2>Related Pages</h2>
						<div><?php echo GetPagesSubMenuList($feeds); ?></div>
					</li>
				</ul>
			</div>
			<?php
		}
		
		return false;
	}
	
	/*************************************************************/
	// main menu
	/*************************************************************/
	
	function GetContentMenuWithSub($feeds)
	{
		global $rsa;
		
		$menu = new Menus();
		
		$menu->MenuID = $feeds['mains'];
		$menu->MenuSubID = NULL;
		$menu->MenuType = NULL;
		$menu->MenuTitle = NULL;
		$menu->MenuActive = "Y";
		$menu->MenuTime = NULL;
		
		if(!$arr_menu = $menu->GetMenusByAll())
			return false; 
		else
		{
			$valeu_Kind = "menu";
			$value_MenuID = $arr_menu[0]['MenuID'];
			$value_MenuSubID = $arr_menu[0]['MenuSubID'];
			$value_MenuType = trim($arr_menu[0]['MenuType']);
			$value_MenuTitle = trim($arr_menu[0]['MenuTitle']);
			$value_MenuBrief = trim($arr_menu[0]['MenuBrief']);
			//$value_MenuThumb = trim($arr_menu[0]['MenuThumb']);
			$value_MenuImage = trim($arr_menu[0]['MenuImage']);
			
			$value_MenuImage = $rsa['config']['local_userfiles']."menus/$value_MenuImage";
			
			?>
			<div id="menu-content" class="width820 height380" style="background:transparent url('<?php echo $value_MenuImage; ?>') no-repeat;">
				<ul>
					<li class="menu-content left height360">
						<h2><?php echo $value_MenuTitle; ?></h2>
						<div><?php echo $value_MenuBrief; ?></div>
					</li>
					<li class="menu-content center height360">
						<?php GetMainMenuSubLinks($feeds); ?>
						<script type="text/javascript">
						$j("li.center li").mouseover(function(){
							$j(this).fadeOut("fast",function(){
								$j(this).fadeIn("fast");
							});
						});
						</script>
					</li>
					<li id="page-list" class="menu-content right height360"></li>
				</ul>
			</div>
			<?php
		}
		
		return false;
	}
	
	/*************************************************************/
	
	function GetContentMenu($feeds)
	{
		global $rsa;
		
		$menu = new Menus();
		
		$menu->MenuID = $feeds['mains'];
		$menu->MenuSubID = NULL;
		$menu->MenuType = NULL;
		$menu->MenuTitle = NULL;
		$menu->MenuActive = "Y";
		$menu->MenuTime = NULL;
		
		if(!$arr_menu = $menu->GetMenusByAll())
			return false; 
		else
		{
			$valeu_Kind = "menu";
			$value_MenuID = $arr_menu[0]['MenuID'];
			$value_MenuSubID = $arr_menu[0]['MenuSubID'];
			$value_MenuType = trim($arr_menu[0]['MenuType']);
			$value_MenuTitle = trim($arr_menu[0]['MenuTitle']);
			$value_MenuBrief = trim($arr_menu[0]['MenuBrief']);
			//$value_MenuThumb = trim($arr_menu[0]['MenuThumb']);
			$value_MenuImage = trim($arr_menu[0]['MenuImage']);
			
			$value_MenuImage = $rsa['config']['local_userfiles']."menus/$value_MenuImage";
			
			?>
			<div id="menu-static" class="width820 height380" style="background:transparent url('<?php echo $value_MenuImage; ?>') no-repeat;">
				<ul>
					<li class="menu-static left height360">
						<h2><?php echo $value_MenuTitle; ?></h2>
						<div><?php echo $value_MenuBrief; ?></div>
					</li>
					<li class="menu-static right height360">
						<?php echo GetMenuPhotosBox($feeds); ?>
					</li>
				</ul>
			</div>
			<?php
		}
		
		return false;
	}
	
	/*************************************************************/
	
	function GetMainMenuSubLinks($feeds)
	{
		global $rsa;
		
		$menu = new Menus();
		
		$menu->MenuID = NULL;
		$menu->MenuSubID = $feeds['mains'];
		$menu->MenuType = NULL;
		$menu->MenuTitle = NULL;
		$menu->MenuActive = "Y";
		$menu->MenuTime = NULL;
		
		if(!$arr_menu = $menu->GetMenusByAll())
			return false; 
		else
		{
			echo "<ul>";
			
			for($i=0; $i<count($arr_menu)-1; $i++)
			{
				$valeu_Kind = "2";
				$value_MenuID = $arr_menu[$i]['MenuID'];
				$value_MenuSubID = $arr_menu[$i]['MenuSubID'];
				$value_MenuType = trim($arr_menu[$i]['MenuType']);
				$value_MenuTitle = trim($arr_menu[$i]['MenuTitle']);
				
				$value_Hash = "&#47;".$valeu_Kind."&#47;".$value_MenuType."&#47;".$value_MenuID."&#47;".$value_MenuSubID."&#47;".$value_MenuTitle;
				?>
				<li><h3><a href="javascript:;" onclick="doSubMenuPageList('<?php echo $value_Hash; ?>');" title="<?php echo $value_MenuTitle; ?>">
						<?php echo $value_MenuTitle; ?></a></h3></li>
				<?php
			}
			
			echo "</ul>";
		}
		
		return false;
	}
	
	/*************************************************************/
	
	function GetContentMenuNews($feeds)
	{
		global $rsa;
		
		$menu = new Menus();
		
		$menu->MenuID = $feeds['mains'];
		$menu->MenuSubID = NULL;
		$menu->MenuType = NULL;
		$menu->MenuTitle = NULL;
		$menu->MenuActive = "Y";
		$menu->MenuTime = NULL;
		
		if(!$arr_menu = $menu->GetMenusByAll())
			return false; 
		else
		{
			$valeu_Kind = "menu";
			$value_MenuID = $arr_menu[0]['MenuID'];
			$value_MenuSubID = $arr_menu[0]['MenuSubID'];
			$value_MenuType = trim($arr_menu[0]['MenuType']);
			$value_MenuTitle = trim($arr_menu[0]['MenuTitle']);
			$value_MenuBrief = trim($arr_menu[0]['MenuBrief']);
			//$value_MenuThumb = trim($arr_menu[0]['MenuThumb']);
			$value_MenuImage = trim($arr_menu[0]['MenuImage']);
			
			$value_MenuImage = $rsa['config']['local_userfiles']."menus/$value_MenuImage";
			
			?>
			<div id="menu-news" class="width820 height380" style="background:transparent url('<?php echo $value_MenuImage; ?>') no-repeat;">
				<ul>
					<li class="menu-news left height360">
						<h2><?php echo $value_MenuTitle; ?></h2>
						<div><?php echo $value_MenuBrief; ?></div>
					</li>
					<li class="menu-news center height360">
						<h2>Featured News</h2>
						<div><?php GetFeaturedNewsList($feeds); ?></div>
					</li>
					<li class="menu-news right height360">
						<h2>Recent News</h2>
						<div><?php GetRecentNewsList($feeds); ?></div>
					</li>
				</ul>
			</div>
			<?php
		}
		
		return false;
	}
	
	/*************************************************************/
	
	function GetContentMenuContacts($feeds)
	{
		global $rsa;
		
		$menu = new Menus();
		
		$menu->MenuID = $feeds['mains'];
		$menu->MenuSubID = NULL;
		$menu->MenuType = NULL;
		$menu->MenuTitle = NULL;
		$menu->MenuActive = "Y";
		$menu->MenuTime = NULL;
		
		if(!$arr_menu = $menu->GetMenusByAll())
			return false; 
		else
		{
			$valeu_Kind = "menu";
			$value_MenuID = $arr_menu[0]['MenuID'];
			$value_MenuSubID = $arr_menu[0]['MenuSubID'];
			$value_MenuType = trim($arr_menu[0]['MenuType']);
			$value_MenuTitle = trim($arr_menu[0]['MenuTitle']);
			$value_MenuBrief = trim($arr_menu[0]['MenuBrief']);
			//$value_MenuThumb = trim($arr_menu[0]['MenuThumb']);
			$value_MenuImage = trim($arr_menu[0]['MenuImage']);
			
			$value_MenuImage = $rsa['config']['local_userfiles']."menus/$value_MenuImage";
			
			?>
			<div id="menu-contacts" class="width820 height380" style="background:transparent url('<?php echo $value_MenuImage; ?>') no-repeat;">
				<ul>
					<li class="menu-contacts left height360">
						<h2><?php echo $value_MenuTitle; ?></h2>
						<div><?php echo $value_MenuBrief; ?></div>
					</li>
					<li class="menu-contacts right height360">
						<h2>Contact Box</h2>
						<?php GetContactsBox(); ?>
					</li>
				</ul>
			</div>
			<?php
		}
		
		return false;
	}
	
	/*************************************************************/
	
	function GetContentMenuTeams($feeds)
	{
		global $rsa;
		
		$menu = new Menus();
		
		$menu->MenuID = $feeds['mains'];
		$menu->MenuSubID = NULL;
		$menu->MenuType = NULL;
		$menu->MenuTitle = NULL;
		$menu->MenuActive = "Y";
		$menu->MenuTime = NULL;
		
		if(!$arr_menu = $menu->GetMenusByAll())
			return false; 
		else
		{
			$valeu_Kind = "menu";
			$value_MenuID = $arr_menu[0]['MenuID'];
			$value_MenuSubID = $arr_menu[0]['MenuSubID'];
			$value_MenuType = trim($arr_menu[0]['MenuType']);
			$value_MenuTitle = trim($arr_menu[0]['MenuTitle']);
			$value_MenuBrief = trim($arr_menu[0]['MenuBrief']);
			
			$value_MenuImage = trim($arr_menu[0]['MenuImage']);
			
			$value_MenuImage = $rsa['config']['local_userfiles']."menus/$value_MenuImage";
			
			$feeds_teams = GetTeamsBox();
			
			?>
			<div id="menu-teams" class="width820 height380" style="background:transparent url('<?php echo $value_MenuImage; ?>') no-repeat;">
				<ul>
					<li class="menu-teams left height360">
						<h2><?php echo $value_MenuTitle; ?></h2>
						<div><?php echo $value_MenuBrief; ?></div>
					</li>
					<li class="menu-teams center height360">
						<h2>Team List</h2>
						<div><?php GetTeamsList($feeds_teams,$feeds); ?></div>
					</li>
					<li class="menu-teams right height360">
						<h2>Team Box</h2>
						<div id="pane-target" class="pane"><?php GetTeamsDetails($feeds_teams,$feeds); ?></div>
					</li>
				</ul>
			</div>
			<?php
		}
		
		return false;
	}
	
	/*************************************************************/
	
	function GetContentMenuFiles($feeds)
	{
		global $rsa;
		
		$menu = new Menus();
		
		$menu->MenuID = $feeds['mains'];
		$menu->MenuSubID = NULL;
		$menu->MenuType = NULL;
		$menu->MenuTitle = NULL;
		$menu->MenuActive = "Y";
		$menu->MenuTime = NULL;
		
		if(!$arr_menu = $menu->GetMenusByAll())
			return false; 
		else
		{
			$valeu_Kind = "menu";
			$value_MenuID = $arr_menu[0]['MenuID'];
			$value_MenuSubID = $arr_menu[0]['MenuSubID'];
			$value_MenuType = trim($arr_menu[0]['MenuType']);
			$value_MenuTitle = trim($arr_menu[0]['MenuTitle']);
			$value_MenuBrief = trim($arr_menu[0]['MenuBrief']);
			//$value_MenuThumb = trim($arr_menu[0]['MenuThumb']);
			$value_MenuImage = trim($arr_menu[0]['MenuImage']);
			
			$value_MenuImage = $rsa['config']['local_userfiles']."menus/$value_MenuImage";
			
			?>
			<div id="menu-files" class="width820 height380" style="background:transparent url('<?php echo $value_MenuImage; ?>') no-repeat;">
				<ul>
					<li class="menu-files top">
						<h2><?php echo $value_MenuTitle; ?></h2>
						<div><?php echo $value_MenuBrief; ?></div>
						<br/>
					</li>
					<li class="menu-files bottom" style="">
						<div class="float-clear height100"><?php GetFilesBox($feeds); ?></div>
					</li>
				</ul>
			</div>
			<?php
		}
		
		return false;
	}
	
	/*************************************************************/
	
	function GetContentMenuPortfolio($feeds)
	{
		global $rsa;
		
		$menu = new Menus();
		
		$menu->MenuID = $feeds['mains'];
		$menu->MenuSubID = NULL;
		$menu->MenuType = NULL;
		$menu->MenuTitle = NULL;
		$menu->MenuActive = "Y";
		$menu->MenuTime = NULL;
		
		if(!$arr_menu = $menu->GetMenusByAll())
			return false; 
		else
		{
			$valeu_Kind = "menu";
			$value_MenuID = $arr_menu[0]['MenuID'];
			$value_MenuSubID = $arr_menu[0]['MenuSubID'];
			$value_MenuType = trim($arr_menu[0]['MenuType']);
			$value_MenuTitle = trim($arr_menu[0]['MenuTitle']);
			$value_MenuBrief = trim($arr_menu[0]['MenuBrief']);
			//$value_MenuThumb = trim($arr_menu[0]['MenuThumb']);
			$value_MenuImage = trim($arr_menu[0]['MenuImage']);
			
			$value_MenuImage = $rsa['config']['local_userfiles']."menus/$value_MenuImage";
			
			?>
			<div id="menu-portfolio" class="width820 height380" style="background:transparent url('<?php echo $value_MenuImage; ?>') no-repeat;">
				<ul>
					<li class="menu-portfolio top width820">
						<h2><?php echo $value_MenuTitle; ?></h2>
						<div><?php echo $value_MenuBrief; ?></div>
					</li>
					<li class="menu-portfolio bottom width820">
						<h2>Contact Box</h2>
						<?php GetContactsBox(); ?>
					</li>
				</ul>
			</div>
			<?php
		}
		
		return false;
	}
	
	/*************************************************************/
	

?>