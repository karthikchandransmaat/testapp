<div id="masonryWr" class="row" >
<style>
a {
    color: #000;
    text-decoration: none;
}
a:hover, a:focus {
	text-decoration: none;
	color: #D8BE2A;
}
</style>
<!-- Stripe Payment -->
<?php $myuserid = $this->session->userdata('client_id');  ?>
<?php

foreach($events as $key=>$val)
{
	
	 ?>
		 <div class="person">
                <div class="row persona">
                  <div class="col-xs-4 col-sm-3 text-center">
                    <a href="<?php echo base_url();?>index.php/event_detail/<?php echo $val['event_id']; ?>"><img style="width: 120px; height: 120px;" src="<?php echo $val['event_pic']; ?>"></a>
                  </div>
                  <div class="col-xs-8 col-sm-6">
                    <a href="<?php echo base_url();?>index.php/event_detail/<?php echo $val['event_id']; ?>"><h3><?php echo $val['event_name']; ?>
                    </h3></a>
					
					<?php
						$startdatetime = $val['start_datetime'];
						$start_datetime = date('D dS M Y h:i A', strtotime($startdatetime));
						
						$enddatetime = $val['end_datetime'];
						$end_datetime = date('D dS M Y h:i A', strtotime($enddatetime));
					?>
                     <h4><?php echo $start_datetime; ?> - <?php echo $end_datetime; ?>
                    </h4>
					
                    <div class="row uppercase">
                      <div class="col-xs-12">
                        <p>
                          <span class=
                                "glyphicon glyphicon-pushpin">
                          </span><?php echo $val['location']; ?>
                        </p>
                      </div>
                     
                    </div>
                  </div>
                 <div class="col-xs-12 col-sm-3">
				 <?php
					if($val['is_advance_paid'] == 1) { ?>
						<div class="invitebutton">
						  <form role="form" method="POST" action="<?php echo base_url();?>index.php/event_detail">
						  <p class="centerText">
						  <input name="event_id" id="event_id" type="hidden" value="<?php echo $val['event_id']; ?>">
							 <button class="btn btn-submit btn-lg largeHeight" type="submit">View details</button>
						  </p>
						  </form>
						  <form role="form" method="POST" action="<?php echo base_url();?>index.php/invite_talent_search">
							  <p class="centerText ">
							  <input name="event_id" id="event_id" type="hidden" value="<?php echo $val['event_id']; ?>">
								<a href="<?php echo base_url();?>index.php/invite_talent_search/<?php echo $val['event_id']; ?>" class="btn btn-danger btn-lg largeHeight" type="button">Invite Talent</a>
							  </p>	
							</form>
						</div>
				<?php
					}
					else { ?>
						<div class="invitebutton">
						<?php
								 $number_of_talents = $val['number_of_waiters'];
									if($number_of_talents == "1-5") {
										$amount = 50;
									}
									
									if($number_of_talents == "6 - 10") {
										$amount = 100;
									}
									
									if($number_of_talents == "10 - 20") {
										$amount = 150;
									}
									
									if($number_of_talents == "30 - 40") {
										$amount = 200;
									}
									
									if($number_of_talents == "40 - 50") {
										$amount = 250;
									}
									
									if($number_of_talents == "Greater than 50") {
										$amount = 300;
									}
									//echo $amount;
								?>
						<?php if($stripe_id == "") {	?>
							<p data-placement="bottom" data-toggle="tooltip" title="This deposit amount is based on the number of talent required for your event and will go towards the total cost. However, it is non-refundable in case you cancel your event from this stage." class="centerText ">							  
								<button data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-lg largeHeight" type="">Pay deposit $<?php echo $amount; ?></button>
							  </p>						
						<?php }
							else { ?>
							<p class="centerText ">			
								
								  <p data-placement="bottom" data-toggle="tooltip" title="This deposit amount is based on the number of talent required for your event and will go towards the total cost. However, it is non-refundable in case you cancel your event from this stage." class="centerText ">
									<!--<input name="cust_id" id="cust_id" type="hidden" value="<?php $stripe_id; ?>">
									<input name="amt" id="amt" type="hidden" value="<?php $amount; ?>">-->
									 <input type="hidden" value="<?php echo $amount; ?>" id="apply<?php echo $val['event_id']; ?>">
										 <a class="btn btn-primary btn-lg largeHeight once-only" value="<?php echo $amount; ?>" onclick="applytoevent('<?php echo $amount; ?>','<?php echo $val['event_id']; ?>','<?php echo $val['number_of_waiters']; ?>')"
										   role="button" id="btn-paid<?php echo $val['event_id']; ?>" >Pay deposit $<?php echo $amount; ?>
										 </a>
								  </p>	
								
							  </p>
						<?php	}
						?>
								
						</div>
					<?php }
				 ?>
                    
                  </div>
                </div>
                <hr>
              </div>  
			  
			  <!-- Modal -->
			  <div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
				
				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Add card details to pay advance</h4>
					</div>
					<div class="modal-body">
					<!--<div class="form-group">
					  <label for="rejectreason">Reject Reason</label>
					  <input type="text" class="form-control" id="rejectreason">
					</div>-->
									  
						<a class=
					   "btn btn-danger btn-lg largeHeight once-only btn_rejects" href="<?php echo base_url();?>index.php/client_update_payment_details/1"
					   role="button" id="">Add now
					 </a>	
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				  </div>
				  
				</div>
			  </div>
	<?php ?>
	
<?php }

?>
</div>
<script>
 
  function applytoevent(textbox_val,event_id,number_of_waiters){
	  var btn = "#btn-paid"+event_id;
	  $(btn).attr('disabled', true);
		var stripe_id = "<?php echo $stripe_id; ?>"; 
		var myuserid = "<?php echo $myuserid; ?>"; 
		var amount = textbox_val; 
		var no_of_talents_requested = number_of_waiters; 
			
			var url = 'http://smaatapps.com/nector/stripe/payment_advance.php';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'stripe_id':stripe_id,'amount':amount,'event_id':event_id,'client_id':myuserid,'no_of_talents_requested':no_of_talents_requested},
				//'dataType': 'json',
				success: function(data) {
					
					if(data == 1) {
						window.location.reload();
					}
					
				}
			
			});

	}
  </script>
  
  <script>
	$('[data-toggle="tooltip"]').tooltip();   
  </script>