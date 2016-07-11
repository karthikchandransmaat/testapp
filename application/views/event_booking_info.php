<style>
.detail a {
    color: #000;
    text-decoration: none;
}
.detail a:hover, .detail a:focus {
	text-decoration: none;
	color: #D8BE2A;
}
</style>
<?php 

$event_id = $event_detail[0]['event_id'];

$query=$this->db->query("SELECT * from invite_talent_to_event WHERE status IN (1,3) AND client_id = ".$myuser_id." AND event_id = ".$event_id." ");			
$data = $result = $query->result_array();
$my_events_list = $this->get_talent_list_model->talent_details($data);

$is_advance_paid = $event_detail[0]['is_advance_paid'];			
?>

<div id="container">
   
	<!-- End of white box -->
      <div class="col-sm-4 topmargin listings-invitebar">
        <section class="clearfix whiteBG classWithPadLeft">
          <div class="">
            <form role="form" method="POST" action="<?php echo base_url();?>index.php/invite_talent_search">
			  <p class="centerText ">
			  <?php 
				$status = $event_detail[0]['launch_status'];
				if(($status == 0) && ($is_advance_paid == 1)) {
			  ?>
			  <input name="event_id" id="event_id" type="hidden" value="<?php echo $event_detail[0]['event_id']; ?>">
				<a href="<?php echo base_url();?>index.php/invite_talent_search/<?php echo $event_detail[0]['event_id']; ?>" class="btn btn-submit btn-lg btn-block largeHeight" type="submit">Invite Talent</a>
				<?php } ?>
				
				<?php 
					if(($status == 1) || ($is_advance_paid == 0)) {
				?>
				<button class="btn btn-submit btn-lg btn-block largeHeight" type="submit" disabled>Invite Talent</button>
					<?php } ?>
			  </p>	
			</form>
          </div>
          <div class="text-center">
            <strong>Invite more talent members to your event 
            </strong>
          </div>
          <hr>
		  <?php
				$startdatetime = $event_detail[0]['start_datetime'];
				$start_datetime = date('Y-m-d h:i A', strtotime($startdatetime));
				
				$checkindatetime = $event_detail[0]['end_datetime'];
				$checkindatetime = date('Y-m-d h:i A', strtotime($checkindatetime));
								
				$datetime1 = new DateTime($start_datetime);
				$datetime2 = new DateTime($checkindatetime);
				$interval = $datetime1->diff($datetime2);
				$total_hours = $interval->format('%a days %h hours %i minutes'); 
				
				$total_days = $interval->format('%a'); 
				$total_hrs = $interval->format('%h'); 
				if($total_days != 0) {
					$total_hrs = $total_hrs + ($total_days * 24);
				}
				
				$total_mins = $interval->format('%i'); 
				
				$mins = round($total_mins/60 * 100);
				$hrs_mins = $total_hrs . "." . $mins;
			?>
          <div class="row proposaldata">
            <div class="col-xs-4">
              <h3 id="number"><?php echo $hired_info[0]['pending_count']; ?>  
              </h3>
              <span class="detail"><a href="<?php echo base_url();?>index.php/client_proposals_pending/<?php echo $event_detail[0]['event_id']; ?>"><p id="subtext">pending
              </p></a></span>
            </div>
            <div class="col-xs-4">
              <h3 id="number"><?php echo $hired_info[0]['hired_count']; ?>  
              </h3>
              <span class="detail"><a href="<?php echo base_url();?>index.php/client_proposals_hired/<?php echo $event_detail[0]['event_id']; ?>"><p id="subtext">hired
              </p></a></span>
            </div>
            <div class="col-xs-4">
			<?php 
				$hired_count = $hired_info[0]['hired_count'];
				$hired_amount = $hired_info[0]['total_amount'];
				if($hired_amount ==  "") {
					$hired_amount = "0";
				}
			?>
              <h3 data-placement="bottom" data-toggle="tooltip" title="This is the estimated price for your event based on the hours and numbers of talent needed. Should this change during the event we will automatically add or refund the amended amount." id="number">$<?php /*$total_hours_est = $hrs_mins;
			  $total_talents = $hired_info[0]['hired_count'];
			  $per_hour = $total_talents * 30;
			  $total_amt = $total_hours_est * $per_hour; echo $total_amt;*/
			  ?>
			  <?php
					$this->db->select('*');
					$this->db->from('talent_hourly_pay');		
					$query = $this->db->get();
					$result = $query->result_array(); 
					$per_hour = $result[0]['per_hour'];
					$total_hours_est = $hrs_mins;
					$per_talent_amt = "";
					
						foreach($my_events_list as $val)
						{		
								$talent = $val['talent'][0];
								$talent['talent_id'];
								$talent_amount = $talent['amount'];
								
								if($talent['amount'] == 0){
									$per_talent_amt = $per_talent_amt + ($total_hours_est * $per_hour);
								}
								else {
									$per_talent_amt = $per_talent_amt + ($total_hours_est * $talent_amount);
								}
						}
					  ?>
					 <?php echo $per_talent_amt; ?>
                </h3>
              <p id="subtext">estimated price
              </p>
            </div>
          </div>
          <div class="">
			
				<?php 
			
					if(($status == 0) && ($hired_count != 0)) {
				?>
				<span data-placement="bottom" data-toggle="tooltip" title="‘By clicking 'Book now' you are confirming the event and can check in your talent. ‘You should click book now once you have hired enough talent for your event. Your card won’t get charged at this point’."><a class="btn btn-danger btn-lg btn-block largeHeight" href="<?php echo base_url();?>index.php/management/<?php echo $event_id ?>" type="submit">Book Now</a></span>
					<?php } ?>
				<?php 
			
					if(($status == 1) || ($hired_count == 0) ) {
				?>
				<button class="btn btn-danger btn-lg btn-block largeHeight" type="submit" disabled>Book Now</button>
					<?php } ?>
					
			
            <!--<p class="centerText btn-group-justified">
              <a class=
                 "btn btn-book btn-lg largeHeight" href=""
                 role="button">BOOK NOW
              </a>
            </p>-->
          </div>
        </section>
      </div>
    
 
  </div><!-- #container -->
  
