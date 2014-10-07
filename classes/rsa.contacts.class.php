<?php

	class Contacts
	{
		public $ContactID = 0;
		public $ContactName = "";
		public $ContactEmail = "";
		public $ContactSubject = "";
		public $ContactMessage = "";
		public $ContactTime = "";
		
		public function __construct()
		{
			
		}
		
		/**********************************/
		
		public function GetContacts()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$fun_array = array();
			
			$query = "select * from rsa_contacts";
			$conditions = "";
			$order = array('ContactID'=>"DESC");
			$limit = "";
			$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
			
			if(empty($fun_array[0]))
				return false;
			
			return $fun_array;
		}
		
		/**********************************/
		
		public function InsertContacts()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$query = array('ContactName'=>$this->ContactName,
							'ContactEmail'=>$this->ContactEmail,
							'ContactSubject'=>$this->ContactSubject,
							'ContactMessage'=>$this->ContactMessage,
							'ContactTime'=>$this->ContactTime
							);	
			$dl->insert("rsa_contacts",$query) or die($dl->getError());
		}
		
		/**********************************/
		
		public function UpdateContactsByID()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$query = array('ContactName'=>$this->ContactName,
							'ContactEmail'=>$this->ContactEmail,
							'ContactSubject'=>$this->ContactSubject,
							'ContactMessage'=>$this->ContactMessage,
							'ContactTime'=>$this->ContactTime
							);	
			$conditions = array('ContactID'=>$this->ContactID);
	 
			$dl->update("rsa_contacts",$query,$conditions);
		}
		
		/**********************************/
		
		public function DeleteContactsByID()
		{
			global $conn;
			$dl = new DataLayer($conn->link);
			$dl->debug = false;
			
			$conditions = array('ContactID'=>$this->ContactID);
			
			$dl->delete("sds_brands",$conditions);
		}
		
		/**********************************/
		
		public function ValidationContacts()
		{
			$_message = "";
			
			if(empty($this->ContactName))
				$_message = "Please Fill in your Name";
			elseif(!ctype_alpha($this->ContactName))
				$_message = "Please Fill A Valid Name";
			elseif(empty($this->ContactEmail))
				$_message = "Please Fill in your Email";
			elseif(!eregi("^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$",$this->ContactEmail))
				$_message = "Please Fill A Valid Email";
			elseif(empty($this->ContactSubject))
				$_message = "Please Fill in your Subject";
			elseif(empty($this->ContactMessage))
				$_message = "Please Fill in your Message";
			else
				$_message = 1;
				
			return $_message;
		}
		
		/**********************************/
		
		public function SendContactsEmail()
		{
			$_mail = new PHPMailer();
			
			$_body = $this->ContactMessage;
			
			$_mail->From = $this->ContactEmail;
			$_mail->FromName = $this->ContactName;
			$_mail->Subject = $this->ContactSubject;
			$_mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
			$_mail->MsgHTML($_body);
			$_mail->AddAddress("admin@visiosight.com","admin visio");
			
			if($_mail->Send()) {
				//pass.
			} else {
				//fail.
			}
		}
	}

?>