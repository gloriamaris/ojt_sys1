<html dir="ltr" lang="en-US">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<link rel="stylesheet" href="http://localhost/PRDP/misc/css/foundation.css" type="text/css" />
	<style>._css3m{display:none}</style>
	
</head>


<body>
	<div>
		<img src="http://localhost/PRDP/misc/img/logo.gif" class="logo" class="logo"/>
		
		<div class="container" id="panel">
			<center><h4> Philippine Rural Development Program</h4>
			<h5> Mindanao Sub-Project Web Postings</h5></center>
			<br/>
			<?php echo validation_errors(); echo form_open('login/verify_login');?>
			<label><h5>Administrator sign in:</h5></label>
			<input type="text" placeholder="Username" name= "uname">
			<input type="password" placeholder="Password" name = "password">
			<input type="submit" class="small button" value = "Submit"></form>
		</div>
	</div>


</body>


</html>

