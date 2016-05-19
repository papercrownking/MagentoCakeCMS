<div class="columns">
<div class="side-col" id="page:left">
	<h3>Customer Information</h3>
	<ul id="customer_info_tabs" class="tabs">
		<li><a class="tab-item-link" href="#customer_main_info"><span>Customer View</span></a></li>
		<li><a class="tab-item-link" href="#customer_account_info"><span>Account Information</span></a></li>
		<li><a class="tab-item-link" href="#web_account_info"><span>Web Information</span></a></li>		
		<li><a class="tab-item-link" href="#web_orders_info"><span>Web Orders</span></a></li>	
	</ul>
</div>
<div class="main-col" id="content">
	<div class="main-col-inner">
		<div id="messages">
		</div>
		<div class="content-header">
			<h3><?php echo $data['Member']['FirstName'].' '.$data['Member']['Surname']; ?></h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>
				<button id="view-as-user" title="View Site As Customer" type="button" class="scalable go" onclick="location.href='http://www.foliosociety.com/1963?code=DUMMY<?php echo $data['Member']['MemberID']; ?>'" style="">
					<span><span><span>View Site As Customer</span></span></span>
				</button>	
				<button id="save-user" title="save customer" type="button" class="scalable save" onclick="submitForm('MemberEditForm');"> 
					<span><span><span>Save Customer</span></span></span>
				</button>		
			</p>
		</div>
		<form enctype="multipart/form-data" method="post" id="MemberEditForm" action="/cmsv3/members/edit">
		<input type="hidden" name="data[Member][MemberID]" id="hiddenID" value="<?php  echo $data['Member']['MemberID']; ?>" />		
		<div class="entry-edit">
			<div id="customer_main_info">
				<div class="entry-edit">
					<div class="entry-edit-head"><h4>Personal Information</h4></div>
					<fieldset>
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
							<tr>							
								<td><strong>UserName</strong></td><td><?php echo $data['Member']['UserName']; ?></td>
							</tr>
							<tr>							
								<td><strong>Last Logged In</strong></td><td><?php echo $this->Time->nice($data['Member']['LDate']); ?></td>
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
					</fieldset>
				</div>			
				<dl id="customer_actions_info" class="accordion">
					<dt id="dt-shoppingCart">
						<a href="" rel="/cmsv3/members/getAjaxBasket/<?php echo $data['Member']['MemberID']; ?>" id="customer_actions_info_sc"  class="ajaxPost" onclick="updateAccordion('customer_actions_info_sc'); return false;">Customer Basket</a>
					</dt>
					<dd id="dt-shoppingCart-results">
					</dd>
					<dt id="dt-reviews">
						<a href="" rel="/cmsv3/members/getAjaxReview/<?php echo $data['Member']['MemberID']; ?>" id="customer_actions_info_rv"  class="ajaxPost" onclick="updateAccordion('customer_actions_info_rv'); return false;">Book Reviews</a>
					</dt>
					<dd id="dt-reviews-results">
						
					</dd>
				</dl>			
			</div>
			<div id="customer_account_info" style="display:none;">
				<div class="entry-edit">
					<div class="entry-edit-head">
						<h4 class="icon-head fieldset-legend">Account Information</h4>
					</div>
					<div class="fieldset">
						<div class="hor-scroll">
							<table cellspacing="0" class="form-list">
								<tbody>
									<tr>
										<td class="label"><label for="Title">Title<span class="required">*</span></label></td>
										<td class="value"><?php  echo $form->input('Member.Title',array('type'=>'select','label'=>'','class'=>'required-entry select' ,'options'=>$salutations,'value'=>$data['Member']['Title']));?></td>
									</tr>
									<tr>
										<td class="label"><label for="FirstName">First Name<span class="required">*</span></label></td>
										<td class="value"><input id="FirstName" name="data[Member][FirstName]" class="input-text" type="text" value="<?php echo $data['Member']['FirstName']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="Surname">Surname<span class="required">*</span></label></td>
										<td class="value"><input id="Surname" name="data[Member][Surname]" class="input-text" type="text" value="<?php echo $data['Member']['Surname']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="Email">Email<span class="required">*</span></label></td>
										<td class="value"><input id="Email" name="data[Member][Email]" class="input-text" type="text" value="<?php echo $data['Member']['Email']; ?>"/></td>
									</tr>
									<tr>
										<td colspan="2"><br /></td>
									</tr>
									<tr>
										<td class="label"><label for="Address1">Address 1<span class="required">*</span></label></td>
										<td class="value"><input id="Address1" name="data[Member][Address1]" class="input-text" type="text" value="<?php echo $data['Member']['Address1']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="Address2">Address 2</label></td>
										<td class="value"><input id="Address2" name="data[Member][Address2]" class="input-text" type="text" value="<?php echo $data['Member']['Address2']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="Address3">Address 3</label></td>
										<td class="value"><input id="Address3" name="data[Member][Address3]" class="input-text" type="text" value="<?php echo $data['Member']['Address3']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="Address4">Address 4</label></td>
										<td class="value"><input id="Address4" name="data[Member][Address4]" class="input-text" type="text" value="<?php echo $data['Member']['Address4']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="PostCode">Post/Zip Code<span class="required">*</span></label></td>
										<td class="value"><input id="PostCode" name="data[Member][PostCode]" class="input-text" type="text" value="<?php echo $data['Member']['PostCode']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="CoutryCode">CountryCode<span class="required">*</span></label></td>
										<td class="value"><input id="CountryCode" name="data[Member][CountryCode]" class="input-text" type="text" value="<?php echo $data['Member']['CountryCode']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="Phone">Phone</label></td>
										<td class="value"><input id="Phone" name="data[Member][Phone]" class="input-text" type="text" value="<?php echo $data['Member']['Phone']; ?>"/></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div id="web_account_info" style="display:none;">
				<div class="entry-edit">
					<div class="entry-edit-head">
						<h4 class="icon-head fieldset-legend">Web Information</h4>
					</div>
					<div class="fieldset">
						<div class="hor-scroll">
							<table cellspacing="0" class="form-list">
								<tbody>
									<tr>
										<td class="label"><label for="MemberStatus">Member Status<span class="required">*</span></label></td>
										<td class="value"><input id="MemberStatus" name="data[Member][MemberStatusCode]" class="input-text" type="text" value="<?php echo $data['Member']['MemberStatusCode']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="MemberStatusDate">Member Status Date</label></td>
										<td class="value"><input id="MemberStatusDate" name="data[Member][MemberStatusDate]" class="input-text" type="text" value="<?php echo $data['Member']['MemberStatusDate']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="SubStatus">Sub-Status</label></td>
										<td class="value"><input id="SubStatusCode" name="data[Member][SubStatusCode]" class="input-text" type="text" value="<?php echo $data['Member']['SubStatusCode']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="PremierMember">Premier Member</label></td>
										<td class="value"><input id="PremierMember" name="data[Member][PremierMember]" class="input-text" type="text" value="<?php echo $data['Member']['PremierMember']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="PremierMemberDate">Premier Member Date</label></td>
										<td class="value"><input id="PremierMemberDate" name="data[Member][PremierMemberDate]" class="input-text" type="text" value="<?php echo $data['Member']['PremierMemberDate']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="UserName">Username</label></td>
										<td class="value"><input id="UserName" name="data[Member][UserName]" class="input-text" type="text" value="<?php echo $data['Member']['UserName']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="change_pass">Reset Password</label></td>
										<td class="value"><input id="change_pass" name="data[Member][change_pass]" type="checkbox" value="1"/></td>
									</tr>
									<tr>
										<td class="label"><label for="OCount">Obligation Count</label></td>
										<td class="value"><input id="OCount" name="data[Member][OCount]" class="input-text" type="text" value="<?php echo $data['Member']['OCount']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="CCount">Commitment Count</label></td>
										<td class="value"><input id="CCount" name="data[Member][CCount]" class="input-text" type="text" value="<?php echo $data['Member']['CCount']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="AdminFlag">Website Administrator</label></td>
										<td class="value"><input id="AdminFlag" name="data[Member][AdminFlag]" type="checkbox" value="<?php echo $data['Member']['AdminFlag']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="AcceptEmails">Email Opt-Out</label></td>
										<td class="value"><input id="AcceptEmails" name="data[Member][AcceptEmails]" class="input-text" type="text" value="<?php echo $data['Member']['AcceptEmails']; ?>"/></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			</form>
			<div id="web_orders_info" style="display:none;">
				<div class="grid">
					<div class="hor-scroll">
						<table cellspacing="0" class="data" id="orders_grid">
							<thead>
								<tr class="headings">
									<th>
										<span class="nobr"><a href="#" class="not-sort">Order ID</a></span>
									</th>
									<th>
										<span class="nobr"><a href="#" class="not-sort">Member Status</a></span>
									</th>
									<th>
										<span class="nobr"><a href="#" class="not-sort">Virtual Status</a></span>
									</th>
									<th>
										<span class="nobr"><a href="#" class="not-sort">Items</a></span>
									</th>
									<th>
										<span class="nobr"><a href="#" class="not-sort">Total</a></span>
									</th>
									<th>
										<span class="nobr"><a href="#" class="not-sort">Created</a></span>
									</th>
									<th>
										<span class="nobr"></span>									
									</th>
								</tr>			
							</thead>	
							<tbody>
								<?php if(!empty($BookOrderData)): ?>
									<?php 
										$i=1; 
										foreach($BookOrderData as $bookorder_data){
											if($i&1){ $rowClass = 'pointer'; } else { $rowClass = 'pointer even'; } 
											echo "<tr class='{$rowClass}'>
												<td>{$bookorder_data['BookOrder']['OrderID']}</td><td>{$bookorder_data['BookOrder']['MemberStatusCode']}</td><td>{$bookorder_data['BookOrder']['VirtualStatusCode']}</td>
												<td>{$bookorder_data['BookOrder']['OrderItemCount']}</td><td>{$currency_html[$bookorder_data['BookOrder']['MemberRegionCode']]} ".number_format($bookorder_data['OrderTotal'],2)."</td>
												<td>{$time->niceShort($bookorder_data['BookOrder']['CDate'])}</td><td><a href='/cmsv3/orders/modal_view/{$bookorder_data['BookOrder']['OrderID']}' class='modalview  fancybox.iframe fancybox.iframe'>view</a></td>
											       </tr>";
											$i++;
										} 
									?>
								<?php else: ?>		
									<tr class="even">
										<td class="empty-text a-center" colspan="8">No Orders found.</td>
									</tr>
								<?php endif; ?>
							</tbody>				
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="content-header-floating" style="display:none;">
	<div class="content-header">
			<h3><?php echo $data['Member']['FirstName'].' '.$data['Member']['Surname']; ?></h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>
				<button id="view-as-user" title="View Site As Customer" type="button" class="scalable go" onclick="location.href='http://www.foliosociety.com/1963?code=DUMMY<?php echo $data['Member']['MemberID']; ?>'" style="">
					<span><span><span>View Site As Customer</span></span></span>
				</button>	
				<button id="save-user" title="save customer" type="button" class="scalable save" onclick="submitForm('MemberEditForm');"> 
					<span><span><span>Save Customer</span></span></span>
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
