<?php
	require_once("../onload.php");
	
	$v_ajax['kinds'] = $_POST['kinds'];
	$v_ajax['types'] = $_POST['types'];
	$v_ajax['mains'] = $_POST['mains'];
	$v_ajax['subs'] = $_POST['subs'];
	$v_ajax['titles'] = $_POST['titles'];
	$v_ajax['temps'] = $_POST['temps'];
	
	if($v_ajax['temps'] == "homepage")
	{
		GetFeaturedBox();
	}
	
	if($v_ajax['kinds'] == 1 && $v_ajax['temps'] == "mainmenu")
	{
		GetSubMenu($v_ajax);
	}
	
	/*************************************************************/
	
	if($v_ajax['kinds'] == 1 && $v_ajax['temps'] == "maincontent")
	{
		switch($v_ajax['types'])
		{
			case "content":
				
				if(CheckSubMenu($v_ajax))
				{
					GetContentMenuWithSub($v_ajax);
				}
				else
				{
					GetContentMenu($v_ajax);
				}
				
				break;
			case "news":
				
				if(CheckSubMenu($v_ajax))
				{
					GetContentMenuWithSub($v_ajax);
				}
				else
				{
					GetContentMenuNews($v_ajax);
				}
				
				break;
			case "contacts":
				
				if(CheckSubMenu($v_ajax))
				{
					GetContentMenuWithSub($v_ajax);
				}
				else
				{
					GetContentMenuContacts($v_ajax);
				}
				
				break;
			case "portfolio":
				
				if(CheckSubMenu($v_ajax))
				{
					GetContentMenuWithSub($v_ajax);
				}
				else
				{
					echo "coming soon";
				}
				
				break;
			case "teams":
				
				if(CheckSubMenu($v_ajax))
				{
					GetContentMenuWithSub($v_ajax);
				}
				else
				{
					GetContentMenuTeams($v_ajax);
				}

				break;
			case "files":

				if(CheckSubMenu($v_ajax))
				{
					GetContentMenuWithSub($v_ajax);
				}
				else
				{
					GetContentMenuFiles($v_ajax);
				}

				break;
			default:
				break;
		}
	}
	
	/*************************************************************/
	
	if($v_ajax['kinds'] == 1 && $v_ajax['temps'] == "submenu")
	{
		
		switch($v_ajax['types'])
		{
			case "content":
				
				if(CheckPages($v_ajax))
				{
					GetContentSubWithPages($v_ajax);
				}
				else
				{
					GetContentMenu($v_ajax);
				}
				
				break;
			case "news":
				
				if(CheckPages($v_ajax))
				{
					GetContentSubWithPages($v_ajax);
				}
				else
				{
					GetContentMenuNews($v_ajax);
				}
				
				break;
			case "contacts":
				
				if(CheckPages($v_ajax))
				{
					GetContentSubWithPages($v_ajax);
				}
				else
				{
					GetContentMenuContacts($v_ajax);
				}
				
				break;
			case "portfolio":
				
				if(CheckPages($v_ajax))
				{
					GetContentSubWithPages($v_ajax);
				}
				else
				{
					GetContentMenuTeams($v_ajax);
				}
				
				break;
			case "teams":
				
				if(CheckPages($v_ajax))
				{
					GetContentSubWithPages($v_ajax);
				}
				else
				{
					GetContentMenuTeams($v_ajax);
				}

				break;
			case "files":

				if(CheckPages($v_ajax))
				{
					GetContentSubWithPages($v_ajax);
				}
				else
				{
					GetContentMenuFiles($v_ajax);
				}

				break;
			default:
				break;
		}
	}	
	
	/*************************************************************/
	
	if($v_ajax['kinds'] == 2 && $v_ajax['temps'] == "submenu")
	{
		GetSubMenuPagesList($v_ajax);
	}
	
	/*************************************************************/
	
	if($v_ajax['kinds'] == 1 && $v_ajax['temps'] == "pages")
	{
		GetPageContent($v_ajax);	
	}
	
	/*************************************************************/
	
	if($v_ajax['temps'] == "contacts")
	{
		$v_ajax['ContactName'] = $_POST['txtName'];
		$v_ajax['ContactEmail'] = $_POST['txtEmail'];
		$v_ajax['ContactSubject'] = $_POST['txtSubject'];
		$v_ajax['ContactMessage'] = $_POST['txtMessage'];
		
		AddContactsInfo($v_ajax);
	}
	
	
	
?>