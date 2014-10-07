<?php

	class Teams
	{
		public $TeamID = 0;
		public $TeamTitle = "";
		public $TeamName = "";
		public $TeamBrief = "";
		public $TeamThumb = "";
		public $TeamImage = "";
		public $TeamOrder = array('TeamOrder'=>"DESC");
		public $TeamActive = "Y";
		public $TeamTime = "";
		public $TeamLimit = ""; 
		
		public function __construct()
		{
			
		}
		
		/**********************************/
		
		public function GetTeams()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$fun_array = array();
			
			$query = "select * from rsa_teams";
			$conditions = array('TeamActive'=>$this->TeamActive);
			$order = array('TeamOrder'=>"DESC");
			$limit = "";
			$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
			
			if(empty($fun_array[0]))
				return false;
			
			return $fun_array;
		}
		
		/**********************************/
		
		public function GetTeamsByAll()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$fun_array = array();
			
			$query = "select * from rsa_teams";
			
			$conditions = "1=1";
			
			if($this->TeamID != NULL)
				$conditions .= " and TeamID =".$this->TeamID;
			
			if($this->TeamTitle != NULL)
				$conditions .= " and TeamTitle ='".$this->TeamTitle."'";
				
			if($this->TeamName != NULL)
				$conditions .= " and TeamName ='".$this->TeamName."'";
				
			if($this->TeamActive != NULL)
				$conditions .= " and TeamActive ='".$this->TeamActive."'";	
				
			//$conditions = array('TeamActive'=>$this->TeamActive);
			
			$order = $this->TeamOrder;
			$limit = $this->TeamLimit;
			$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
			
			if(empty($fun_array[0]))
				return false;
			
			return $fun_array;
		}
		
		/**********************************/
		
		public function InsertTeams()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;

			$query = array('TeamTitle'=>$this->TeamTitle,
							'TeamName'=>$this->TeamName,
							'TeamBrief'=>$this->TeamBrief,
							'TeamThumb'=>$this->TeamThumb,
							'TeamImage'=>$this->TeamImage,
							'TeamOrder'=>$this->TeamOrder,
							'TeamActive'=>$this->TeamActive,
							'TeamTime'=>$this->TeamTime
							);	
			$dl->insert("rsa_teams",$query) or die($dl->getError());
		}
		
		/**********************************/
		
		public function UpdateTeams()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$query = array('TeamTitle'=>$this->TeamTitle,
							'TeamName'=>$this->TeamName,
							'TeamBrief'=>$this->TeamBrief,
							'TeamThumb'=>$this->TeamThumb,
							'TeamImage'=>$this->TeamImage,
							'TeamOrder'=>$this->TeamOrder,
							'TeamActive'=>$this->TeamActive,
							'TeamTime'=>$this->TeamTime
							);	
			$conditions = array('TeamID'=>$this->TeamID);
	 
			$dl->update("rsa_teams",$query,$conditions);
		}
		
		/**********************************/
		
		public function DeleteTeams()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$conditions = array('TeamID'=>$this->TeamID);
			
			$dl->delete("rsa_teams",$conditions);
		}
		
		/**********************************/
		
	}
?>