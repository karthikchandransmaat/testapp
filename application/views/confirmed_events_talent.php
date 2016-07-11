<?php 
error_reporting(0);
include('talent_header.php'); ?>
<?php 

$items_per_group;
$get_total_rows;

$total_groups= ceil($get_total_rows/$items_per_group);	
?>

<script type="text/javascript">
$(document).ready(function() {
	var track_load = 0; //total loaded record group(s)
	var loading  = false; //to prevents multipal ajax loads
	var total_groups = <?=$total_groups;?>; //total record group(s)
	var get_total_rows = <?=$get_total_rows;?>; //total record group(s)
	$('.animation_image').show();
	if(get_total_rows == 0) { 
		$('.animation_image').hide();
	}
	$('#results').load("http://smaatapps.com/nector/website/index.php/confirmed_events_talent/getblogdata/<?php echo $myuser_id ?>", {'group_no':track_load}, function() {track_load++;}); //load first group
	
	$(window).scroll(function() { //detect page scroll
		
		if($(window).scrollTop() + $(window).height() == $(document).height())  //user scrolled to bottom of the page?
		{
			
			if(track_load <= total_groups && loading==false) //there's more data to load
			{
				loading = true; //prevent further ajax loading
				$('.animation_image').show(); //show loading image
				
				//load data from the server using a HTTP POST request
				$.post('http://smaatapps.com/nector/website/index.php/confirmed_events_talent/getblogdata/<?php echo $myuser_id ?>',{'group_no': track_load}, function(data){
									
					$("#results").append(data); //append received data into the element

					//hide loading image
					$('.animation_image').hide(); //hide loading image once data is received
					
					track_load++; //loaded group increment
					loading = false; 
				
				}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
					
					alert(thrownError); //alert with HTTP error
					$('.animation_image').hide(); //hide loading image
					loading = false;
				
				});
				
			}
		}
	});
});
</script>

<body>
  <div class="container">
    <div class="row orangehead">
      <div class="col-md-10">
        
        <div class="dashboard_tab_wrapper">
		<div class="dashboard_tab bring-forward">
            <a href="<?php echo site_url();?>/talent_dashboard/<?php echo $myuser_id ?>">Job listings
            </a>
          </div>
          <div class="dashboard_tab bring-forward clicked">
            <a href="">Confirmed
            </a>
          </div>
		  <div class="dashboard_tab bring-forward">
            <a href="<?php echo site_url();?>/closed_events_talent">Worked Events
            </a>
          </div>
          
          <!--<div class="dashboard_tab bring-forward optionsdrop">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">. . .
                <span class="caret">
                </span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="event-description.php">Project Details
                  </a>
                </li>
                <li>
                  <a href="#">Edit
                  </a>
                </li>
                <li>
                  <a href="#">Delete
                  </a>
                </li>
                <li role="separator" class="divider">
                </li>
                <li>
                  <a href="#">Close
                  </a>
                </li>
              </ul>
            </li>
          </div>-->
		  
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <!-- Start of white box -->
      <div class="col-sm-12 whiteBG invitebox topmargin">
        <div>
          <div class="row">
            <div class="col-xs-9">
              <ul id="tabs" class="nav nav-pills" data-tabs="tabs">                
                <li class="active">
                  <a class="dashboard_tab bring-forward" href="#hired" data-toggle="tab">Confirmed events
                  </a>
                </li>			
              </ul>
              <div class="dashboard_tab_wrapper">
              </div>
            </div>
            <div class="col-xs-3">
              <h5 id="alertmsg" class="error_msg"></h5>
            </div>
          </div>
          <hr>
          <!-- single Person -->
          <div id="my-tab-content" class="tab-content">
            <div class="tab-pane" id="red">
              
             
              
            </div>
            <div class="tab-pane active" id="hired">
              <div class="w-section inverse blog-grid">
					
					<div class="" id="results">
						
					</div>
					<?php 
					if($get_total_rows == 0) { ?>
						 <div class="col-md-12">
							<h4 class="text-center text-warning">No confirmed events</h4>
						 </div>
					<?php }
				?>
					<div class="animation_image"  align="center" style="display:none">						
						<img src="http://smaatapps.com/nector/website/css/ajax-loader.gif" style="width:60px; height:60px;">	
					</div>
				</div>
            </div>
          </div>
        </div>
      </div>
      <!-- End of white box -->
      
    </div>
  </div>
  <?php 
	error_reporting(0);
	include('talent_footer.php'); ?>
</body>
</html>
