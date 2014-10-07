<?php
	/*
	 * 	public $TeamID = 0;
		public $TeamTitle = "";
		public $TeamName = "";
		public $TeamBrief = "";
		public $TeamThumb = "";
		public $TeamImage = "";
		public $TeamOrder = array('TeamOrder'=>"DESC");
		public $TeamActive = "Y";
		public $TeamTime = "";
		public $TeamLimit = ""; 
	 */

	function GetTeamsBox()
	{
		global $rsa;
		
		$team = new Teams();
		
		$team->TeamID = NULL;
		$team->TeamTitle = NULL;
		$team->TeamName = NULL;
		$team->TeamActive = "Y";
		//$team->TeamOrder = array();
		//$team->TeamLimit = NULL;
		
		if(!$arr_team = $team->GetTeamsByAll())
			return false; 
		else
		{	
			?>	
			<script type="text/javascript">
				jQuery(function( $ ){
			        var $paneTarget = $('#pane-target'); //Target examples bindings		
			        $.scrollTo.defaults.axis = 'xy'; //by default, the scroll is only done vertically ('y'), change it to both.
			        $('div.pane').scrollTo( 0 );//reset all scrollable panes to (0,0) //this one is important, many browsers don't reset scroll on refreshes
			        $.scrollTo( 0 );//reset the screen to (0,0)
			        <?php
			        
					for($i=0; $i<count($arr_team)-1; $i++)
					{
						$valeu_Kind = "0";
						$value_TeamID = $arr_team[$i]['TeamID']; 
						$value_TeamTitle = $arr_team[$i]['TeamTitle']; 
						$value_TeamName = $arr_team[$i]['TeamName']; 
						$value_TeamBrief = $arr_team[$i]['TeamBrief']; 
						$value_TeamThumb = $arr_team[$i]['TeamThumb']; 
						$value_TeamImage = $arr_team[$i]['TeamImage'];
						
						$value_link = str_replace(" ","-",$value_TeamName);
						
						?>
						$('#teams-<?php echo $value_link; ?>').click(function(){
			        		$paneTarget.stop().scrollTo( 'li:eq(<?php echo $i; ?>)', 800 );
			        		//alert('<?php echo $i; ?>');
			       		});
						<?php
					}
			        
			        ?>

				});
			</script>
			<?php	
		}
		
		return $arr_team;
	}


	function GetTeamsList($arr_team,$feeds)
	{
		global $rsa;
		
		echo "<ul>";
		
		for($i=0; $i<count($arr_team)-1; $i++)
		{
			$valeu_Kind = "0";
			$value_TeamID = $arr_team[$i]['TeamID']; 
			$value_TeamTitle = $arr_team[$i]['TeamTitle']; 
			$value_TeamName = $arr_team[$i]['TeamName']; 
			$value_TeamBrief = $arr_team[$i]['TeamBrief']; 
			$value_TeamThumb = $arr_team[$i]['TeamThumb']; 
			$value_TeamImage = $arr_team[$i]['TeamImage'];
			
			$value_link = str_replace(" ","-",$value_TeamName);
			
			$value_Hash = "&#47;".$valeu_Kind."&#47;".$feeds['types']."&#47;".$feeds['mains']."&#47;".$value_TeamID."&#47;".$value_TeamName;

			?>
			<li><h3><a id="teams-<?php echo $value_link; ?>" href="#<?php echo $value_Hash; ?>" title="<?php $value_TeamName; ?>">
				<?php echo $value_TeamTitle; ?></a></h3></li>
			<?php
		}
		
		echo "</ul>";
	}
	
	
	
	function GetTeamsDetails($arr_team,$feeds)
	{

		global $rsa;
		
		$team = new Teams();
		
		echo "<ul>";
		
		for($i=0; $i<count($arr_team)-1; $i++)
		{
			$valeu_Kind = "0";
			$value_TeamID = $arr_team[$i]['TeamID']; 
			$value_TeamTitle = $arr_team[$i]['TeamTitle']; 
			$value_TeamName = $arr_team[$i]['TeamName']; 
			$value_TeamBrief = $arr_team[$i]['TeamBrief']; 
			$value_TeamThumb = $arr_team[$i]['TeamThumb']; 
			$value_TeamImage = $arr_team[$i]['TeamImage'];

			//$value_Hash = "&#47;".$valeu_Kind."&#47;".$value_MenuType."&#47;".$value_MenuID."&#47;".$value_MenuSubID."&#47;".$value_TeamName;
			//$value_TeamThumb = $rsa['config']['local_userfiles']."teams/$value_TeamThumb";
			$value_TeamImage = $rsa['config']['local_userfiles']."teams/$value_TeamImage";

			?>
			<li>
				<img style="display:block;" src="<?php echo $value_TeamImage; ?>" width="200" height="200"/>
				<h4><?php echo $value_TeamName; ?></h4>
				<p><?php echo $value_TeamBrief; ?></p>
			</li>
			<?php
		}
		
		echo "</ul>";
	}


?>