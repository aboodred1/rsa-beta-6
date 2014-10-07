<?php
	
	$rsa['config']['home_link'] = "";//"http://".$_SERVER['SERVER_NAME']."/";
	$rsa['config']['local_link'] = $rsa['config']['home_link'];
	$rsa['config']['local_functions'] = $rsa['config']['local_link']."functions/";
	$rsa['config']['local_userfiles'] = $rsa['config']['local_link']."userfiles/";
	$rsa['config']['local_includes'] = $rsa['config']['local_link']."includes/";
	$rsa['config']['local_metatags'] = $rsa['config']['local_link']."metatags/";
	$rsa['config']['local_webadmin'] = $rsa['config']['local_link']."admin/";
	$rsa['config']['local_content'] = $rsa['config']['local_link']."content/";
	$rsa['config']['local_view'] = $rsa['config']['local_link']."views/";
	$rsa['config']['local_ajax'] = $rsa['config']['local_link']."ajax/";
	$rsa['config']['local_css'] = $rsa['config']['local_link']."css/";
	$rsa['config']['local_js'] = $rsa['config']['local_link']."js/";
	
	/****************************************************************/
	
	$rsa['config']['root_dir'] = $_SERVER['DOCUMENT_ROOT']."/rsabeta6/";
	$rsa['config']['root_local'] = $rsa['config']['root_dir'];
	$rsa['config']['root_functions'] = $rsa['config']['root_local']."functions/";
	$rsa['config']['root_userfiles'] = $rsa['config']['root_local']."userfiles/";
	$rsa['config']['root_includes'] = $rsa['config']['root_local']."includes/";
	$rsa['config']['root_metatags'] = $rsa['config']['root_local']."metatags/";
	$rsa['config']['root_classes'] = $rsa['config']['root_local']."classes/";
	$rsa['config']['root_content'] = $rsa['config']['root_local']."content/";
	$rsa['config']['root_webadmin'] = $rsa['config']['root_local']."admin/";
	$rsa['config']['root_view'] = $rsa['config']['root_local']."views/";
	$rsa['config']['root_ajax'] = $rsa['config']['root_local']."ajax/";
	$rsa['config']['root_css'] = $rsa['config']['root_local']."css/";
	$rsa['config']['root_js'] = $rsa['config']['root_local']."js/";
	
	/****************************************************************/
	
	$rsa['variable']['page_number'] = 0;
	$rsa['variable']['page_search'] = 0;
	$rsa['variable']['page_slid'] = 0;
	$rsa['variable']['page_article'] = 0;
	$rsa['variable']['page_topic'] = 0;
	$rsa['variable']['page_product'] = 0;
	$rsa['variable']['page_option'] = "";
	$rsa['variable']['page_type'] = "";
	$rsa['variable']['page_ip'] = $HTTP_SERVER_VARS["REMOTE_ADDR"];
	$rsa['variable']['page_url'] = $_SERVER['QUERY_STRING'];
	$rsa['variable']['page_session'] = session_id();
	$rsa['variable']['page_datetime'] = date("Y-d-m H:i:s");
	$rsa['variable']['page_date'] = date("m/d/Y");
	$rsa['variable']['page_time'] = time();
	
	/****************************************************************/
	
?>