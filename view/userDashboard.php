<?php
	require_once('../includes/session.php');
	require_once('../functions/content_view_fns.php');
	
	do_html_header('User Dashboard');

	include('../functions/headers.php');
	include('../functions/navigations.php');
	
//	include('../includes/header-2.php'); 
//	include('../includes/navigation-3.php');
//	include('../includes/userSidebar.php');	

	header2();
	navigation3();
	userSidebar($login_session);

	display_dashboard();

	include('../includes/footer-2.php'); 
?>