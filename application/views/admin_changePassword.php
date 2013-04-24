<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PRDP Procurement</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
		
	<link href="http://localhost/PRDP/misc/css/bootstrap.css" rel="stylesheet">
    <link href="http://localhost/PRDP/misc/css/bootstrap-responsive.css" rel="stylesheet">	
    <link href="http://localhost/PRDP/misc/css/foundation.css" rel="stylesheet">
    <link href="http://localhost/PRDP/misc/js/google-code-prettify/prettify.css" rel="stylesheet">
	
</head>

<body>

    
	<?php $this->load->view('includes/admin_header'); ?>

	<div class="span3 push-4">
		  <?php echo form_open('Admin/changepw'); ?>
		  <center>
		  <input class="d" type="password" placeholder="Enter old password" name="oldpw">
		  <br/><br/>
		  <input type="password" placeholder="Enter new password" name="newpw">
		  <input type="password" placeholder="Re-enter new password" name="newpw2">
		  <br/>
		  <br/>
		  <input class="small button" type="submit" value="Submit"></a></center>
		  <?php echo form_close(); ?>

    </div>
	  <hr/>

</body>

</html>