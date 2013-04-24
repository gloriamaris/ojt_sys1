
      <div class="row">
        <div class="large-12 hide-for-small">
 
          <div id="featured">
              <img src="http://placehold.it/1200x200&text=Slide Image" alt="slide image">
		  <hr/>
		  </div>
	
        </div>
		
	  <hr/>
	  <?php
			if(isset($script)):foreach($script as $no):
				echo $no->google_earth_link;
			endforeach;
			endif;
		?>

	  <article>
		<h3>Comments: </h3>
		
		<?php if(isset($records)): foreach($records as $row): ?>
		
			<p><b>Name: </b> <?php echo $row->name; ?>
			<p><b>Comment: </b> <?php echo $row->comment; ?>
			<hr/>
		
		<?php endforeach; ?>
		<?php echo $links; ?>
		<?php endif;?>
		
		<hr/>
		<h3>Write a comment </h3>
		<div class="row">
		  <?php echo validation_errors(); ?>
		  <?php echo form_open('Home/savecomment');?>
		  <input class="h" type="textarea" placeholder="Name (Optional)" name="name">
		  <br/><br/>
		  <input class="h" type="textarea" placeholder="E-mail Address (Required)" name="email_address">
          <br/><br/>
		  <textarea class="b" name="comment"> </textarea>
		  <input class="small button push-8" type="submit" value="submit" name="submit">
		  
		  <?php echo form_close(); ?>
		  <hr/>
		  
		  
        </div>
		
	  </article>
	  
	  
	  
	  
	  <?php $this->load->view('includes/admin_philgeps'); ?>
	  <?php $this->load->view('includes/footer'); ?>
	  </div>

	  
</body>
</html>