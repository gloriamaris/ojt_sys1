<?php $this->load->view('includes/admin_header') ?>
	
	<link href="http://localhost/PRDP/misc/css/bootstrap.css" rel="stylesheet">
	
    <link href="http://localhost/PRDP/misc/css/bootstrap-responsive.css" rel="stylesheet">	
	
	<?php foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>

	
	<div class="large-5">
	
		<center>
			<div class="large-2">
             <?php echo $output; ?>	
            </div>
		</center>
	<hr/>
	<?php $this->load->view('includes/footer'); ?>
	</div>
	

	<?php $this->load->view('includes/admin_footer') ?>
</body>
	
