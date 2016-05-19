<div class="columns">
<div class="side-col" id="page:left">
	<h3>OfferTypeCode Information</h3>
	<ul id="otc_info_tabs" class="tabs">
		<li><a class="tab-item-link" href="#otc_main_info"><span>Main Information</span></a></li>
	</ul>
</div>
<div class="main-col" id="content">
	<div class="main-col-inner">
		<div id="messages">
		<?php echo $this->Session->flash(); ?>
		</div>
		<div class="content-header">
			<h3>New OfferTypeCode</h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>
				<button id="save-otc" title="save OTC" type="button" class="scalable save" onclick="submitForm('OTCEditForm');"> 
					<span><span><span>Save OTC</span></span></span>
				</button>        				
			</p>
		</div>	
		<form enctype="multipart/form-data" method="post" id="OTCEditForm" action="/cmsv3/offertypecodes/add">
		<div class="entry-edit">
			<div id="otc_main_info">
				<div class="entry-edit">
					<div class="entry-edit-head"><h4>Main Information</h4></div>
					 <div class="fieldset">
						  <div class="hor-scroll">
							 <table cellspacing="0" class="form-list">
								  <tbody>
									<tr>
										<td class="label"><label for="OfferTypeCode">OfferTypeCode<span class="required">*</span></label></td>
										<td class="value"><input id="OfferTypeCode" name="data[OfferType][OfferTypeCode]" class="input-text" type="text" value=""/></td>
									</tr>
									<tr>
										<td class="label"><label for="Description">Description<span class="required">*</span></label></td>
										<td class="value"><input id="Description" name="data[OfferType][Description]" class="input-text" type="text" value=""/></td>
									</tr>
									<tr>
										<td class="label"><label for="OfferTypeFlag">OfferType Flag<span class="required">*</span></label></td>
										<td class="value"><input id="OfferTypeFlag" name="data[OfferType][OfferTypeFlag]" class="input-text" type="text" value="B"/></td>
									</tr>
									<tr>
									   <td colspan="2"><div class="spacer"><br /></div></td>
									</tr>
									<tr>
										<td class="label"><label for="Incentive">Incentive Offer Code</label></td>
										<td class="value"><input id="Incentive" name="data[OfferType][Incentive]" class="input-text" type="text" value=""/></td>
									</tr>
									<tr>
										<td class="label"><label for="IncentiveTerms">Incentive Terms</label></td>
										<td class="value"><input id="IncentiveTerms" name="data[OfferType][IncentiveTerms]" class="input-text" type="text" value=""/></td>
									</tr>
									<tr>
									   <td colspan="2"><div class="spacer"><br /></div></td>
									</tr>
									<tr>
										<td class="label"><label for="active">Active</label></td>
										<td class="value"><?php echo $form->input('OfferType.active',array('type'=>'select','label'=>'', 'class'=>'required-entry select' ,'options'=>$YNValue)); ?></td>
									</tr>
								  </tbody>
								</table>
							</div>
						</div>
				</div>						
			</div>
			</form>

			

	</div>

</div>

</div>
<div class="content-header-floating" style="display:none;">
	<div class="content-header">
			<h3>New OfferTypeCode</h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>
				<button id="save-otc" title="save OTC" type="button" class="scalable save" onclick="submitForm('OTCEditForm');"> 
					<span><span><span>Save OTC</span></span></span>
				</button>           				
			</p>
	</div>
</div>

</div>
<script type="text/javascript">
$(document).ready(function(){ 
	<?php $timestamp = time();?>
	var availableMSC = <?php echo $JSMemberStatusCodes; ?>;
	var availableSSC = <?php echo $JSSubStatusCodes; ?>;
	var availableOC = <?php echo $JSOfferCodes; ?>;
	$("#MemberStatusCodes").autocomplete({lookup: availableMSC, delimiter:":"});
	$("#SubStatusCodes").autocomplete({lookup: availableSSC, delimiter:":"});

 	$("#Incentive").autocomplete({lookup: availableOC});

	$('#ImportOfferCodes').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5($timestamp);?>'
				},
				'swf'      : '/cmsv3/uploadify/uploadify.swf',
				'uploader' : '/cmsv3/categories/addoffersfile',
				'onUploadSuccess' : function(file, data, response) {
            $("#messages").html(data);
        }
	});

});
</script>
