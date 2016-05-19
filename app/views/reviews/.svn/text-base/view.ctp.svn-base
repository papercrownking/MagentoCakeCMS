<div class="columns">
<div class="side-col" id="page:left">
	<h3>Review Information</h3>
	<ul id="customer_info_tabs" class="tabs">
		<li><a class="tab-item-link" href="#customer_main_info"><span>Customer Information</span></a></li>
		<li><a class="tab-item-link" href="#review_info"><span>Review Information</span></a></li>
	</ul>
</div>
<div class="main-col" id="content">
	<div class="main-col-inner">
		<div id="messages">
		</div>
		<div class="content-header">
			<h3>Review #<?php echo $review_data['BookReview']['id']; ?> : <?php  echo $review_data['Book']['Title']; ?></h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>
				<button id="save-review" title="save review" type="button" class="scalable save" onclick="submitForm('ReviewEditForm');"> 
					<span><span><span>Save Review</span></span></span>
				</button>			
			</p>
		</div>
		<div class="entry-edit">
			<div id="customer_main_info">
				<div class="entry-edit">
					<div class="entry-edit-head"><h4>Customer Information</h4></div>

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
							<tr>							
								<td><strong>Book Reviews</strong></td><td><?php echo $customer_review_count; ?></td>
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
				</div>						
			</div>
			
			<div id="review_info" style="display:none;">
				<form enctype="multipart/form-data" method="post" id="ReviewEditForm" action="/cmsv3/reviews/edit">
					<input type="hidden" name="data[BookReview][id]" id="hiddenID" value="<?php  echo $review_data['BookReview']['id']; ?>" />	
					<div class="entry-edit">
						<div class="entry-edit-head">
							<h4 class="icon-head fieldset-legend">Review Information</h4>
						</div>
						<div class="fieldset">
							<div class="hor-scroll">
								<table cellspacing="0" class="form-list">
									<tbody>
										<tr>
											<td class="label"><label for="BookCode">BookCode<span class="required">*</span></label></td>
											<td class="value"><input id="BookCode" name="data[BookReview][BookCode]" class="input-text" type="text" value="<?php echo $review_data['BookReview']['BookCode']; ?>" disabled/></td>
										</tr>
										 <tr>
											<td class="label"><label for="Author">Author<span class="required">*</span></label></td>
											<td class="value"><input id="Author" name="data[BookReview][author]" class="input-text" type="text" value="<?php echo $review_data['BookReview']['author']; ?>" /></td>
										</tr>
										<tr>
											<td colspan="2"><br /></td>
										</tr>
										<tr>
											<td class="label"><label for="TextRating">Text Rating<span class="required">*</span></label></td>
											<td class="value"><input id="TextRating" name="data[BookReview][rating1]" class="input-text" type="text" value="<?php echo $review_data['BookReview']['rating1']; ?>"/></td>
										</tr>
										<tr>
											<td class="label"><label for="BindingRating">Binding Rating<span class="required">*</span></label></td>
											<td class="value"><input id="BindingRating" name="data[BookReview][rating2]" class="input-text" type="text" value="<?php echo $review_data['BookReview']['rating2']; ?>"/></td>
										</tr>
										<tr>
											<td class="label"><label for="IllustrationRating">Illustration Rating<span class="required">*</span></label></td>
											<td class="value"><input id="IllustrationRating" name="data[BookReview][rating3]" class="input-text" type="text" value="<?php echo $review_data['BookReview']['rating3']; ?>"/></td>
										</tr>
										<tr>
											<td class="label"><label for="OverallRating">Overall Rating<span class="required">*</span></label></td>
											<td class="value"><input id="OverallRating" name="data[BookReview][rating4]" class="input-text" type="text" value="<?php echo $review_data['BookReview']['rating4']; ?>"/></td>
										</tr>
										<tr>
											<td colspan="2"><br /></td>
										</tr>
										<tr>
											<td class="label"><label for="Comment">Review</label></td>
											<td class="value"><textarea id="Comment" name="data[BookReview][comment]" class="input-text"><?php echo $review_data['BookReview']['comment']; ?>"</textarea></td>
										</tr>
										<tr>
											<td colspan="2"><br /></td>
										</tr>
										<tr>
											<td class="label"><label for="Status">Status</label></td>
											<td class="value"><?php  echo $form->input('BookReview.approved',array('type'=>'select','label'=>'','class'=>'select' ,'options'=>$BookReviewStatuses,'value'=>$review_data['BookReview']['approved']));?></td>
										</tr>
										<tr>
											<td class="label"><label for="RejectReason">Reject Reason</label></td>
											<td class="value"><?php  echo $form->input('BookReview.flag_reason',array('type'=>'select','label'=>'','class'=>'select' ,'options'=>$BookReviewFlags,'value'=>$review_data['BookReview']['flag_reason']));?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</form>
			</div>

			
		</div>
	</div>
</div>
<div class="content-header-floating" style="display:none;">
		<div class="content-header">
			<h3>Review #<?php echo $review_data['BookReview']['id']; ?> : <?php  echo $review_data['Book']['Title']; ?></h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>
				<button id="save-review" title="save review" type="button" class="scalable save" onclick="submitForm('ReviewEditForm');"> 
					<span><span><span>Save Review</span></span></span>
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
