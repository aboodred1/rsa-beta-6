<?php
	
	class Galleries
	{
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
		
		public function __construct()
		{
			
		}
		
		/**********************************/
		
		public function GetGalleries()
		{
			
		}
		
		/**********************************/
		
		public function GetGalleriesByAll()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$fun_array = array();
			
			$query = "select * from rsa_galleries";
			
			$conditions = "1=1";
			
			if($this->GalleryID != NULL)
				$conditions .= " and GalleryID =".$this->GalleryID;
			
			if($this->PageID != NULL)
				$conditions .= " and PageID =".$this->PageID;	
				
			if($this->GalleryTitle != NULL)
				$conditions .= " and GalleryTitle ='".$this->GalleryTitle."'";
				
			if($this->GalleryActive != NULL)
				$conditions .= " and GalleryActive ='".$this->GalleryActive."'";
				
			//$conditions = array('GalleryActive'=>$this->GalleryActive);
			
			$order = $this->GalleryOrder;
			$limit = $this->GalleryLimit;
			$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
			
			if(empty($fun_array[0]))
				return false;
			
			return $fun_array;
		}
		
		/**********************************/
		
		public function InsertGalleries()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;

			$query = array('PageID'=>$this->PageID,
							'GalleryTitle'=>$this->GalleryTitle,
							'GalleryBrief'=>$this->GalleryBrief,
							'GalleryThumb'=>$this->GalleryThumb,
							'GalleryImage'=>$this->GalleryImage,
							'GalleryOrder'=>$this->GalleryOrder,
							'GalleryActive'=>$this->GalleryActive,
							'GalleryTime'=>$this->GalleryTime
							);	
			$dl->insert("rsa_galleries",$query) or die($dl->getError());
		}
		
		/**********************************/
		
		public function UpdateGalleries()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$query = array('PageID'=>$this->PageID,
							'GalleryTitle'=>$this->GalleryTitle,
							'GalleryBrief'=>$this->GalleryBrief,
							'GalleryThumb'=>$this->GalleryThumb,
							'GalleryImage'=>$this->GalleryImage,
							'GalleryOrder'=>$this->GalleryOrder,
							'GalleryActive'=>$this->GalleryActive,
							'GalleryTime'=>$this->GalleryTime
							);	
			$conditions = array('GalleryID'=>$this->GalleryID);
	 
			$dl->update("rsa_galleries",$query,$conditions);
		}
		
		/**********************************/
		
		public function DeleteGalleries()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$conditions = array('GalleryID'=>$this->GalleryID);
			
			$dl->delete("rsa_galleries",$conditions);
		}
		
		/**********************************/
	}

?>