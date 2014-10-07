var ajaxURL = "ajax/index.php";

function replaceHash()
{
	var args = $A(arguments);
	var str_rep;
	
	if(args[0] != undefined)
	{
		var str = args[0];
		str_rep = str.replace(" ","_");
		
		return str_rep;
	}
	
	return false;
}

function statusHash()
{
	var args = $A(arguments);
	
	if(args[0] != undefined)
		window.location.hash = replaceHash(args[0]);
	else
		return window.location.hash;
		
	return true;
}

function statusTitle()
{
	var args = $A(arguments);
	
	if(args[0] != undefined)
		window.document.title = args[0];
	else
		return window.document.title;
		
	return true;
}

function doHashSplit()
{
	var args = $A(arguments);
	
	if(args[0] != undefined)
	{
		var prams = args[0].split("/");
		return prams;	
	}
	
	return true;
}

function doLoading()
{
	var loading = $('loading');
	//loading.update("loading...").setStyle({width:'100%', height:'100%',opacity:'0.5'});
	loading.setStyle({width:'100%', height:'100%',opacity:'0.5'});
}

function clearLoading()
{
	var loading = $('loading');
	loading.update('').setStyle({width:'0px',height:'0px;'});
}

function contentAnimation()
{	
	$('center-dialog').setStyle({top:'0px',left:'-10000px'});
			
	$j("#center-dialog").animate({left: '+50px',opacity: '0.4'}, 800)
		  	.animate({left: '0px',opacity: '1'}, 600);
}

function doPostBack()
{
	var args = $A(arguments);
	var hashs = statusHash(args[0]);
	var splits = doHashSplit(args[0]);
	var titles = statusTitle(splits[splits.length -1]);
	
	return true;
}

function doHomePage()
{
	var args = $A(arguments);
	var posts = doPostBack(args[0]);
	var splits =  doHashSplit(args[0]);
	
	var content = $('center');
	var contentJ = $j('#center');
	
	var myUpdate = new Ajax.Updater(content,ajaxURL,{
		method: 'post',
		parameters: {kinds: splits[1], types: splits[2], mains: splits[3], subs: splits[4], titles: splits[5], temps: "homepage"},
		insertion: Insertion.Bottom,
		onCreate: function() {
			doLoading();
		},
		insertion: Insertion.Bottom,
		onLoaded: function(transport) {},
		onLoading: function(transport) {},
		onSuccess: function(transport) { clearLoading(); },
		onComplete: function(transport) {
			if (transport.status == 200) {
				content.update(transport.responseText);
			}
		},
		onException: function(transport) { alert('Exception'); },
		onFailure: function(transport) { alert('Failure'); }
	});
	
	return false;
}


function doMainMenu()
{
	var args = $A(arguments);
	var posts = doPostBack(args[0]);
	var splits =  doHashSplit(args[0]);
	
	var content = $('sub-menu');
	var contentJ = $j('#sub-menu');
	
	var myUpdate = new Ajax.Updater(content,ajaxURL,{
		method: 'post',
		parameters: {kinds: splits[1], types: splits[2], mains: splits[3], subs: splits[4], titles: splits[5], temps: "mainmenu"},
		insertion: Insertion.Bottom,
		onCreate: function() {
			doLoading();
		},
		insertion: Insertion.Bottom,
		onLoaded: function(transport) {},
		onLoading: function(transport) {},
		onSuccess: function(transport) { /*clearLoading();*/ },
		onComplete: function(transport) {
			if (transport.status == 200) {
				content.update(transport.responseText);
				
				doMainContent(args[0]);
			}
		},
		onException: function(transport) { alert('Exception'); },
		onFailure: function(transport) { alert('Failure'); }
	});
	
	return false;
}

function doSubMenu()
{
	var args = $A(arguments);
	var posts = doPostBack(args[0]);
	var splits =  doHashSplit(args[0]);
	
	var content = $('center');
	var contentJ = $j('#center');
	
	var myUpdate = new Ajax.Updater(content,ajaxURL,{
		method: 'post',
		parameters: {kinds: splits[1], types: splits[2], mains: splits[3], subs: splits[4], titles: splits[5], temps: "submenu"},
		insertion: Insertion.Bottom,
		onCreate: function() {
			doLoading();
		},
		insertion: Insertion.Bottom,
		onLoaded: function(transport) {},
		onLoading: function(transport) {},
		onSuccess: function(transport) { clearLoading(); },
		onComplete: function(transport) {
			if (transport.status == 200) {
				content.update(transport.responseText);
				contentAnimation();
			}
		},
		onException: function(transport) { alert('Exception'); },
		onFailure: function(transport) { alert('Failure'); }
	});
	
	return false;
	
}

