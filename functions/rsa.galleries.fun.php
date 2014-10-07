<?php

	/*
		 public $GalleryID = 0;
		public $PageID = 0;
		public $GalleryTitle = "";
		public $GalleryBrief = "";
		public $GalleryThumb = "";
		public $GalleryImage = "";
		public $GalleryOrder = array('GalleryOrder'=>"ASC");
		public $GalleryActive = "Y";
		public $GalleryTime = "";
		public $GalleryLimit = "";
	 */
	



	


	function GetPageGalleriesBox($feeds)
	{
	?>
		
		<script type="text/javascript">	
		
			jQuery(function( $ ){
			
				$('#photos').serialScroll({
					target:'#photos-sec',
					items:'li', //selector to the items ( relative to the matched elements, '#sections' in this case )
					axis:'x',//the default is 'y'
					queue:false,//we scroll on both axes, scroll both at the same time.
					event:'click',//on which event to react (click is the default, you probably won't need to specify it)
					stop:false,//each click will stop any previous animations of the target. (false by default)
					lock:true, //ignore events if already animating (true by default)
					duration:1,//length of the animation (if you scroll 2 axes and use queue, then each axis take half this time)
					start: 0, //on which element (index) to begin ( 0 is the default, redundant in this case )
					force:true, //force a scroll to the element specified by 'start' (some browsers don't reset on refreshes)
					cycle:true,//cycle endlessly ( constant velocity, true is the default )
					step:1, //how many items to scroll each time ( 1 is the default, no need to specify )
					jump:false, //if true, items become clickable (or w/e 'event' is, and when activated, the pane scrolls to them)
					lazy:false,//(default) if true, the plugin looks for the items on each event(allows AJAX or JS content, or reordering)
					interval:false, //it's the number of milliseconds to automatically go to the next
					navigation:'#photos-nav li',
					constant:true,
					onBefore:function( e, elem, $pane, $items, pos ){
						e.preventDefault();
						
						$('#photos-sec img').fadeOut("slow");
						/*
						if( this.blur )
							this.blur();*/
					},
					onAfter:function( elem ){
						$('#photos-sec img').fadeIn("slow");
					}
				});
			});
	
		</script>
		
		<div id="photos">
			<h2>Gallery</h2>
			<div id="photos-sec">
				<?php $feeds_Gallery = GetPageGalleriesSlids($feeds); ?>
			</div>
			<div id="photos-nav">
				<?php GetPageGalleriesNavigation($feeds_Gallery); ?>
			</div>
		</div>
	
	<?php	
	}
	
	function GetPageGalleriesNavigation($arr_gallery)
	{
		echo "<ul>";
		
		for($i=0; $i<count($arr_gallery)-1; $i++)
		{
			$valeu_Kind = "0";
			$value_GalleryID = $arr_gallery[$i]['GalleryID'];
			$value_PageID = $arr_gallery[$i]['PageID'];
			$value_GalleryTitle = $arr_gallery[$i]['GalleryTitle'];
			$value_GalleryBrief = $arr_gallery[$i]['GalleryBrief'];
			$value_GalleryThumb = $arr_gallery[$i]['GalleryThumb'];
			$value_GalleryImage = $arr_gallery[$i]['GalleryImage'];
			
			$value_GalleryImage = $rsa['config']['local_userfiles']."galleries/$value_GalleryImage";
			
			
			?>
			<li><?php echo $i+1;//$value_PhotoTitle; ?></li>
			<?php
		}
		
		echo "</ul>";
	}

	function GetPageGalleriesSlids($feeds)
	{
		global $rsa;
		
		$gallery = new Galleries();
		
		$gallery->GalleryID = NULL;
		$gallery->PageID = $feeds['subs'];
		$gallery->GalleryTitle = NULL;
		$gallery->GalleryBrief = NULL;
		$gallery->GalleryThumb = NULL;
		$gallery->GalleryImage = NULL;
		$gallery->GalleryActive = "Y";
		//$gallery->GalleryOrder = NULL;
		//$gallery->GalleryLimit = NULL;

		
		if(!$arr_gallery = $gallery->GetGalleriesByAll())
			return false; 
		else
		{
			echo "<ul>";
			
			for($i=0; $i<count($arr_gallery)-1; $i++)
			{
				
				$valeu_Kind = "0";
				$value_GalleryID = $arr_gallery[$i]['GalleryID'];
				$value_PageID = $arr_gallery[$i]['PageID'];
				$value_GalleryTitle = $arr_gallery[$i]['GalleryTitle'];
				$value_GalleryBrief = $arr_gallery[$i]['GalleryBrief'];
				$value_GalleryThumb = $arr_gallery[$i]['GalleryThumb'];
				$value_GalleryImage = $arr_gallery[$i]['GalleryImage'];
				
				$value_GalleryImage = $rsa['config']['local_userfiles']."galleries/$value_GalleryImage";
				
				?>
				<li>
					<img src="<?php echo $value_GalleryImage; ?>" width="360" height="280" title="<?php echo $value_GalleryTitle; ?>" /></li>
				<?php
			}
			
			echo "</ul>";
		}
		
		
		return $arr_gallery;
	}




?>