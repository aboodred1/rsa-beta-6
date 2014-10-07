<?php
	
	class ViewPoints
	{
		public $PointID = 0;
		public $MenuID = 0;
		public $PointTitle = "";
		public $PointBrief = "";
		public $PointThumb = "";
		public $PointFile = "";
		public $PointOrder = array('PointOrder'=>"ASC");
		public $PointActive = "Y";
		public $PointTime = "";
		public $PointLimit = "";
		
		public function __construct()
		{
			
		}
		
		/**********************************/
		
		public function GetViewPoints()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$fun_array = array();
			
			$query = "select * from rsa_view_points";
			$conditions = array('PointActive'=>$this->PointActive);
			$order = array('PointOrder'=>"DESC");
			$limit = "";
			$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
			
			if(empty($fun_array[0]))
				return false;
			
			return $fun_array;
		}
		
		/**********************************/
		
		public function GetViewPointsByAll()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$fun_array = array();
			
			$query = "select * from rsa_view_points";

			$conditions = "1=1";
			
			if($this->PointID != NULL)
				$conditions .= " and PointID =".$this->PointID;
				
			if($this->MenuID != NULL)
				$conditions .= " and MenuID =".$this->MenuID;
			
			if($this->PointTitle != NULL)
				$conditions .= " and PointTitle ='".$this->PointTitle."'";
				
			if($this->PointActive != NULL)
				$conditions .= " and PointActive ='".$this->PointActive."'";
			
			//$conditions = array('PointActive'=>$this->PointActive);
			$order = $this->PointOrder;
			$limit = $this->PointLimit;
			$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
			
			if(empty($fun_array[0]))
				return false;
			
			return $fun_array;
		}
		
		/**********************************/
		
		public function InsertViewPoints()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;

			$query = array('PointTitle'=>$this->PointTitle,
							'PointBrief'=>$this->PointBrief,
							'PointThumb'=>$this->PointThumb,
							'PointFile'=>$this->PointFile,
							'PointOrder'=>$this->PointOrder,
							'PointActive'=>$this->PointActive,
							'PointTime'=>$this->PointTime
							);	
			$dl->insert("rsa_view_points",$query) or die($dl->getError());
		}
		
		/**********************************/
		
		public function UpdateViewPoints()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$query = array('PointTitle'=>$this->PointTitle,
							'PointBrief'=>$this->PointBrief,
							'PointThumb'=>$this->PointThumb,
							'PointFile'=>$this->PointFile,
							'PointOrder'=>$this->PointOrder,
							'PointActive'=>$this->PointActive,
							'PointTime'=>$this->PointTime
							);	
			$conditions = array('PointID'=>$this->PointID);
	 
			$dl->update("rsa_view_points",$query,$conditions);
		}
		
		/**********************************/
		
		public function DeleteViewPoints()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$conditions = array('PointID'=>$this->PointID);
			
			$dl->delete("rsa_view_points",$conditions);
		}
		
		/**********************************/
	}
?>