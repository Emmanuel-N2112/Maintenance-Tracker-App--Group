<?php
	require_once('../includes/session.php');
	require_once('../functions/content_view_fns.php');
	
	do_html_header('Closed Orders');

	include('../functions/headers.php');
	include('../functions/navigations.php');

//	include('../includes/header-2.php'); 
//	include('../includes/navigation-2.php');
//	include('../includes/userSidebar.php');	

	header2();
	navigation2();
	userSidebar($login_session);

	display_requestDetails_menu4();
	display_requestDetails_content(4);

	include('../includes/footer-2.php'); 
?>