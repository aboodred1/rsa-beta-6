<?php

	function GetContactsBox()
	{
		
		?>
		
		<div id="contact-box">
			<span>Name:</span>
			<input type="text" id="txtName" name="txtName" value="" class="inputs" />
			
			<span>Email:</span>
			<input type="text" id="txtEmail" name="txtEmail" value="" class="inputs" />
			
			<span>Subject:</span>
			<input type="text" id="txtSubject" name="txtSubject" value="" class="inputs" />
			
			<span>Message:</span>
			<textarea id="txtMessage" name="txtMessage" class="inputs"></textarea>
		
			<span></span>
			<input style="border:2px solid #97a44d;" type="button" id="btnSubmit" name="btnSubmit" value="Submit" onclick="doContactUs();" />
			<input style="border:2px solid #97a44d;" type="reset" id="btnReset" name="btnReset" value="Reset" />
		</div>
		
		<?php
	}
	
	
	function AddContactsInfo($feeds)
	{
		global $rsa;
		
		$contact = new Contacts();
		
		$contact->ContactName = $feeds['ContactName'];
		$contact->ContactEmail = $feeds['ContactEmail'];
		$contact->ContactSubject = $feeds['ContactSubject'];
		$contact->ContactMessage = $feeds['ContactMessage'];
		
		$message = $contact->ValidationContacts();

		if($message == 1)
		{
			$contact->InsertContacts();
		}

			
		echo $message;
		
		
		return false;
	}
?>