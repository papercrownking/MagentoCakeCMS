<div class="columns">
<div class="side-col" id="page:left">
	<h3>Offer Information</h3>
	<ul id="otc_info_tabs" class="tabs">
		<li><a class="tab-item-link" href="#offer_main_info"><span>General Information</span></a></li>
		<li><a class="tab-item-link" href="#price_info"><span>Pricing</span></a></li>
		<li><a class="tab-item-link" href="#icon_info"><span>Offer Icon</span></a></li>
		<li><a class="tab-item-link" href="#text_info"><span>Text</span></a></li>
	</ul>
</div>
<div class="main-col" id="content">
	<div class="main-col-inner">
		<div id="messages">
		<?php echo $this->Session->flash(); ?>
		</div>
		<div class="content-header">
			<h3><?php echo $offer_data['Offer']['OfferCode']; ?> - <?php echo $offer_data['Book']['Title']; ?></h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>
				<button id="save-offer" title="save offer" type="button" class="scalable save" onclick="submitForm('OfferEditForm');"> 
					<span><span><span>Save</span></span></span>
				</button>
        <button id="delete-offer" title="delete offer" type="button" class="scalable delete" onclick="submitDeleteForm('DeleteOfferForm');">
          <span><span><span>Delete</span></span></span>
        </button>          				
			</p>
		</div>
		<form enctype="multipart/form-data" method="post" id="DeleteOfferForm" action="/cmsv3/offers/delete">
		<input type="hidden" name="data[Offer][id]" id="hiddenID" value="<?php  echo $offer_data['Offer']['id']; ?>" />		
    </form>		
		<form enctype="multipart/form-data" method="post" id="OfferEditForm" action="/cmsv3/offers/edit">
		<input type="hidden" name="data[Offer][id]" id="hiddenID" value="<?php  echo $offer_data['Offer']['id']; ?>" />		
		<div class="entry-edit">
			<div id="offer_main_info">
				<div class="entry-edit">
					<div class="entry-edit-head"><h4>General Information</h4></div>
					 <div class="fieldset">
						  <div class="hor-scroll">
							 <table cellspacing="0" class="form-list">
								  <tbody>
									<tr>
										<td class="label"><label for="OfferCode">OfferCode<span class="required">*</span></label></td>
										<td class="value"><input id="OfferCode" name="data[Offer][OfferCode]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['OfferCode']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="Region">Region<span class="required">*</span></label></td>
										<td class="value"><input id="Region" name="data[Offer][RegionCode]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['RegionCode']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="BookCode">BookCode<span class="required">*</span></label></td>
										<td class="value"><input id="BookCode" name="data[Offer][BookCode]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['BookCode']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="OfferTypeCode">OfferTypeCode<span class="required">*</span></label></td>
										<td class="value"><input id="OfferTypeCode" name="data[Offer][OfferTypeCode]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['OfferTypeCode']; ?>"/></td>
									</tr>
									<tr>
									   <td colspan="2"><div class="spacer"><br /></div></td>
									</tr>
									<tr>
										<td class="label"><label for="StockIndicatorCode">Stock Indicator Code</label></td>
										<td class="value"><input id="StockIndicatorCode" name="data[Offer][StockIndicatorCode]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['StockIndicatorCode']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="PublicationDate">Publication Date</label></td>
										<td class="value"><input id="PublicationDate" name="data[Offer][PublicationDate]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['PublicationDate']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="DisplayPriority">Display Priority</label></td>
										<td class="value"><input id="DisplayPriority" name="data[Offer][DisplayPriority]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['DisplayPriority']; ?>"/></td>
									</tr>
								  </tbody>
								</table>
							</div>
						</div>
				</div>						
			</div>
			<div id="price_info">
				<div class="entry-edit">
					<div class="entry-edit-head"><h4>Price Information</h4></div>
					 <div class="fieldset">
						  <div class="hor-scroll">
							 <table cellspacing="0" class="form-list">
								  <tbody>
									<tr>
										<td class="label"><label for="Price">Price<span class="required">*</span></label></td>
										<td class="value"><input id="Price" name="data[Offer][Price]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['Price']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="RRP">RRP</label></td>
										<td class="value"><input id="RRP" name="data[Offer][RRP]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['RRP']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="Savings">Savings</label></td>
										<td class="value"><input id="Savings" name="data[Offer][Savings]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['Savings']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="Tax">Tax</label></td>
										<td class="value"><input id="Tax" name="data[Offer][Tax]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['Tax']; ?>"/></td>
									</tr>
									<tr>
									   <td colspan="2"><div class="spacer"><br /></div></td>
									</tr>
									<tr>
										<td class="label"><label for="Postage">Postage</label></td>
										<td class="value"><input id="Postage" name="data[Offer][Postage]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['Postage']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="PostageTax">Postage Tax</label></td>
										<td class="value"><input id="PostageTax" name="data[Offer][PostageTax]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['PostageTax']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="PostageCount">Postage Count</label></td>
										<td class="value"><input id="PostageCount" name="data[Offer][PostageCount]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['PostageCount']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="PublicationDate">Publication Date</label></td>
										<td class="value"><input id="PublicationDate" name="data[Offer][PublicationDate]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['PublicationDate']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="DisplayPriority">Display Priority</label></td>
										<td class="value"><input id="DisplayPriority" name="data[Offer][DisplayPriority]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['DisplayPriority']; ?>"/></td>
									</tr>
									<tr>
									   <td colspan="2"><div class="spacer"><br /></div></td>
									</tr>
									<tr>
										<td class="label"><label for="MaxQty">Max Quantity<span class="required">*</span></label></td>
										<td class="value"><input id="MaxQty" name="data[Offer][MaxQty]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['MaxQty']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="CommitmentCount">Commitment Count<span class="required">*</span></label></td>
										<td class="value"><input id="CommitmentCount" name="data[Offer][CommitmentCount]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['CommitmentCount']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="ObligationCount">Obligation Count<span class="required">*</span></label></td>
										<td class="value"><input id="ObligationCount" name="data[Offer][ObligationCount]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['ObligationCount']; ?>"/></td>
									</tr>
								  </tbody>
								</table>
							</div>
						</div>
				</div>						
			</div>	
      <div id="icon_info">
				<div class="entry-edit">
				  <div class="entry-edit-head"><h4>Offer Icon</h4></div>
					 <div class="fieldset">
						  <div class="hor-scroll">
							 <table cellspacing="0" class="form-list">
								  <tbody>
								   <tr>
										<td class="label"><label for="icon">Icon URL</label></td>
										<td class="value"><input id="icon" name="data[Offer][icon]" class="input-text" type="text" value="<?php echo $offer_data['Offer']['icon']; ?>"/></td>
									 </tr>
									 <tr>
										<td class="label"><label for="iconupload">Icon Upload</label></td>
                    <td class="value">
		                  <div id="dropbox">
			                 <span class="message" style="color:#FFF;">Drop images here to upload. <br /><i>(they will only be visible to you)</i></span>
		                  </div>
                      <p><i><b>NOTE:</b> Once image is uploaded, reference file name in field above to make icon visible on offer.</i></p>		
                    </td>									    
									 </tr>
								  </tbody>
							  </table>
						  </div>
					 </div>
				</div>      
      </div>
			<div id="text_info">
				<div class="entry-edit">
					<div class="entry-edit-head"><h4>offer Text</h4></div>
					 <div class="fieldset">
						  <div class="hor-scroll">
							 <table cellspacing="0" class="form-list">
								  <tbody>
									<tr>
										<td class="label"><label for="PriceText">Price Text</label></td>
										<td class="value"><textarea id="PriceText" name="data[Offer][PriceText]" class="input-text" type="text"><?php echo $offer_data['Offer']['PriceText']; ?></textarea></td>
									</tr>
									<tr>
										<td class="label"><label for="FreeText">Free Text</label></td>
										<td class="value"><textarea id="FreeText" name="data[Offer][FreeText]" class="input-text" type="text"><?php echo $offer_data['Offer']['FreeText']; ?></textarea></td>
									</tr>
									<tr>
										<td class="label"><label for="TermsText">Terms Text</label></td>
										<td class="value"><textarea id="TermsText" name="data[Offer][TermsText]" class="input-text" type="text"><?php echo $offer_data['Offer']['TermsText']; ?></textarea></td>
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
