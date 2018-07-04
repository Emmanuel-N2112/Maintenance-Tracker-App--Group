<?php
	require_once('functions/output_fns.php');
	
	do_html_header('User Sign Up');
	
	include('functions/headers.php'); 
	include('functions/navigations.php');

	header1();
	navigation1();

	display_sign_up_form();

	include('includes/footer.php'); 
?>
		