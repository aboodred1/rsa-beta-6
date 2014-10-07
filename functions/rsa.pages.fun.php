<?php
	
	/*
	$page->PageID = 0;
	$page->MenuID = 0;
	$page->PageType = "";
	$page->PageTitle = "";
	$page->PageBrief = "";
	$page->PageDescription = "";
	$page->PageThumb = "";
	$page->PageImage = "";
	$page->PageOrder = "";
	$page->PageFeatured = "Y";
	$page->PageActive = "Y";
	$page->PageTime = "";
	*/

	function GetFeaturedBox()
	{
		global $rsa;
		?>
		
		<script type="text/javascript">	
		
			jQuery(function( $ ){
			
				$('#featured').serialScroll({
					target:'#featured-sec',
					items:'li', //selector to the items ( relative to the matched elements, '#sections' in this case )
					axis:'x',//the default is 'y'
					queue:false,//we scroll on both axes, scroll both at the same time.
					event:'mousemove',//on which event to react (click is the default, you probably won't need to specify it)
					stop:false,//each click will stop any previous animations of the target. (false by default)
					lock:true, //ignore events if already animating (true by default)
					duration:700,//length of the animation (if you scroll 2 axes and use queue, then each axis take half this time)
					start: 0, //on which element (index) to begin ( 0 is the default, redundant in this case )
					force:true, //force a scroll to the element specified by 'start' (some browsers don't reset on refreshes)
					cycle:true,//cycle endlessly ( constant velocity, true is the default )
					step:1, //how many items to scroll each time ( 1 is the default, no need to specify )
					jump:false, //if true, items become clickable (or w/e 'event' is, and when activated, the pane scrolls to them)
					lazy:false,//(default) if true, the plugin looks for the items on each event(allows AJAX or JS content, or reordering)
					interval:false, //it's the number of milliseconds to automatically go to the next
					navigation:'#featured-nav li',
					constant:true,
					onBefore:function( e, elem, $pane, $items, pos ){
						e.preventDefault();
						if( this.blur )
							this.blur();
					},
					onAfter:function( elem ){
						$j("DIV.fadeOut").fadeOut("slow").show("slow");
					}
				});
			});
	
		</script>
		
		<div id="featured">
			<div id="featured-sec" class="width820 height380">
				<?php $feeds_featured = GetFeaturedSlides(); ?>
			</div>
			<div id="featured-left" class="height360">
				<div class="text">
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
					Suspendisse et turpis sed metus fermentum pellentesque.</p>
				</div>
				<div id="featured-nav">
					<?php GetFeaturedNavigation($feeds_featured); ?>
				</div>
			</div>
		</div>
		
		<?php
	}
	
	/*************************************************************/
	
	function GetFeaturedNavigation($arr_page)
	{
		global $rsa;
		
		echo "<ul>";
		
		for($i=0; $i<count($arr_page)-1; $i++)
		{
			$valeu_Kind = "1";
			$value_PageID = $arr_page[$i]['PageID'];
			$value_MenuID = $arr_page[$i]['MenuID'];
			$value_PageType = $arr_page[$i]['PageType'];
			$value_PageTitle = $arr_page[$i]['PageTitle'];
			
			$value_Hash = "&#47;".$valeu_Kind."&#47;".$value_PageType."&#47;".$value_MenuID."&#47;".$value_PageID."&#47;".$value_PageTitle;
			
			?>
			<li onclick="doPageContent('<?php echo $value_Hash; ?>');"><span><?php echo $value_PageTitle; ?></span></li>
			<?php
		}
		
		echo "</ul>";
		
		return false;
	}
	
	/*************************************************************/
	
	function GetFeaturedSlides()
	{
		global $rsa;
		
		$page = new Pages();
		
		$page->PageID = NULL;
		$page->MenuID = NULL;
		$page->PageType = "portfolio";
		$page->PageTitle = NULL;
		$page->PageFeatured = "Y";
		$page->PageActive = "Y";
		$page->PageTime = NULL;
		$page->PageOrder = "rand()";
		$page->PageLimit = "4";
		
		if(!$arr_page = $page->GetPagesByAll())
			return false; 
		else
		{	
			echo "<ul>";
			
			for($i=0; $i<count($arr_page)-1; $i++)
			{
				$valeu_Kind = "page";
				$value_PageID = $arr_page[$i]['PageID'];
				$value_MenuID = $arr_page[$i]['MenuID'];
				$value_PageType = $arr_page[$i]['PageType'];
				$value_PageTitle = $arr_page[$i]['PageTitle'];
				$value_PageBrief = $arr_page[$i]['PageBrief'];
				$value_PageThumb = $arr_page[$i]['PageThumb'];
				$value_PageImage = $arr_page[$i]['PageImage'];
				
				$value_Hash = "&#47;".$valeu_Kind."&#47;".$value_PageType."&#47;".$value_MenuID."&#47;".$value_PageID."&#47;".$value_PageTitle;
				
				$value_PageImage = $rsa['config']['local_userfiles']."pages/$value_PageImage";
				
				?>
				<li style="background:transparent url('<?php echo $value_PageImage; ?>') no-repeat;">
					<table class="featured-table width820 height380" cellpadding="0" cellspacing="0">
						<tr>
		 					<td class="left"></td>
		 					<td class="right">
		 						<div class="fadeOut"><?php echo $value_PageBrief; ?></div>
		 					</td>
						</tr>
					</table>
				</li>
				<?php
			}
			
			echo "</ul>";
		}
		
		return $arr_page;
	}
	
	/*************************************************************/
	
	function CheckPages($feeds)
	{
		global $rsa;
		
		$page = new Pages();
		
		$page->PageID = NULL;
		$page->MenuID = $feeds['mains'];
		$page->PageType = NULL;
		$page->PageTitle = NULL;
		$page->PageFeatured = NULL;
		$page->PageActive = "Y";
		$page->PageTime = NULL;
		//$page->PageOrder = NULL;
		//$page->PageLimit = "";
		
		if(!$arr_page = $page->GetPagesByAll())
			return false; 
		else
			return true;
		
		return false;
	}
	
	
	/*************************************************************/
	
	function GetPageContent($feeds)
	{
		global $rsa;
		
		$page = new Pages();
		
		$page->PageID = $feeds['subs'];
		$page->MenuID = NULL;
		$page->PageType = NULL;
		$page->PageTitle = NULL;
		$page->PageFeatured = NULL;
		$page->PageActive = "Y";
		$page->PageTime = NULL;
		
		if(!$arr_page = $page->GetPagesByAll())
			return false; 
		else
		{
			$valeu_Kind = "1";
			$value_PageID = $arr_page[0]['PageID'];
			$value_MenuID = $arr_page[0]['MenuID'];
			$value_PageType = $arr_page[0]['PageType'];
			$value_PageTitle = trim($arr_page[0]['PageTitle']);
			$value_PageBrief = trim($arr_page[0]['PageBrief']);
			$value_PageDescription = trim($arr_page[0]['PageDescription']);
	
			$value_PageImage = trim($arr_page[0]['PageImage']);
			
			$value_PageImage = $rsa['config']['local_userfiles']."pages/$value_PageImage";
			
			?>
			<div id="page-content" class="width820 height380" style="background:transparent url('<?php echo $value_PageImage; ?>') no-repeat;">
				<ul>
					<li class="page-content left height360">
						<h2><?php echo $value_PageTitle; ?></h2>
						<div><?php echo $value_PageDescription; ?></div>
					</li>
					<li class="page-content right height360">
						<h2></h2>
						<div><?php GetPageGalleriesBox($feeds); ?></div>
					</li>
				</ul>
			</div>
			<?php
		}
		
		//return false;
	}
	
	/*************************************************************/
	
	function GetSubMenuPagesList($feeds)
	{
		global $rsa;
		
		$page = new Pages();
		
		$page->PageID = NULL;
		$page->MenuID = $feeds['mains'];
		$page->PageType = NULL;
		$page->PageTitle = NULL;
		$page->PageFeatured = NULL;
		$page->PageActive = "Y";
		$page->PageTime = NULL;
		//$page->PageOrder = NULL;
		//$page->PageLimit = "";
		
		if(!$arr_page = $page->GetPagesByAll())
			return false; 
		else
		{
			echo "<ul>";
			
			for($i=0; $i<count($arr_page)-1; $i++)
			{
				
				$valeu_Kind = "1";
				$value_PageID = $arr_page[$i]['PageID'];
				$value_MenuID = $arr_page[$i]['MenuID'];
				$value_PageType = $arr_page[$i]['PageType'];
				$value_PageTitle = $arr_page[$i]['PageTitle'];
				$value_PageBrief = $arr_page[$i]['PageBrief'];
				$value_PageThumb = $arr_page[$i]['PageThumb'];
				//$value_PageImage = $arr_page[$i]['PageImage'];
				
				$value_Hash = "&#47;".$valeu_Kind."&#47;".$value_PageType."&#47;".$value_MenuID."&#47;".$value_PageID."&#47;".$value_PageTitle;
				
				$value_PageThumb = $rsa['config']['local_userfiles']."pages/$value_PageThumb";
				?>
				
				<li class="float-clear" onclick="doPageContent('<?php echo $value_Hash; ?>');">
					<img src="<?php echo $value_PageThumb; ?>" alt="<?php echo $value_PageTitle; ?>" width="80" height="80" class="float-left" />
					<span class="">
						<span style="display:block;"><a href="javascript:;" title="<?php echo $value_PageTitle; ?>">
							<?php echo $value_PageTitle; ?></a></span>
						<span style="display:block;"><?php echo $value_PageBrief; ?></span>
					</span>
				</li>
				
				<?php
				
			}
			echo '<script type="text/javascript">
					$j("li.right li img").mouseover(function(){
						$j(this).fadeOut("fast",function(){
							$j(this).fadeIn("fast");
						});
					});
			</script>';
			echo "</ul>";
		}
		
		return false;
	}
	
	/*************************************************************/
	
	function GetFeaturedNewsList($feeds)
	{
		global $rsa;
		
		$page = new Pages();
		
		$page->PageID = NULL;
		$page->MenuID = $feeds['mains'];
		$page->PageType = "news";
		$page->PageTitle = NULL;
		$page->PageFeatured = "Y";
		$page->PageActive = "Y";
		$page->PageTime = NULL;
		//$page->PageOrder = NULL;
		$page->PageLimit = "4";
		
		if(!$arr_page = $page->GetPagesByAll())
			return false; 
		else
		{
			echo "<ul>";
			
			for($i=0; $i<count($arr_page)-1; $i++)
			{
				$valeu_Kind = "0";
				$value_PageID = $arr_page[$i]['PageID'];
				$value_MenuID = $arr_page[$i]['MenuID'];
				$value_PageType = $arr_page[$i]['PageType'];
				$value_PageTitle = $arr_page[$i]['PageTitle'];
				$value_PageBrief = $arr_page[$i]['PageBrief'];
				$value_PageThumb = $arr_page[$i]['PageThumb'];
				//$value_PageImage = $arr_page[$i]['PageImage'];
				
				$value_Hash = "&#47;".$valeu_Kind."&#47;".$value_PageType."&#47;".$value_MenuID."&#47;".$value_PageID."&#47;".$value_PageTitle;
				
				$value_PageThumb = $rsa['config']['local_userfiles']."pages/$value_PageThumb";
				
				?>
				
				<li style="padding-bottom: 10px;" onclick="alert('<?php echo $value_Hash; ?>');">
					<img class="float-left" src="<?php echo $value_PageThumb; ?>" width="80" height="80" />
					<span style="display:block;"><?php echo $value_PageTitle; ?></span>
					<span><?php echo $value_PageBrief; ?></span>
					<br class="float-clear"/>
				</li>
				
				<?php
			}
			
			echo "</ul>";
		}
		
		return false;
	}
	
	/*************************************************************/
	
	function GetRecentNewsList($feeds)
	{
		global $rsa;
		
		$page = new Pages();
		
		$page->PageID = NULL;
		$page->MenuID = $feeds['mains'];
		$page->PageType = "news";
		$page->PageTitle = NULL;
		$page->PageFeatured = "N";
		$page->PageActive = "Y";
		$page->PageTime = NULL;
		$page->PageOrder = array('PageTime'=>"DESC");
		$page->PageLimit = "8";
		
		if(!$arr_page = $page->GetPagesByAll())
			return false; 
		else
		{
			echo "<ul>";
			
			for($i=0; $i<count($arr_page)-1; $i++)
			{
				$valeu_Kind = "0";
				$value_PageID = $arr_page[$i]['PageID'];
				$value_MenuID = $arr_page[$i]['MenuID'];
				$value_PageType = $arr_page[$i]['PageType'];
				$value_PageTitle = $arr_page[$i]['PageTitle'];
				$value_PageBrief = $arr_page[$i]['PageBrief'];

				
				$value_Hash = "&#47;".$valeu_Kind."&#47;".$value_PageType."&#47;".$value_MenuID."&#47;".$value_PageID."&#47;".$value_PageTitle;
				?>
				
				<li style="padding-bottom: 10px;" onclick="alert('<?php echo $value_Hash; ?>');">
					<span style="display:block;"><?php echo $value_PageTitle; ?></span>
					<span><?php echo $value_PageBrief; ?></span>
				</li>
				
				<?php
			}
			
			echo "</ul>";
		}
	}
	
	/*************************************************************/
	
	function GetPagesSubMenuList($feeds)
	{
		global $rsa;
		
		$page = new Pages();
		
		$page->PageID = NULL;
		$page->MenuID = $feeds['mains'];
		$page->PageType = NULL;
		$page->PageTitle = NULL;
		$page->PageFeatured = NULL;
		$page->PageActive = "Y";
		$page->PageTime = NULL;
		$page->PageOrder = array('PageTime'=>"DESC");
		$page->PageLimit = "8";
		
		if(!$arr_page = $page->GetPagesByAll())
			return false; 
		else
		{
			echo "<ul>";
			
			for($i=0; $i<count($arr_page)-1; $i++)
			{
				$valeu_Kind = "1";
				$value_PageID = $arr_page[$i]['PageID'];
				$value_MenuID = $arr_page[$i]['MenuID'];
				$value_PageType = $arr_page[$i]['PageType'];
				$value_PageTitle = $arr_page[$i]['PageTitle'];
				$value_PageBrief = $arr_page[$i]['PageBrief'];
				$value_PageThumb = $arr_page[$i]['PageThumb'];
				//$value_PageImage = $arr_page[$i]['PageImage'];
				
				$value_Hash = "&#47;".$valeu_Kind."&#47;".$value_PageType."&#47;".$value_MenuID."&#47;".$value_PageID."&#47;".$value_PageTitle;
				
				$value_PageThumb = $rsa['config']['local_userfiles']."pages/$value_PageThumb";
				
				?>
				
				<li style="padding-bottom: 10px;" onclick="doPageContent('<?php echo $value_Hash; ?>');">
					<img class="float-left" src="<?php echo $value_PageThumb; ?>" width="80" height="80" />
					<span style="display:block;"><?php echo $value_PageTitle; ?></span>
					<span><?php echo $value_PageBrief; ?></span>
					<br class="float-clear"/>
				</li>
				
				<?php
			}
			
			echo "</ul>";
		}
	}
?>