<?php
	
	class Photos
	{
		public $PhotoID = NULL;
		public $MenuID = NULL;
		public $PhotoTitle = NULL;
		public $PhotoThumb = NULL;
		public $PhotoImage = NULL;
		public $PhotoOrder = array('PhotoOrder'=>"ASC");
		public $PhotoActive = NULL;
		public $PhotoTime = NULL;
		public $PhotoLimit = "";

		function __construct()
		{
			
		}
		
		public function GetPhotos()
		{
			
		}
		
		/*****************************************************/
		
		public function GetPhotosByAll()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$fun_array = array();
			
			$query = "select * from rsa_photos";
			
			$conditions = "1=1";
			
			if($this->PhotoID != NULL)
				$conditions .= " and PhotoID =".$this->PhotoID;
			
			if($this->MenuID != NULL)
				$conditions .= " and MenuID =".$this->MenuID;	
				
			if($this->PhotoTitle != NULL)
				$conditions .= " and PhotoTitle ='".$this->PhotoTitle."'";
				
			if($this->PhotoActive != NULL)
				$conditions .= " and PhotoActive ='".$this->PhotoActive."'";
				
			
			$order = $this->PhotoOrder;
			$limit = $this->GalleryLimit;
			$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
			
			if(empty($fun_array[0]))
				return false;
			
			return $fun_array;
		}
		
		/*****************************************************/
		
		public function InsertPhotos()
		{
			
		}
		
		/*****************************************************/
		
		public function UpdatePhotos()
		{
			
		}
		
		/*****************************************************/
		
		public function DeletePhotos()
		{
			
		}
		
		/*****************************************************/
		
		function __destruct()
		{
			
		}
	}
?>