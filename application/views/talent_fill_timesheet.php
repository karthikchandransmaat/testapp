<?php 
error_reporting(0);
include('talent_header.php'); ?>
<body>
<div style="display: none;" class="se-pre-con"></div>
  <div class="container">
    <div class="row orangehead">
      <div class="col-md-10">
        <header class="clearfix">
          <h1 class="event-title"><?php echo $event_detail[0]['event_name']; ?>
            <aside class="below">
			<?php
				$startdatetime = $event_detail[0]['start_datetime'];
				$start_datetime = date('D dS M Y h:i A', strtotime($startdatetime));
				
				$enddatetime = $event_detail[0]['end_datetime'];
				$end_datetime = date('D dS M Y h:i A', strtotime($enddatetime));
			?>
              <?php echo $start_datetime; ?> - <?php echo $end_datetime; ?> 
            </aside>
          </h1>
        </header>
        
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <!-- Start of white box -->
      <div class="col-sm-8 whiteBG invitebox topmargin">
        <div>
          <div class="row">
            <div class="col-xs-12">
              <h3>Check Timesheet for <?php echo $event_detail[0]['event_name']; ?>
              </h3>
              <hr>
			   <div class="col-md-12">
				   <div class="form-group">
					 
					 <h3><span class="pull-left">Rating :</span>
						
							<ul class="list-inline list-unstyled list-active">
								<li><?php $talentrating = $checkin_detail[0]['talent_rating']; ?>
								<?php 
									if($talentrating == 0) { ?>
										&nbsp;<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($talentrating == 1) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($talentrating == 2) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($talentrating == 3) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($talentrating == 4) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($talentrating == 5) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
									<?php }
								?>
								  
								</li>
							</ul>
						</h3>
				   </div>
			   </div>
			   
			   <input type="hidden" value="<?php echo $checkin_detail[0]['number_of_days']; ?>" name="total_days" id="total_days">
			   <input type="hidden" value="<?php echo $checkin_detail[0]['number_of_hours']; ?>" name="total_hrs" id="total_hrs">
			   <input type="hidden" value="<?php echo $checkin_detail[0]['number_of_minutes']; ?>" name="total_mins" id="total_mins">
			  
			  <div class="col-md-4">
				<h4>Days worked : <?php echo $checkin_detail[0]['number_of_days']; ?> </h4>
			  </div>
			  <div class="col-md-4">
				<h4>Hours : <?php echo $checkin_detail[0]['number_of_hours']; ?> </h4>
			  </div>
			  <div class="col-md-4">
				<h4>Minutes : <?php echo $checkin_detail[0]['number_of_minutes']; ?> </h4>
			  </div>
			  <br>
             <form target="_top" data-toggle="validator" enctype="multipart/form-data" id="myForm" class="myForm" action="" method="POST" style="display: none;">
				  
				  <div class="form-group prepend-top col-md-4">
					<label class="" for="">Days
					</label>
					<select class="col-xs-12 form-control form-group" name="days" id="days" >
					  <?php
							$days = range(0,31);
							foreach($days as $key=>$val) { 
							if($key == 0) {
								$key = "0";
							} ?>
								 <option value="<?php echo $key; ?>"><?php echo $val; ?>
									</option>
							<?php }
						?>
					</select>
				  </div>
				  
				  <div class="form-group prepend-top col-md-4">
					<label class="" for="">Hours
					</label>
					<select class="col-xs-12 form-control form-group" name="hours" id="hours" >
					  <?php
							$hours = range(0,24);
							foreach($hours as $key=>$val) { 
							if($key == 0) {
								$key = "0";
							} ?>
								 <option value="<?php echo $key; ?>"><?php echo $val; ?>
									</option>
							<?php }
						?>
					</select>
				  </div>
				  
				  <div class="form-group prepend-top col-md-4">
					<label class="" for="">Minutes
					</label>
					<select class="col-xs-12 form-control form-group" name="minutes" id="minutes" >
					  <?php
							$minutes = range(0,60);
							foreach($minutes as $key=>$val) { 
							if($key == 0) {
								$key = "0";
							} ?>
								 <option value="<?php echo $key; ?>"><?php echo $val; ?>
									</option>
							<?php }
						?>
					</select>
				  </div>
				  
				  <!--<div class="prepend-top form-group col-md-12">
					<label class="pull-left required" for="">Comments
					</label>
					<textarea class="form-control autoresized-textarea clear" rows="7" placeholder="Your comments here" name="comments" id="comments"></textarea>
				  </div>-->
				 
			  </div>
			  
			  <div class="row">
				<div class="col-sm-3 col-xs-1">
				</div>
				<div class="col-sm-2 col-xs-3">
					<a id="submit" name="submit" type="" class="btn btn-submit btn-lg largeHeight">Agree</a>
				</div>
				
				<div class="col-sm-2 col-xs-3">
				<a class=
				   "btn btn-danger btn-lg largeHeight once-only edit-total" value=""
				   role="button" id="btn3">Edit
				 </a>
				</div>
				
				<div class="col-sm-3 col-xs-2">				 
					<a style="display: none;" id="reqcheck" name="reqcheck" type="submit" class="btn btn-submit btn-lg largeHeight">Request recheck</a>				 
				</div>
			  </div>
			  <!-- End demo -->
			</div>
			</form>
            </div>
          </div>
          
        </div>
      </div>
      
    </div>
  </div>
  <?php 
	error_reporting(0);
	include('client_footer.php'); ?>
	<script>
		
		$( "#submit" ).click(function() {
		  timesheet();
		  $(this).attr('disabled', true);
		});
		
		function timesheet(){
			
			var event_id = <?php echo $event_detail[0]['event_id']; ?>;  
			var talent_id = <?php echo $this->session->userdata('talent_id'); ?>; 

			var number_of_days = $("#total_days").val(); 
			var number_of_hours = $("#total_hrs").val(); 
			var number_of_minutes = $("#total_mins").val(); 
			
				var url = 'http://smaatapps.com/nector/webservice/index.php/talent_update_timesheet';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'event_id':event_id,'talent_id':talent_id,'number_of_days':number_of_days,'number_of_hours':number_of_hours,'number_of_minutes':number_of_minutes},
					//'dataType': 'json',
					beforeSend: function(){
					 $(".se-pre-con").show();
				   },
				   complete: function(){
					 $(".se-pre-con").hide();
				   },
					success: function(data) {
						//alert(JSON.stringify(data));
						var message = JSON.stringify(data['StatusCode']);
						var message = message.replace(/\"/g, "");
						
						if(message == "1") {								
							window.location.assign("http://smaatapps.com/nector/website/index.php/closed_events_talent" );
						}
						else {
							var alertmessage = JSON.stringify(data['message']);
							$("#alertmsg").text(alertmessage);
							$("html, body").animate({ scrollTop: 0 }, "slow");
						}
					}
				
				});
	
		}


	</script>
	
	<script>
		
		$( "#reqcheck" ).click(function() {
		  recheck();
		  $(this).attr('disabled', true);
		});
		
		function recheck(){
			
			var event_id = <?php echo $event_detail[0]['event_id']; ?>;  
			var talent_id = <?php echo $this->session->userdata('talent_id'); ?>; 
			
			var days = $( "#days option:selected" ).val(); 
			var hours = $( "#hours option:selected" ).val(); 
			var minutes = $( "#minutes option:selected" ).val();
			
			/*if(days == "-") { 
				var number_of_days = $("#total_days").val(); 
			}
			else { 
				var number_of_days = $( "#days option:selected" ).val(); 
			}
			
			if(hours == "-") { 
				var number_of_hours = $("#total_hrs").val(); 
			}
			else { 
				var number_of_hours = $( "#hours option:selected" ).val(); 
			}
			
			if(minutes == "-") { 
				var number_of_minutes = $("#total_mins").val(); 
			}
			else { 
				var number_of_minutes = $( "#minutes option:selected" ).val(); 
			}*/
			
				var url = 'http://smaatapps.com/nector/webservice/index.php/talent_update_timesheet_recheck';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'event_id':event_id,'talent_id':talent_id,'number_of_days':days,'number_of_hours':hours,'number_of_minutes':minutes},
					//'dataType': 'json',
					beforeSend: function(){
					 $(".se-pre-con").show();
				   },
				   complete: function(){
					 $(".se-pre-con").hide();
				   },
					success: function(data) {
						//alert(JSON.stringify(data));
						var message = JSON.stringify(data['StatusCode']);
						var message = message.replace(/\"/g, "");
						
						if(message == "1") {								
							window.location.assign("http://smaatapps.com/nector/website/index.php/closed_events_talent" );
						}
						else {
							var alertmessage = JSON.stringify(data['message']);
							$("#alertmsg").text(alertmessage);
							$("html, body").animate({ scrollTop: 0 }, "slow");
						}
					}
				
				});
	
		}


	</script>
	
	<script>
  
		$(document).on("click", ".edit-total", function(event){
			$('.myForm').toggle();        
			$('.total').toggle(); 
			$('#reqcheck').toggle();
			
			$(this).text(function(i, text){
				  return text === "Cancel" ? "Edit" : "Cancel";
			  })
		}); 
	
  </script>
</body>
</html>