function doMainContent()
{
	var args = $A(arguments);
	var posts = doPostBack(args[0]);
	var splits =  doHashSplit(args[0]);
	
	var content = $('center');
	var contentJ = $j('#center');
	
	var myUpdate = new Ajax.Updater(content,ajaxURL,{
		method: 'post',
		parameters: {kinds: splits[1], types: splits[2], mains: splits[3], subs: splits[4], titles: splits[5], temps: "maincontent"},
		insertion: Insertion.Bottom,
		onCreate: function() {
			/*doLoading();*/
		},
		insertion: Insertion.Bottom,
		onLoaded: function(transport) {},
		onLoading: function(transport) {},
		onSuccess: function(transport) { clearLoading(); },
		onComplete: function(transport) {
			if (transport.status == 200) {
				content.update(transport.responseText);
				contentAnimation();
			}
		},
		onException: function(transport) { alert('Exception'); },
		onFailure: function(transport) { alert('Failure'); }
	});
	
	return false;
}


function doSubMenuPageList()
{
	var args = $A(arguments);
	var posts = doPostBack(args[0]);
	var splits =  doHashSplit(args[0]);
	
	var content = $('page-list');
	var contentJ = $j('#page-list');
	
	var myUpdate = new Ajax.Updater(content,ajaxURL,{
		method: 'post',
		parameters: {kinds: splits[1], types: splits[2], mains: splits[3], subs: splits[4], titles: splits[5], temps: "submenu"},
		insertion: Insertion.Bottom,
		onCreate: function() {
			doLoading();
		},
		insertion: Insertion.Bottom,
		onLoaded: function(transport) {},
		onLoading: function(transport) {},
		onSuccess: function(transport) { clearLoading(); },
		onComplete: function(transport) {
			if (transport.status == 200) {
				content.update(transport.responseText);
			}
		},
		onException: function(transport) { alert('Exception'); },
		onFailure: function(transport) { alert('Failure'); }
	});
	
	return false;
}

function doPageContent()
{
	var args = $A(arguments);
	var posts = doPostBack(args[0]);
	var splits =  doHashSplit(args[0]);
	
	var content = $('center');
	var contentJ = $j('#center');
	
	var myUpdate = new Ajax.Updater(content,ajaxURL,{
		method: 'post',
		parameters: {kinds: splits[1], types: splits[2], mains: splits[3], subs: splits[4], titles: splits[5], temps: "pages"},
		insertion: Insertion.Bottom,
		onCreate: function() {
			doLoading();
		},
		insertion: Insertion.Bottom,
		onLoaded: function(transport) {},
		onLoading: function(transport) {},
		onSuccess: function(transport) { clearLoading(); },
		onComplete: function(transport) {
			if (transport.status == 200) {
				content.update(transport.responseText);
			}
		},
		onException: function(transport) { alert('Exception'); },
		onFailure: function(transport) { alert('Failure'); }
	});
	
	return false;
}


function doContactUs()
{
	/*
	var args = $A(arguments);
	var posts = doPostBack(args[0]);
	var splits =  doHashSplit(args[0]);
	*/
	var content = $('contact-box');
	var contentJ = $j('#contact-box');
	
	
	/*****************/
	
	var txtName = $('txtName').value;
	var txtEmail = $('txtEmail').value;
	var txtSubject = $('txtSubject').value;
	var txtMessage = $('txtMessage').value;
	
	/*****************/

	var myUpdate = new Ajax.Updater("",ajaxURL,{
		method: 'post',
		parameters: {txtName: txtName, txtEmail: txtEmail, txtSubject: txtSubject, txtMessage: txtMessage, temps: "contacts"},
		insertion: Insertion.Bottom,
		onCreate: function() {
			doLoading();
		},
		insertion: Insertion.Bottom,
		onLoaded: function(transport) {},
		onLoading: function(transport) {},
		onSuccess: function(transport) { clearLoading(); },
		onComplete: function(transport) {
			if (transport.status == 200) {
				if(transport.responseText == 1)
				{
					content.update("<br/><h4>Thank You!</h4><br/><b>One of our representatives will be in touch shortly.</b>");
				}
				else
				{
					alert(transport.responseText);
				}
			}
		},
		onException: function(transport) { alert('Exception'); },
		onFailure: function(transport) { alert('Failure'); }
	});

	return false;
}