<?php

	class Menus
	{
		public $MenuID = 0;
		public $MenuSubID = 0;
		public $MenuType = "";
		public $MenuTitle = "";
		public $MenuBrief = "";
		public $MenuThumb = "";
		public $MenuImage = "";
		public $MenuOrder = 0;
		public $MenuActive = "Y";
		public $MenuTime = "";
		
		
		public function __construct()
		{
			
		}
		
		/**********************************/
		
		public function GetMenus()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$fun_array = array();
			
			$query = "select * from rsa_menus";
			$conditions = array('MenuActive'=>$this->MenuActive);
			$order = array('MenuOrder'=>"DESC");
			$limit = "";
			$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
			
			if(empty($fun_array[0]))
				return false;
			
			return $fun_array;
		}
		
		/**********************************/
		
		public function GetMenusByAll()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$fun_array = array();
			
			$query = "select * from rsa_menus";
			
			$conditions = "1=1";
			
			if($this->MenuID != NULL)
				$conditions .= " and MenuID =".$this->MenuID;
				 
			if($this->MenuSubID != NULL)
				$conditions .= " and MenuSubID =".$this->MenuSubID;				
			
			if($this->MenuType != NULL)
				$conditions .= " and MenuType ='".$this->MenuType."'";
				
			if($this->MenuTitle != NULL)
				$conditions .= " and MenuTitle ='".$this->MenuTitle."'";
				
			if($this->MenuActive != NULL)
				$conditions .= " and MenuActive ='".$this->MenuActive."'";	
				
			//$conditions = array('MenuActive'=>$this->MenuActive);
			
			$order = array('MenuOrder'=>"ASC");
			$limit = "";
			$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
			
			if(empty($fun_array[0]))
				return false;
			
			return $fun_array;
		}

		/**********************************/
		
		public function GetSubMenuByAll()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = true;
			
			$fun_array = array();
			
			$query_main = "m.MenuID,m.MenuType,m.MenuTitle,m.MenuBrief,m.MenuThumb,m.MenuImage,m.MenuTime";
			$query_sub = "s.MenuID,s.MenuSubID,s.MenuTitle";
			$query = "select $query_main,$query_sub from rsa_menus as m, rsa_menus as s";
			
			$conditions = "m.MenuID = s.MenuSubID";
			//$conditions = "1=1";
			
			/*
			if($this->MenuID != NULL)
				$conditions .= " and MenuID =".$this->MenuID;
				 
			if($this->MenuSubID != NULL)
				$conditions .= " and MenuSubID =".$this->MenuSubID;				
			
			if($this->MenuType != NULL)
				$conditions .= " and MenuType ='".$this->MenuType."'";
				
			if($this->MenuTitle != NULL)
				$conditions .= " and MenuTitle ='".$this->MenuTitle."'";
				
			if($this->MenuActive != NULL)
				$conditions .= " and MenuActive ='".$this->MenuActive."'";	
				
			//$conditions = array('MenuActive'=>$this->MenuActive);
			*/

			$order = array('m.MenuOrder'=>"ASC");
			$limit = "";
			$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
			


			if(empty($fun_array[0]))
				return false;
			
			return $fun_array;
		}
		
		/**********************************/
		
		public function InsertMenus()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$query = array('MenuSubID'=>$this->MenuSubID,
							'MenuType'=>$this->MenuType,
							'MenuTitle'=>$this->MenuTitle,
							'MenuBrief'=>$this->MenuBrief,
							'MenuThumb'=>$this->MenuThumb,
							'MenuImage'=>$this->MenuImage,
							'MenuOrder'=>$this->MenuOrder,
							'MenuActive'=>$this->MenuActive,
							'MenuTime'=>$this->MenuTime
							);	
			$dl->insert("rsa_menus",$query) or die($dl->getError());
		}
		
		/**********************************/
		
		public function UpdateMenus()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$query = array('MenuSubID'=>$this->MenuSubID,
							'MenuType'=>$this->MenuType,
							'MenuTitle'=>$this->MenuTitle,
							'MenuBrief'=>$this->MenuBrief,
							'MenuThumb'=>$this->MenuThumb,
							'MenuImage'=>$this->MenuImage,
							'MenuOrder'=>$this->MenuOrder,
							'MenuActive'=>$this->MenuActive,
							'MenuTime'=>$this->MenuTime
							);	
			$conditions = array('MenuID'=>$this->MenuID);
	 
			$dl->update("rsa_menus",$query,$conditions);
		}
		
		/**********************************/
		
		public function DeleteMenus()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$conditions = array('MenuID'=>$this->MenuID);
			
			$dl->delete("rsa_menus",$conditions);
		}
		
		/**********************************/
	}
?>