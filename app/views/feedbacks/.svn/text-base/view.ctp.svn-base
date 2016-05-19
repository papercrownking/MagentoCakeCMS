<div class="columns">
<div class="side-col" id="page:left">
	<h3>Feedback Information</h3>
	<ul id="customer_info_tabs" class="tabs">
		<li><a class="tab-item-link" href="#feedback_main_info"><span>Feedback Information</span></a></li>
	</ul>
</div>
<div class="main-col" id="content">
	<div class="main-col-inner">
		<div id="messages">
		</div>
		<div class="content-header">
			<h3>Feedback #<?php echo $data['Feedback']['id']; ?> </h3>
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
					<fieldset>
						<?php if(isset($data['Member']['MemberID'])): ?>
						<table cellspacing="2" class="box-left">
							<tr>
								<td><strong>Web Member ID</strong></td><td><?php echo $data['Member']['MemberID']; ?></td>
							</tr>
							<tr>							
								<td><strong>Membership Number</strong></td><td><?php echo $data['Member']['MembershipNumber']; ?></td>
							</tr>
							<tr>							
								<td><strong>Member Status</strong></td><td><?php echo $data['Member']['MemberStatusCode']; ?></td>
							</tr>
					
						</table>
						<table cellspacing="2" class="box-right">
							<tr>
								<td><strong>Name</strong></td><td><?php echo $data['Member']['Title'].' '.$data['Member']['FirstName'].' '.$data['Member']['Surname']; ?></td>
							</tr>
							<tr>
								<td><strong>Email</strong></td><td><?php echo $data['Member']['Email']; ?></td>
							</tr>
							<tr>							
								<td><strong>Address</strong></td><td><?php echo $data['Member']['Address1']; ?><br /><?php echo $data['Member']['Address2']; ?><br /><?php echo $data['Member']['Address3']; ?><br /><?php echo $data['Member']['Address4']; ?><br /><?php echo $data['Member']['PostCode']; ?><br /><?php echo $data['Member']['CountryCode']; ?></td>
							</tr>
							<tr>
								<td><strong>Phone</strong></td><td><?php echo $data['Member']['Phone']; ?></td>
							</tr>
						</table>
						<?php else: ?>
							<p>NO MEMBER INFORMATION AVAILABLE.</p>
						<?php endif; ?>
					</fieldset>
				</div>	
				<div class="entry-edit">
					<div class="entry-edit-head"><h4>Feedback</h4></div>
					<fieldset>
						<table cellspacing="2" class="box-left">
							<tr>
								<td><strong>Text</strong></td><td><?php echo $data['Feedback']['text']; ?></td>
							</tr>
							<tr>
								<td colspan="2"><br/></td>
							</tr>
							<tr>							
								<td><strong>Status</strong></td><td><?php echo $data['Feedback']['status']; ?></td>
							</tr>
							<tr>							
								<td><strong>Created</strong></td><td><?php echo $time->niceShort($data['Feedback']['created']); ?></td>
							</tr>					
						</table>
					</fieldset>
				</div>						
			</div>			
		</div>
	</div>
</div>
<div class="content-header-floating" style="display:none;">
		<div class="content-header">
			<h3>Feedback #<?php echo $data['Feedback']['id']; ?> </h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>		
			</p>
		</div>
</div>
</div>
