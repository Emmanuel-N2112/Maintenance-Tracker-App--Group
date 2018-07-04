<?php
	require_once('functions/output_fns.php');
	
	do_html_header('Maintenance Tracker App | Login');
	
	include('functions/headers.php'); 
	include('functions/navigations.php');

	header1();
	navigation1();
	
	display_log_in_form();

	include('includes/footer.php'); 
?>