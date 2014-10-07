<?php
	
	/*
	 	public $PhotoID = NULL;
		public $MenuID = NULL;
		public $PhotoTitle = NULL;
		public $PhotoThumb = NULL;
		public $PhotoImage = NULL;
		public $PhotoOrder = array('PhotoOrder'=>"ASC");
		public $PhotoActive = NULL;
		public $PhotoTime = NULL;
		public $PhotoLimit = "";
	 */

	function GetMenuPhotosBox($feeds)
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
				<?php $feeds_photos = GetMenuPhotosSlids($feeds); ?>
			</div>
			<div id="photos-nav">
				<?php GetMenuPhotosNavigation($feeds_photos); ?>
			</div>
		</div>
	
	<?php	
	}
	
	function GetMenuPhotosNavigation($arr_photo)
	{
		echo "<ul>";
		
		for($i=0; $i<count($arr_photo)-1; $i++)
		{
			$valeu_Kind = "0";
			$value_PhotoID = $arr_photo[$i]['PhotoID'];
			$value_MenuID = $arr_photo[$i]['MenuID'];
			$value_PhotoTitle = $arr_photo[$i]['PhotoTitle'];
			$value_PhotoThumb = $arr_photo[$i]['PhotoThumb'];
			$value_PhotoImage = $arr_photo[$i]['PhotoImage'];
			
			$value_PhotoThumb = $rsa['config']['local_userfiles']."photos/$value_PhotoThumb";
			
			
			?>
			<li><?php echo $i+1;//$value_PhotoTitle; ?></li>
			<?php
		}
		
		echo "</ul>";
	}

	function GetMenuPhotosSlids($feeds)
	{
		global $rsa;
		
		$photo = new Photos();
		
		$photo->PhotoID = NULL;
		$photo->MenuID = $feeds['mains'];
		$photo->PhotoTitle = NULL;
		$photo->PhotoActive = "Y";
		//$photo->PhotoOrder = NULL;
		//$photo->PhotoLimit = NULL;
		
		if(!$arr_photo = $photo->GetPhotosByAll())
			return false; 
		else
		{
			echo "<ul>";
			
			for($i=0; $i<count($arr_photo)-1; $i++)
			{
				
				$valeu_Kind = "0";
				$value_PhotoID = $arr_photo[$i]['PhotoID'];
				$value_MenuID = $arr_photo[$i]['MenuID'];
				$value_PhotoTitle = $arr_photo[$i]['PhotoTitle'];
				$value_PhotoThumb = $arr_photo[$i]['PhotoThumb'];
				$value_PhotoImage = $arr_photo[$i]['PhotoImage'];
				
				$value_PhotoImage = $rsa['config']['local_userfiles']."photos/$value_PhotoImage";
				
				?>
				<li>
					<img src="<?php echo $value_PhotoImage; ?>" width="360" height="280" title="<?php echo $value_PhotoTitle; ?>" /></li>
				<?php
			}
			
			echo "</ul>";
		}
		
		
		return $arr_photo;
	}

?>