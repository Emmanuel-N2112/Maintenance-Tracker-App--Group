<?php
	require_once('../includes/session.php');
	require_once('../functions/content_view_fns.php');
	
	do_html_header('Rejected Orders');

	include('../functions/headers.php');
	include('../functions/navigations.php');
	
//	include('../includes/header-2.php'); 
//	include('../includes/navigation-2.php');
//	include('../includes/userSidebar.php');	

	header2();
	navigation2();
	userSidebar($login_session);

	display_requestDetails_menu3();
	display_requestDetails_content(3);

	include('../includes/footer-2.php'); 
?>