<?php

	class Pages
	{
		public $PageID = 0;
		public $MenuID = 0;
		public $PageType = "";
		public $PageTitle = "";
		public $PageBrief = "";
		public $PageDescription = "";
		public $PageThumb = "";
		public $PageImage = "";
		public $PageFeatured = "N";
		public $PageActive = "Y";
		public $PageTime = "";
		public $PageOrder = array('PageOrder'=>"ASC");
		public $PageLimit = "";
		
		public function __construct()
		{
			
		}
		
		/**********************************/
		
		public function GetPages()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$fun_array = array();
			
			return $fun_array;
		}
		
		/**********************************/
		
		public function GetPagesByAll()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$fun_array = array();
			
			$query = "select * from rsa_pages";
			
			$conditions = "1=1";
			
			if($this->PageID != NULL)
				$conditions .= " and PageID =".$this->PageID;
				
			if($this->MenuID != NULL)
				$conditions .= " and MenuID =".$this->MenuID;
				
			if($this->PageType != NULL)
				$conditions .= " and PageType ='".$this->PageType."'";
				
			if($this->PageTitle != NULL)
				$conditions .= " and PageTitle ='".$this->PageTitle."'";
				
			if($this->PageFeatured != NULL)
				$conditions .= " and PageFeatured ='".$this->PageFeatured."'";
				
			if($this->PageActive != NULL)
				$conditions .= " and PageActive ='".$this->PageActive."'";
			
			//$conditions = array('PageActive'=>$this->PageActive);
			
			
			$order = $this->PageOrder;
			$limit = $this->PageLimit;
			$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
			
			if(empty($fun_array[0]))
				return false;
			
			return $fun_array;
		}
		
		/**********************************/
		
		public function InsertPages()
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
			$dl->insert("rsa_pages",$query) or die($dl->getError());
		}
		
		/**********************************/
		
		public function UpdatePages()
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
			$conditions = array('PageID'=>$this->MenuID);
	 
			$dl->update("rsa_pages",$query,$conditions);
		}
		
		/**********************************/
		
		public function DeletePages()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$conditions = array('PageID'=>$this->MenuID);
			
			$dl->delete("rsa_pages",$conditions);
		}
		
		/**********************************/
	}
?>