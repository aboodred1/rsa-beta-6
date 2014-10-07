<?php
	include_once("../config.php");
	header("Content-type: text/css");
	$url = "../".$rsa['config']['local_userfiles'];
?>
@CHARSET "ISO-8859-1";
HTML, BODY{
	line-height: normal; height:100%;
}
BODY,DIV,P,DL,DT,DD,UL,OL,LI,H1,H2,H3,H4 ,H5,H6,PRE,FORM,FIELDSET,TEXTAREA,BLOCKQUOTE,TABLE,TH,TD,IMG {
	PADDING:0px; MARGIN: 0px; BORDER: 0px black solid; 
}
A:link {
	COLOR: #fff; TEXT-DECORATION: none;
}
A:visited {
	COLOR: #fff; TEXT-DECORATION: none;
}
A:hover {
	COLOR: #fff; TEXT-DECORATION: underline;
}

BODY {
	BACKGROUND:#fff url('<?php echo $url; ?>images/site_bg.jpg');
}

BODY#page {
	TEXT-ALIGN:center; FONT-FAMILY:Arial, Times New Roman; FONT-SIZE:14px; COLOR:#fff;
}

DIV#frame {
	TEXT-ALIGN:center; MARGIN-LEFT:auto; MARGIN-RIGHT:auto; MARGIN-TOP:10px;
}

DIV#container {
	TEXT-ALIGN:left; POSITION:relative;
}

DIV#loading { POSITION:absolute; TOP:0px; LEFT:0px; Z-INDEX:100; WIDTH:100% HEIGHT:100%; BACKGROUND:black url('<?php echo $url; ?>images/ajax.gif') no-repeat 50% 50%; }

/*****************************************************************/
.dialog {
	position:relative; z-index:1; margin:0px auto; margin-left:12px;  margin-bottom:0px;
}

.dialog .content, .dialog .t, .dialog .b, .dialog .b div {
	background:transparent url('<?php echo $url; ?>images/dialog-black.png') no-repeat top right;
}

/************/

/************/

.dialog .content {
	position:relative; 
}

.dialog .t {
	position:absolute; left:0px; top:0px; width:12px; margin-left:-12px; height:100%; background-position:top left;
}

.dialog .b {
	position:relative; width:100%;
}

.dialog .b, .dialog .b div {
	height:15px;
}

.dialog .b {
	background-position:bottom right;
}

.dialog .b div {
	position:relative; width:12px; margin-left:-12px; background-position:bottom left;
}

/*****************************************************************/

DIV#header-dialog { POSITION:relative; }

DIV#header {
	POSITION:relative; BORDER:0px #000 solid;
}

DIV#header DIV#menu-box {
	POSITION:absolute; TOP:25%; LEFT:210px; WIDTH:620px; BORDER:0px #fff solid;
}

DIV#main-menu {
	WIDTH:620px; HEIGHT:40px; BACKGROUND:transparent url('<?php echo $url; ?>images/menu.png') no-repeat;
}

DIV#main-menu UL {}

DIV#main-menu LI { LIST-STYLE:none; FLOAT:left; HEIGHT:35px; }

DIV#main-menu LI.spacer { WIDTH:3px; BACKGROUND:transparent url('<?php echo $url; ?>images/menu-spacer.png') no-repeat; }

DIV#main-menu LI A { TEXT-ALIGN:center; FONT-WEIGHT:bold; MARGIN:10px 10px 0px 10px; LINE-HEIGHT:35px;}

/*************/

DIV#sub-menu { CLEAR:both; }

DIV#sub-menu UL {}

DIV#sub-menu LI {LIST-STYLE:none; FLOAT:left; }

DIV#sub-menu LI A { TEXT-ALIGN:center; FONT-SIZE:12px; FONT-WEIGHT:bold; MARGIN:10px 10px 0px 10px; }

/*****************************************************************/

DIV#center-dialog { POSITION:relative; }

DIV#center { POSITION:relative; PADDING:15px 0px 10px 0px; }

DIV#center LI { LIST-STYLE:none; }

/*************/
/*  featured */
/*************/

DIV#featured { POSITION:relative; }

DIV#featured-left {
	POSITION:absolute; TOP:0px; LEFT:0px; WIDTH:280px; PADDING:10px; BACKGROUND:transparent url('<?php echo $url; ?>images/left-nav.png') no-repeat; Z-INDEX:2;
}

DIV#featured-nav { }

DIV#featured-nav UL {}

DIV#featured-nav LI {
	LIST-STYLE:none; FLOAT:left; MARGIN:8px; BORDER:2px #97a44d dashed; WIDTH:100px; HEIGHT:100px; PADDING:10px; CURSOR:pointer;
}

DIV#featured-nav LI:HOVER { BACKGROUND:#97a44d none; BORDER:2px #97a44d solid; }

DIV#featured-sec { OVERFLOW: hidden; }

DIV#featured-sec UL { WIDTH: 3660px; }

DIV#featured-sec LI { FLOAT: left; LIST-STYLE:none; }

TABLE.featured-table TD.left { WIDTH:350px; }

TABLE.featured-table TD.right { COLOR:#fff; FONT-SIZE:30px; FONT-WEIGHT:bold; } 

/*****************/
/*  menu static */
/*****************/
DIV#menu-static { POSITION:relative; }

DIV#menu-static UL {}

DIV#menu-static LI.menu-static { 
	LIST-STYLE:none; FLOAT:left; PADDING:10px; BACKGROUND:transparent url('<?php echo $url; ?>images/left-nav.png');
}

DIV#menu-static LI.left { WIDTH:390px; }

DIV#menu-static LI.right { WIDTH:390px;  }

/*****************/
/*  menu content */
/*****************/

DIV#menu-content { POSITION:relative; }

