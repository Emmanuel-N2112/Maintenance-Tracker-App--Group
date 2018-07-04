<?php
	require_once('functions/output_fns.php');
	
	do_html_header('Administrator Login');
	
	include('functions/headers.php'); 
	include('functions/navigations.php');

	header1();
	navigation1();

	display_admin_log_in_form();

	include('includes/footer.php'); 
?>