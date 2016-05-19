<div class="columns">
<div class="side-col" id="page:left">
	<h3>OfferTypeCode Information</h3>
	<ul id="otc_info_tabs" class="tabs">
		<li><a class="tab-item-link" href="#otc_main_info"><span>Main Information</span></a></li>
		<li><a class="tab-item-link" href="#offer_info"><span>Offers</span></a></li>
		<li><a class="tab-item-link" href="#memberstatus_info"><span>Member Status</span></a></li>
		<li><a class="tab-item-link" href="#substatus_info"><span>SubStatus</span></a></li>
	</ul>
</div>
<div class="main-col" id="content">
	<div class="main-col-inner">
		<div id="messages">
		<?php echo $this->Session->flash(); ?>
		</div>
		<div class="content-header">
			<h3><?php echo $offertype_data['OfferType']['Description']; ?></h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>
				<button id="save-otc" title="save OTC" type="button" class="scalable save" onclick="submitForm('OTCEditForm');"> 
					<span><span><span>Save OTC</span></span></span>
				</button>
        <button id="delete-otc" title="delete otc" type="button" class="scalable delete" onclick="submitDeleteForm('DeleteOTCForm');">
          <span><span><span>Delete OTC</span></span></span>
        </button>          				
			</p>
		</div>
		<form enctype="multipart/form-data" method="post" id="DeleteOTCForm" action="/cmsv3/offertypecodes/delete">
		<input type="hidden" name="data[OfferType][id]" id="hiddenID" value="<?php  echo $offertype_data['OfferType']['id']; ?>" />		
    </form>		
		<form enctype="multipart/form-data" method="post" id="OTCEditForm" action="/cmsv3/offertypecodes/edit">
		<input type="hidden" name="data[OfferType][id]" id="hiddenID" value="<?php  echo $offertype_data['OfferType']['id']; ?>" />		
		<div class="entry-edit">
			<div id="otc_main_info">
				<div class="entry-edit">
					<div class="entry-edit-head"><h4>Main Information</h4></div>
					<?php if(isset($offertype_data)): ?>
					 <div class="fieldset">
						  <div class="hor-scroll">
							 <table cellspacing="0" class="form-list">
								  <tbody>
									<tr>
										<td class="label"><label for="OfferTypeCode">OfferTypeCode<span class="required">*</span></label></td>
										<td class="value"><input id="OfferTypeCode" name="data[OfferType][OfferTypeCode]" class="input-text" type="text" value="<?php echo $offertype_data['OfferType']['OfferTypeCode']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="Description">Description<span class="required">*</span></label></td>
										<td class="value"><input id="Description" name="data[OfferType][Description]" class="input-text" type="text" value="<?php echo $offertype_data['OfferType']['Description']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="OfferTypeFlag">OfferType Flag<span class="required">*</span></label></td>
										<td class="value"><input id="OfferTypeFlag" name="data[OfferType][OfferTypeFlag]" class="input-text" type="text" value="<?php echo $offertype_data['OfferType']['OfferTypeFlag']; ?>"/></td>
									</tr>
									<tr>
									   <td colspan="2"><div class="spacer"><br /></div></td>
									</tr>
									<tr>
										<td class="label"><label for="Incentive">Incentive Offer Code</label></td>
										<td class="value"><input id="Incentive" name="data[OfferType][Incentive]" class="input-text" type="text" value="<?php echo $offertype_data['OfferType']['Incentive']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="IncentiveTerms">Incentive Terms</label></td>
										<td class="value"><input id="IncentiveTerms" name="data[OfferType][IncentiveTerms]" class="input-text" type="text" value="<?php echo $offertype_data['OfferType']['IncentiveTerms']; ?>"/></td>
									</tr>
									<tr>
									   <td colspan="2"><div class="spacer"><br /></div></td>
									</tr>
									<tr>
										<td class="label"><label for="active">Active</label></td>
										<td class="value"><?php echo $form->input('OfferType.active',array('type'=>'select','label'=>'', 'class'=>'required-entry select' ,'options'=>$YNValue,'value'=>$offertype_data['OfferType']['active'])); ?></td>
									</tr>
								  </tbody>
								</table>
							</div>
						</div>
					<?php endif; ?>
				</div>						
			</div>
			</form>
      <div id="offer_info">
	     <div class="grid">
		    <div class="hor-scroll">
			   <table cellspacing="0" class="data">
					<?php if(!empty($offer_data)): ?>
						<thead>
							<tr class="headings">
                <th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">OfferCode</span></a></span></th>
                <th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">BookCode</span></a></span></th>			
                <th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Title</span></a></span></th>		
							</tr>						
						</thead>
						<tbody>
            <?php foreach($offer_data as $item): ?>
						  <tr class="even">
                <td id='offerrow_<?php echo $item['Offer']['OfferCode']; ?>'><?php echo $item['Offer']['OfferCode']; ?></td><td><?php echo $item['Offer']['BookCode']; ?></td><td><?php echo $item['Book']['Title']; ?></td>
              </tr>
						<?php endforeach; ?>
            </tbody>			
					<?php else: ?>
						<tbody>
              <tr class="even"><td class="empty-text a-center" colspan="7">No Offers found.</td></tr>
					   </tbody>
          <?php endif; ?>
			   </table>
		    </div>
      	</div>      
     </div>	
      <div id="memberstatus_info">
       <div class="entry-edit">
					<div class="entry-edit-head"><h4>Add Member Status</h4></div>
					 <div class="fieldset">
						  <div class="hor-scroll">
						  <form enctype="multipart/form-data" method="post" id="OTCAddMemberStatusForm" action="/cmsv3/offertypecodes/addMemberStatus">
							 <input type="hidden" name="data[OfferType][OfferTypeCode]" value="<?php echo $offertype_data['OfferType']['OfferTypeCode']; ?>"/>
               <table cellspacing="0" class="form-list">
								  <tbody>
									<tr>
										<td class="label"><label for="MemberStatusCodes">Member Status Codes</label></td>
										<td class="value"><input id="MemberStatusCodes" name="data[OfferType][MemberStatusCodes]" class="input-text" type="text"/></td>
										<td class="value"><button id="add-memberstatus" title="add member status" type="button" class="scalable save" onclick="submitForm('OTCAddMemberStatusForm');"><span><span><span>Add Status</span></span></span></button></td>
									</tr>
                  </tbody>
                </table>
                </form>                            							 
							</div>
						</div>
				</div>       
	     <div class="grid">
		    <div class="hor-scroll">
			   <table cellspacing="0" class="data">
					<?php if(!empty($memberstatus_data)): ?>
						<thead>
							<tr class="headings">
                <th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Code</span></a></span></th>
                <th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Description</span></a></span></th>			
                <th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Action</span></a></span></th>		
							</tr>						
						</thead>
						<tbody>
            <?php foreach($memberstatus_data as $item): ?>
						  <tr class="even">
                <td id='offerrow_<?php echo $item['OfferTypeMemberStatus']['MemberStatusCode']; ?>'><?php echo $item['OfferTypeMemberStatus']['MemberStatusCode']; ?></td><td><?php echo $item['MemberStatus']['Description']; ?></td><td><a href="/cmsv3/offertypecodes/deleteMemberStatus/<?php echo $item['OfferTypeMemberStatus']['id']; ?>/<?php echo $offertype_data['OfferType']['id']; ?>">Remove</a></td>
              </tr>
						<?php endforeach; ?>
            </tbody>			
					<?php else: ?>
						<tbody>
              <tr class="even"><td class="empty-text a-center" colspan="7">No Member Statuses found.</td></tr>
					   </tbody>
          <?php endif; ?>
			   </table>
		    </div>
      	</div>      
     </div>				
      <div id="substatus_info">
       <div class="entry-edit">
					<div class="entry-edit-head"><h4>Add SubStatus</h4></div>
					 <div class="fieldset">
						  <div class="hor-scroll">
						  <form enctype="multipart/form-data" method="post" id="OTCAddSubStatusForm" action="/cmsv3/offertypecodes/addSubStatus">
							 <input type="hidden" name="data[OfferType][OfferTypeCode]" value="<?php echo $offertype_data['OfferType']['OfferTypeCode']; ?>"/>
               <table cellspacing="0" class="form-list">
								  <tbody>
									<tr>
										<td class="label"><label for="SubStatusCodes">SubStatus Codes</label></td>
										<td class="value"><input id="SubStatusCodes" name="data[OfferType][SubStatusCodes]" class="input-text" type="text"/></td>
										<td class="value"><button id="add-substatus" title="add substatus" type="button" class="scalable save" onclick="submitForm('OTCAddSubStatusForm');"><span><span><span>Add Status</span></span></span></button></td>
									</tr>
                  </tbody>
                </table>
                </form>                            							 
							</div>
						</div>
				</div>       
	     <div class="grid">
		    <div class="hor-scroll">
			   <table cellspacing="0" class="data">
					<?php if(!empty($substatus_data)): ?>
						<thead>
							<tr class="headings">
                <th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Code</span></a></span></th>
                <th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Description</span></a></span></th>			
                <th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Action</span></a></span></th>		
							</tr>						
						</thead>
						<tbody>
            <?php foreach($substatus_data as $item): ?>
						  <tr class="even">
                <td id='offerrow_<?php echo $item['OfferTypeSubStatus']['SubStatus']; ?>'><?php echo $item['OfferTypeSubStatus']['SubStatus']; ?></td><td><?php echo $item['SubStatus']['Description']; ?></td><td><a href="/cmsv3/offertypecodes/deleteSubStatus/<?php echo $item['OfferTypeSubStatus']['id']; ?>/<?php echo $offertype_data['OfferType']['id']; ?>">Remove</a></td>
              </tr>
						<?php endforeach; ?>
            </tbody>			
					<?php else: ?>
						<tbody>
              <tr class="even"><td class="empty-text a-center" colspan="7">No SubStatuses found.</td></tr>
					   </tbody>
          <?php endif; ?>
			   </table>
		    </div>
      	</div>      
     </div>	
	</div>

</div>

</div>
<div class="content-header-floating" style="display:none;">
	<div class="content-header">
			<h3><?php echo $offertype_data['OfferType']['Description']; ?></h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>
				<button id="save-otc" title="save OTC" type="button" class="scalable save" onclick="submitForm('OTCEditForm');"> 
					<span><span><span>Save OTC</span></span></span>
				</button>
        <button id="delete-otc" title="delete otc" type="button" class="scalable delete" onclick="submitDeleteForm('DeleteOTCForm');">
          <span><span><span>Delete OTC</span></span></span>
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
