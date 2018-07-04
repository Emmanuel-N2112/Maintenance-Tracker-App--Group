<?php
	require_once('../includes/session.php');
	require_once('../functions/content_view_fns.php');

	do_html_header('Add Device');	

	include('../functions/headers.php');
	include('../functions/navigations.php');

//	include('../includes/header-3.php');
//	include('../includes/navigation-2.php');
//	include('../includes/userSidebar.php');	

	header3(); 
	navigation2();
	userSideBar($login_session);

	display_addDevice_content();

	include('../includes/footer-2.php'); 
?>