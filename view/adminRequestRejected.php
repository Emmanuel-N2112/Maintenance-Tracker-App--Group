<?php
	require_once('../includes/adminsession.php');
	require_once('../functions/admin_fns.php');
	
	do_html_header('Rejected Requests');

	include('../functions/headers.php');
	include('../functions/navigations.php');
	
//	include('../includes/header-2.php'); 
//	include('../includes/admin-navigation-1.php');
//	include('../includes/adminSidebar.php');	

	header2();
	admin_navigation1();
	adminSideBar($login_session2);
	
	display_adminRequest_menu3();
	display_adminRequestDetails_content(3);

	include('../includes/footer-2.php'); 
?>