
      <div class="row">
        <div class="large-12 hide-for-small">
 
          <div id="featured">
              <center> <a href="http://localhost/PRDP/"><img src="http://localhost/PRDP/misc/img/header.gif" class="v"></a></center>
		  </div>
	
        </div>
		
	  <hr/>
	  <?php
			if(isset($script)):foreach($script as $no):
				echo $no->google_earth_link;
			endforeach;
			endif;
			$sp_number = $this->input->post('link'); 
		?>

	  <article>
	  
		<h3 class="g">Comments </h3>
		
		<?php 
			if(!empty($records)){ 
				foreach($records as $row){ 
		?>
		
				<p><b>Name: </b> <?php echo $row->name; ?>
				<p><b>Date: </b> <?php echo $row->date_posted; ?>
				<p><b>Comment: </b> <?php echo $row->comment; ?>
				<hr/>
		
		<?php 
				}
			}
			else{
				echo 'No comments';
			}
		?>
		
		
		<center><h3 class="g">Write a comment </h3></center>
		
		<div class="row">
		
			<?php 
				echo validation_errors(); 
				echo form_open('Home/savecomment');
			?>
				
			  <input class="h" type="textarea" placeholder="Name (Optional)" name="name"/>
			  <br/><br/>
			  <input class="h" type="textarea" placeholder="E-mail Address (Required)" name="email_address"/>
			  <br/><br/>
			  <textarea class="b" name="comment"> </textarea>
			  <input type="hidden" value=<?php echo $sp_number; ?> name="sp_num"/>
			  <input class="small button push-8" type="submit" value="submit" name="submit"/>
			<?php echo form_close(); ?>
 		  <hr/>
		</div>
		
	  </article>
	  
	  <?php $this->load->view('includes/admin_googleEarth'); ?>
	  
	  <?php $this->load->view('includes/footer'); ?>
	  </div>

	  
</body>
</html>