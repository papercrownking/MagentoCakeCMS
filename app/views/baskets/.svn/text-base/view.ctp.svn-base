<div class="columns">
<div class="side-col" id="page:left">
	<h3>Basket Information</h3>
	<ul id="customer_info_tabs" class="tabs">
		<li><a class="tab-item-link" href="#customer_main_info"><span>Customer Information</span></a></li>
		<li><a class="tab-item-link" href="#basket_info"><span>Basket Contents</span></a></li>
	</ul>
</div>
<div class="main-col" id="content">
	<div class="main-col-inner">
		<div id="messages">
		</div>
		<div class="content-header">
			<h3>Basket <?php echo $basket_data['Basket']['id']; ?></h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>		
			</p>
		</div>
		<div class="entry-edit">
			<div id="customer_main_info">
				<div class="entry-edit">
					<div class="entry-edit-head"><h4>Customer Information</h4></div>
					<?php if(isset($member_data)): ?>
					<fieldset>
						<table cellspacing="2" class="box-left">
							<tr>
								<td><strong>Web Member ID</strong></td><td><?php echo $member_data['Member']['MemberID']; ?></td>
							</tr>
							<tr>							
								<td><strong>Membership Number</strong></td><td><?php echo $member_data['Member']['MembershipNumber']; ?></td>
							</tr>
							<tr>							
								<td><strong>Member Status</strong></td><td><?php echo $member_data['Member']['MemberStatusCode']; ?></td>
							</tr>
						</table>
						<table cellspacing="2" class="box-right">
							<tr>
								<td><strong>Name</strong></td><td><?php echo $member_data['Member']['Title'].' '.$member_data['Member']['FirstName'].' '.$member_data['Member']['Surname']; ?></td>
							</tr>
							<tr>
								<td><strong>Email</strong></td><td><?php echo $member_data['Member']['Email']; ?></td>
							</tr>
							<tr>							
								<td><strong>Address</strong></td><td><?php echo $member_data['Member']['Address1']; ?><br /><?php echo $member_data['Member']['Address2']; ?><br /><?php echo $member_data['Member']['Address3']; ?><br /><?php echo $member_data['Member']['Address4']; ?><br /><?php echo $member_data['Member']['PostCode']; ?><br /><?php echo $member_data['Member']['CountryCode']; ?></td>
							</tr>
							<tr>
								<td><strong>Phone</strong></td><td><?php echo $member_data['Member']['Phone']; ?></td>
							</tr>
						</table>
					</fieldset>
					<?php else: ?>
					<fieldset>
						<p>NO CUSTOMER DATA AVAILABLE</p>
					</fieldset>
					<?php endif; ?>
				</div>						
			</div>
			
			<div id="basket_info" style="display:none;">
				<div class="entry-edit">
					<div class="entry-edit-head">
						<h4 class="icon-head fieldset-legend">Basket Contents</h4>
					</div>
	
					<div id="dt-shoppingCart-results-ajax">
						<div class="grid">
							<div class="hor-scroll">
								<table cellspacing="0" class="data">	
									<?php if(!empty($basket_data['Basketoffer'])): ?>
										<thead>
											<tr class="headings">
												<th>Catalogue Code</th><th>Title</th><th>Quantity</th><th>Commitment Count</th><th>Added</th>				
											</tr>						
										</thead>
										<tbody>	
										<?php 
											foreach($basket_data['Basketoffer'] as $basketoffer){
							 					echo "<tr class='even'><td>".$basketoffer['OfferCode']."</td><td>".$basketoffer['title']."</td><td>".$basketoffer['quantity']."</td><td>".$basketoffer['CommitmentCount']."</td><td>".$time->niceShort($basketoffer['created'])."</td></tr>";

											}

										?>
									<?php else: ?>
										<tr class="even"><td class="empty-text a-center" colspan="7">No books found.</td></tr>
									<?php endif; ?>
										</tbody>			
								</table>
							</div>
						</div>
					</div>
		
			</div>

			
		</div>
	</div>
</div>
<div class="content-header-floating" style="display:none;">
		<div class="content-header">
			<h3>Basket <?php echo $basket_data['Basket']['id']; ?></h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>		
			</p>
		</div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	var availableTags = <?php echo $JSMemberStatusCodes; ?>;
	$("#MemberStatus").autocomplete({source: availableTags});
	$("#MemberStatusDate").datepicker({dateFormat:"yy-mm-dd",duration:"",constrainInput:false});
	$("#PremierMemberDate").datepicker({dateFormat:"yy-mm-dd",duration:"",constrainInput:false});
	$(".modalview").fancybox({
		maxWidth	: 800,
		fitToView	: false,
		width		: '800px',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
	});
});
</script>
