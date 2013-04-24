      <div class="row">
        <div class="large-12 hide-for-small">
 
          <div id="featured">
              <img src="http://placehold.it/1200x200&text=Slide Image" alt="slide image">
              <!-- <img src="http://placehold.it/1200x500&text=Slide Image" alt="slide image"> 
              -->
		  <hr/>
		  </div>
		
        </div>
		
		<!--Manual PHP Codes -->
		
		<?php
			echo validation_errors();
			echo form_open('Home/Search');
		?>
		
			<input class ="c" type="textarea" placeholder="Search Sub-project Name/Municipality" name="search">
			<input class="small button" id="f" type="submit" value="Submit" name="submit">
			
		<?php
			echo form_close();
		?>

		<center><label><h3 class= "g">Search Results </h3></label></center>
		
		<table height="0%" border="1" align="center" cellpadding="5" cellspacing="2">
		<th> Sub-Project Name </th>
		<th> Sub-Project Description </th>
		<th> Municipality/City </th>
		<th> Province </th>
		<th> Start Date<br/>(YYYY/MM/DD) </th>
		<th> End Date<br/>(YYYY/MM/DD) </th>
		<th> GoogleEarth<br/>Link </th>
		<th> Philippine Bidding Documents </th>
		<?php
		if(!empty($results)){
			foreach ($results as $data){			
			
				echo "<tr>
					  <td><center> $data->sp_name </center></td>
					  <td><center> $data->sp_description </center></td>
					  <td><center> $data->municipality </center></td>
					  <td><center> $data->province </center></td>
					  <td><center> $data->start_date </center></td>
					  <td><center> $data->valid_period </center></td>"
		?>
				  <td><?php echo validation_errors(); echo form_open('Home/googleEarth'); ?><center><input type = "image" value = "<?php echo $data->sp_number;?>" name = 'link' src="http://localhost/PRDP/misc/img/gearth.png" height=50></center></td>
				  <td><a href=http://localhost/PRDP/index.php/Home/downloadFile?&sp_number=<?php echo $data->sp_number?>> <center> Download PDF <br/> <img src="http://localhost/PRDP/misc/img/download-icon.png" style="width: 40%;" /> </center> </a> </td>
						<?php		  
					"</tr>";					
			}
		}
		else{
			?>
				<script>
					var msg = 'Search returned 0 results'
					alert(msg);
				</script>
			<?php
		}
		?>
		</table>

	  <div class="large-9 columns pull-left" role="content">		
	  </div>
	  <hr/>
	  <?php $this->load->view('includes/admin_philgeps'); ?>