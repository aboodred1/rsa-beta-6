<?php
	
	function GetFilesBox($feeds)
	{
		global $rsa;
		
		$view = new ViewPoints();
		
		$view->PointID = NULL;
		$view->MenuID = $feeds['mains'];
		$view->PointTitle = NULL;
		$view->PointActive = "Y";
		//$view->PointOrder = "";
		//$view->PointLimit = "";
		
		if(!$arr_view = $view->GetViewPointsByAll())
			return false; 
		else
		{
			echo "<ul>";
			
			for($i=0; $i<count($arr_view)-1; $i++)
			{
				$value_PointID = $arr_view[$i]['PointID'];
				$value_MenuID = $arr_view[$i]['MenuID'];
				$value_PointTitle = $arr_view[$i]['PointTitle'];
				$value_PointBrief = $arr_view[$i]['PointBrief'];
				$value_PointThumb = $arr_view[$i]['PointThumb'];
				$value_PointFile = $arr_view[$i]['PointFile'];
				$value_PointTime = $arr_view[$i]['PointTime'];
			
				$value_PointThumb = $rsa['config']['local_userfiles']."files/$value_PointThumb";
				$value_PointFile = $rsa['config']['local_userfiles']."files/$value_PointFile";
				?>
				<li style="padding-bottom: 10px;" >
					<img class="float-left" src="<?php echo $value_PointThumb; ?>" width="80" height="80" />
					<span style="display:block;"><?php echo $value_PointTitle; ?></span>
					<span><?php echo $value_PointBrief; ?></span>
					<span style="display:block;"><a href="<?php echo $value_PointFile; ?>">download...</a></span>
					<br class="float-clear"/>
				</li>
				<?php				
			}
			
			echo "</ul>";
		}
		
		return false;
	}
?>