DIV#menu-content UL {}

DIV#menu-content LI.menu-content { 
	LIST-STYLE:none; FLOAT:left; PADDING:10px; BACKGROUND:transparent url('<?php echo $url; ?>images/left-nav.png');
}

DIV#menu-content LI.left { WIDTH:280px; }

DIV#menu-content LI.center { WIDTH:230px; }

DIV#menu-content LI.right { WIDTH:250px;  }

/******************/
/*  featured news */
/******************/

DIV#menu-news { POSITION:relative; }

DIV#menu-news UL {}

DIV#menu-news LI.menu-news { 
	LIST-STYLE:none; FLOAT:left; PADDING:10px; BACKGROUND:transparent url('<?php echo $url; ?>images/left-nav.png');
}

DIV#menu-news LI.left { WIDTH:280px; }

DIV#menu-news LI.center { WIDTH:240px; }

DIV#menu-news LI.right { WIDTH:240px;  }

/*************/
/*  contacts */
/*************/

DIV#menu-contacts { POSITION:relative; }

DIV#menu-contacts UL {}

DIV#menu-contacts LI.menu-contacts { 
	LIST-STYLE:none; FLOAT:left; PADDING:10px; BACKGROUND:transparent url('<?php echo $url; ?>images/left-nav.png');
}

DIV#menu-contacts LI.left { WIDTH:390px; }

DIV#menu-contacts LI.right { WIDTH:390px;  }

DIV#contact-box {}

DIV#contact-box SPAN { DISPLAY:block; }

DIV#contact-box .inputs { 
	WIDTH:280px; MARGIN:5px 0px 10px 0px; border:2px solid #97a44d; COLOR:#000; PADDING:3px;
}

DIV#contact-box TEXTAREA.inputs {
	HEIGHT:80px;
}

/***********/
/*  photos */
/***********/

DIV#photos { POSITION:relative; }

DIV#photos-nav { }

DIV#photos-nav UL {}

DIV#photos-nav LI {
	LIST-STYLE:none; FLOAT:left; MARGIN:2px; BORDER:2px #97a44d solid; PADDING:2px; CURSOR:pointer;
}

DIV#photos-sec { OVERFLOW: hidden; }

DIV#photos-sec UL { WIDTH: 3660px; }

DIV#photos-sec LI { FLOAT: left; LIST-STYLE:none; WIDTH:360px; }

/***********/
/*  teams */
/***********/

DIV#menu-teams { POSITION:relative; }

DIV#menu-teams UL {}

DIV#menu-teams LI.menu-teams { 
	LIST-STYLE:none; FLOAT:left; PADDING:10px; BACKGROUND:transparent url('<?php echo $url; ?>images/left-nav.png');
}

DIV#menu-teams LI.left { WIDTH:280px; }

DIV#menu-teams LI.center { WIDTH:200px; }

DIV#menu-teams LI.right { WIDTH:280px;  }



DIV#pane-target {
	POSITION: relative; OVERFLOW: hidden; WIDTH: 250px; HEIGHT: 320px; CLEAR: left;
}

DIV#pane-target UL { WIDTH: 500px; HEIGHT: 800px; }


DIV#pane-target LI {
	POSITION: relative; WIDTH: 250px; HEIGHT: 320px; FLOAT:left; 
}


/***********/
/*  files  */
/***********/


DIV#menu-files { POSITION:relative; OVERFLOW:auto; }

DIV#menu-files UL {  }

DIV#menu-files LI.menu-files { 
	LIST-STYLE:none;
}

DIV#menu-files LI.top { PADDING:10px 10px 0px 10px; BACKGROUND:transparent url('<?php echo $url; ?>images/left-nav.png');}

DIV#menu-files LI.bottom { PADDING:10px 10px 0px 10px; }

DIV#menu-files LI.bottom LI IMG {PADDING-RIGHT:3px;}

DIV#menu-files LI.bottom LI {
	FLOAT:left; WIDTH:180px; HEIGHT:135px; MARGIN:0px 10px 15px 0px; PADDING:2px; BORDER:1px #fff solid; BACKGROUND:transparent url('<?php echo $url; ?>images/left-nav.png');
}

/***************/
/*  portfilio  */
/***************/

/*****************************************************************/

/* subs */

/*****************************************************************/




DIV#sub-content { POSITION:relative; }

DIV#sub-content UL {}

DIV#sub-content LI.sub-content { 
	LIST-STYLE:none; FLOAT:left; PADDING:10px; BACKGROUND:transparent url('<?php echo $url; ?>images/left-nav.png');
}

DIV#sub-content LI.left { WIDTH:390px; }

DIV#sub-content LI.right { WIDTH:390px;  }

/*****************************************************************/

/* pages */

/*****************************************************************/

/*********/
/* pages static */

/*********/

DIV#page-content { POSITION:relative; }

DIV#page-content UL {}

DIV#page-content LI.page-content { 
	LIST-STYLE:none; FLOAT:left; PADDING:10px; BACKGROUND:transparent url('<?php echo $url; ?>images/left-nav.png');
}

DIV#page-content LI.left { WIDTH:390px; }

DIV#page-content LI.right { WIDTH:390px;  }





/*****************************************************************/

.float-left { FLOAT: left; OVERFLOW: hidden; }

.float-right {FLOAT: right; OVERFLOW: hidden; }

.float-clear { CLEAR:both; }

.width100 { WIDTH:100%; }

.width820 { WIDTH:820px; }

.width825 { WIDTH:825px; }

.width850 { WIDTH:850px; }

.height100 {  }

.height420 { HEIGHT:420px; }

.height400 { HEIGHT:400px; }

.height380 { HEIGHT:380px; }

.height370 { HEIGHT:370px; }

.height360 { HEIGHT:360px; }