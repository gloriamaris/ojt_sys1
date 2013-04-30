<div class="row">
    <div class="large-12 columns">
 
    <!-- Content Slider -->
 
      <div class="row">
        <div class="large-12 hide-for-small">
 
          <div id="featured">
              <center> <a href="http://localhost/PRDP/"><img src="http://localhost/PRDP/misc/img/header.gif" class="v"></a></center>
		  <hr/>
		  </div>
		
        </div>
		
		<!-- PHP Codes -->
		
		<?php
			echo validation_errors();
			echo form_open('Home/Search');
		?>
		
			<input class="c" type="textarea" placeholder="Search Sub-project Name/Municipality" name="search">
			<input class="small button" id="f" type="submit" value="Search" name="submit">
			
			<?php echo validation_errors(); ?>
			<?php echo form_open('Admin/filter_by_month'); ?>
			<?php 
				$month_today = date('m');
				$current_year = date('Y');
				switch($month_today){
					case 1:
						$month = 'January';
						break;
					case 2:
						$month = 'February';
						break;
					case 3:
						$month = 'March';
						break;
					case 4:
						$month = 'April';
						break;
					case 5:
						$month = 'May';
						break;
					case 6:
						$month = 'June';
						break;
					case 7:
						$month = 'July';
						break;
					case 8:
						$month = 'August';
						break;
					case 9:
						$month = 'September';
						break;
					case 10:
						$month = 'October';
						break;
					case 11:
						$month = 'November';
						break;
					case 12:
						$month = 'December';
						break;
				}				
			?>

				<ul class="nav nav-pills pull-right" id="f">  
					<li class="dropdown all-camera-dropdown">  
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">  
							Archives  
							<b class="caret"></b>  
						</a>  
								<ul class="dropdown-menu">  
									<li data-filter-camera-type="all"><a href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=01	>January</a></li>
									<li data-filter-camera-type="all"><a href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=02>February</a></li>
									<li data-filter-camera-type="all"><a href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=03>March</a></li>
									<li data-filter-camera-type="all"><a href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=04>April</a></li>
									<li data-filter-camera-type="all"><a href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=05>May</a></li>  
									<li data-filter-camera-type="Alpha"><a href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=06>June</a></li>  
									<li data-filter-camera-type="Zed"><a href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=07>July</a></li>  
									<li data-filter-camera-type="Bravo"><a href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=08>August</a></li>  
									<li data-filter-camera-type="Bravo"><a href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=09>September</a></li>  
									<li data-filter-camera-type="Bravo"><a href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=10>October</a></li>  
									<li data-filter-camera-type="Bravo"><a href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=11>November</a></li>  
									<li data-filter-camera-type="Bravo"><a href=http://localhost/PRDP/index.php/Home/filter_by_month?&month=12>December</a></li>  

								</ul>  
					</li>
				</ul>


			<?php echo form_close(); ?>

			
		<?php echo form_close(); ?>

		<center><label><h3 class= "g">Sub-projects for Bidding<br> <?php echo $month.' '; echo $current_year; ?>  </h3></label></center>
		
		<table height="0%" border="1" align="center" cellpadding="5" cellspacing="2">
		<th> Sub-Project Name </th>
		<th> Sub-Project Description </th>
		<th> Municipality/City </th>
		<th> Province </th>
		<th> Start Date<br/>(YYYY/MM/DD) </th>
		<th> End Date<br/>(YYYY/MM/DD) </th>
		<th> GoogleEarth<br/>Link </th>
		<th> Philippine Bidding Documents </th>
		<th> PhilGEPS Link </th>
		<?php
		
		foreach ($table as $data):
			$start_date = $data->start_date;
			$end_date = $data->valid_period;
			$current_date = date('Y-m-d');
			
			if ($start_date<=$current_date && $current_date<=$end_date){
			echo "<tr>
				  <td><center> $data->sp_name </center></td>
				  <td><center> $data->sp_description </center></td>
				  <td><center> $data->municipality </center></td>
				  <td><center> $data->province </center></td>
				  <td><center> $data->start_date </center></td>
				  <td><center> $data->valid_period </center></td>"
				  
			?>
		
				  <td><?php echo validation_errors(); echo form_open('Home/googleEarth'); ?><center><br/><input type = "image" value = "<?php echo $data->sp_number;?>" name = 'link' src="http://localhost/PRDP/misc/img/gearth.png" height=48 style="margin-top:-1em;"><a> Google Earth </a><br/></center></td>
				  <td><a href=http://localhost/PRDP/index.php/Home/downloadFile?&sp_number=<?php echo $data->sp_number?>> <center> <img src="http://localhost/PRDP/misc/img/download-icon.png" style="width: 55%;"/><br/>Download PDF <br/> </center> </a> </td>
				  <td><a href= <?php echo $data->philgeps_link ?> target = _blank> <center> <img src="http://localhost/PRDP/misc/img/philgeps_logo.png" style="width:4em;" />  PhilGEPS Link <br/></center> </a> </td>
			<?php		  
				  "</tr>";			
				}
			endforeach;		
			?>
		</table>
		
	  </div>
	  <hr/>
 
	<?php $this->load->view('includes/admin_philgeps'); ?>
</body>
</html>