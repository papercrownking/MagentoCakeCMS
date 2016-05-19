<div class="columns">
<div class="side-col" id="page:left">
	<h3>Category Information</h3>
	<ul id="category_info_tabs" class="tabs">
		<li><a class="tab-item-link" href="#category_main_info"><span>Main Information</span></a></li>
		<li><a class="tab-item-link" href="#meta_info"><span>META Information</span></a></li>
		<li><a class="tab-item-link" href="#cathead_info"><span>Category Header</span></a></li>
		<li><a class="tab-item-link" href="#offer_info"><span>Category Offers</span></a></li>
	</ul>
</div>
<div class="main-col" id="content">
	<div class="main-col-inner">
		<div id="messages">
		<?php echo $this->Session->flash(); ?>
		</div>
		<div class="content-header">
			<h3>New Category</h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>
				<button id="save-user" title="save customer" type="button" class="scalable save" onclick="submitForm('CategoryEditForm');"> 
					<span><span><span>Save Category</span></span></span>
				</button>           				
			</p>
		</div>
		<form enctype="multipart/form-data" method="post" id="CategoryEditForm" action="/cmsv3/categories/add">
		<input type="hidden" name="data[Category][id]" id="hiddenID" value="<?php  echo $category_data['Category']['id']; ?>" />		
		<div class="entry-edit">
			<div id="category_main_info">
				<div class="entry-edit">
					<div class="entry-edit-head"><h4>Main Information</h4></div>
					<?php if(isset($category_data)): ?>
					 <div class="fieldset">
						  <div class="hor-scroll">
							 <table cellspacing="0" class="form-list">
								  <tbody>
									<tr>
										<td class="label"><label for="CategoryCode">Category Code<span class="required">*</span></label></td>
										<td class="value"><input id="CategoryCode" name="data[Category][CategoryCode]" class="input-text" type="text" value=""/></td>
									</tr>
									<tr>
										<td class="label"><label for="Description">Description<span class="required">*</span></label></td>
										<td class="value"><input id="Description" name="data[Category][Description]" class="input-text" type="text" value=""/></td>
									</tr>
									<tr>
										<td class="label"><label for="Slug">Slug<span class="required">*</span></label></td>
										<td class="value"><input id="Slug" name="data[Category][slug]" class="input-text" type="text" value=""/></td>
									</tr>
									<tr>
										<td class="label"><label for="DisplayOrder">Display Order<span class="required">*</span></label></td>
										<td class="value"><input id="DisplayOrder" name="data[Category][DisplayOrder]" class="input-text" type="text" value=""/></td>
									</tr>
									<tr>
									   <td colspan="2"><div class="spacer"><br /></div></td>
									</tr>
									<tr>
										<td class="label"><label for="ParentCategoryCode">Parent Category</label></td>
										<td class="value"><?php echo $form->input('Category.ParentCategoryCode',array('type'=>'select','label'=>'','empty'=>'NONE', 'class'=>'required-entry select' ,'options'=>$ParentCategoryCodes)); ?></td>
									</tr>
									<tr>
										<td class="label"><label for="category_type_id">Type</label></td>
										<td class="value"><?php echo $form->input('Category.category_type_id',array('type'=>'select','label'=>'','empty'=>'NONE', 'class'=>'required-entry select' ,'options'=>$CategoryTypes)); ?></td>
									</tr>
									<tr>
									   <td colspan="2"><div class="spacer"><br /></div></td>
									</tr>
									<tr>
										<td class="label"><label for="status_codes">Status Codes</label></td>
										<td class="value"><input id="status_codes" name="data[Category][status_codes]" class="input-text" type="text" value=""/></td>
									</tr>
									<tr>
										<td class="label"><label for="substatus_codes">SubStatus Codes</label></td>
										<td class="value"><input id="substatus_codes" name="data[Category][substatus_codes]" class="input-text" type="text" value=""/></td>
									</tr>
									<tr>
										<td class="label"><label for="region_codes">Regions</label></td>
										<td class="value"><?php $tools->drawFlagCheckboxes($regionCodes,explode(':',$category_data['Category']['region_codes']),'Category'); ?></td>
									</tr>
									<tr>
									   <td colspan="2"><div class="spacer"><br /></div></td>
									</tr> 
								 <tr>
										<td class="label"><label for="Narrative">Narrative</label></td>
										<td class="value"><textarea id="Narrative" name="data[Category][Narrative]" class="input-text"></textarea></td>
									</tr>
								  </tbody>
								</table>
							</div>
						</div>
					<?php endif; ?>
				</div>						
			</div>
			<div id="meta_info">
				<div class="entry-edit">
				  <div class="entry-edit-head"><h4>META Information</h4></div>
				  <?php if(isset($category_data)): ?>
					 <div class="fieldset">
						  <div class="hor-scroll">
							 <table cellspacing="0" class="form-list">
								  <tbody>
									 <tr>
										  <td class="label"><label for="LayoutTitle">Page Title</label></td>
										  <td class="value"><input id="LayoutTitle" name="data[Category][LayoutTitle]" class="input-text" type="text" value=""/></td>
									 </tr>
									 <tr>
										  <td class="label"><label for="CategoryH1">Category H1 Tag</label></td>
										  <td class="value"><input id="CategoryH1" name="data[Category][CategoryH1]" class="input-text" type="text" value=""/></td>
									 </tr>
									 <tr>
										  <td class="label"><label for="LayoutMetaTags">META Tags</label></td>
										  <td class="value"><input id="LayoutMetaTags" name="data[Category][LayoutMetaTags]" class="input-text" type="text" value=""/></td>
									 </tr>
								   <tr>
										<td class="label"><label for="LayoutMetaDescription">META Description</label></td>
										<td class="value"><textarea id="LayoutMetaDescription" name="data[Category][LayoutMetaDescription]" class="input-text"></textarea></td>
									 </tr>
								  </tbody>
							  </table>
						  </div>
					 </div>
					<?php endif; ?>
				</div>
			</div>
			<div id="cathead_info">
				<div class="entry-edit">
				  <div class="entry-edit-head"><h4>Category Header</h4></div>
				  <?php if(isset($category_data)): ?>
					 <div class="fieldset">
						  <div class="hor-scroll">
							 <table cellspacing="0" class="form-list">
								  <tbody>
								   <tr>
										<td class="label"><label for="CatHead">Header Data</label></td>
										<td class="value"><textarea id="CatHead" name="data[Category][CatHead]" class="input-text"></textarea></td>
									 </tr>
									 <tr>
										<td class="label"><label for="CatImage">Header Image</label></td>
                    <td class="value">
		                  <div id="dropbox">
			                 <span class="message" style="color:#FFF;">Drop images here to upload. <br /><i>(they will only be visible to you)</i></span>
		                  </div>
                      <p><i><b>NOTE:</b> Once image is uploaded, reference FULL file name in Header data before saving.</i></p>		
                    </td>									    
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
				<div class="entry-edit">
					<div class="entry-edit-head"><h4>Add Offers</h4></div>
					<?php if(isset($category_data)): ?>
					 <div class="fieldset">
						  <div class="hor-scroll">
						  <form enctype="multipart/form-data" method="post" id="BookCategoryAddOffersForm" action="/cmsv3/categories/addoffers">
							 <input type="hidden" name="data[BookCategory][CategoryCode]" value="<?php echo $category_data['Category']['CategoryCode']; ?>"/>
               <table cellspacing="0" class="form-list">
								  <tbody>
									<tr>
										<td class="label"><label for="OfferCodes">Offer Codes</label></td>
										<td class="value"><input id="OfferCodes" name="data[BookCategory][OfferCodes]" class="input-text" type="text"/></td>
										<td class="value"><button id="add-offers" title="add offers" type="button" class="scalable save" onclick="submitForm('BookCategoryAddOffersForm');updateAccordion('category_actions_info_of'); return false;"><span><span><span>Add Offers</span></span></span></button></td>
									</tr>
                  </tbody>
                </table>
                </form> 
						  <form enctype="multipart/form-data" method="post" id="BookCategoryImportOffersForm" action="/cmsv3/categories/addoffersfile">
               <table cellspacing="0" class="form-list">
								  <tbody>
									<tr>
										<td class="label"><label for="OfferCodes">Import</label></td>
										<td class="value"><input id="ImportOfferCodes" name="data[BookCategory][OfferCodes]" class="files" type="file"/></td>
									</tr>
                  </tbody>
                </table>
                </form>                             							 
							</div>
						</div>
					<?php endif; ?>
				</div> 
				<dl id="category_actions_info" class="accordion">
					<dt id="dt-offers">
						<a href="" rel="/cmsv3/categories/getAjaxOffers/<?php echo $category_data['Category']['CategoryCode']; ?>" id="category_actions_info_of"  class="ajaxPost" onclick="updateAccordion('category_actions_info_of'); return false;">Category Offers</a>
					</dt>
					<dd id="dt-offers-results">
					</dd>
				</dl>							
			</div>			
	</div>

</div>

</div>
<div class="content-header-floating" style="display:none;">
	<div class="content-header">
			<h3>New Category</h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>
				<button id="save-user" title="save customer" type="button" class="scalable save" onclick="submitForm('CategoryEditForm');"> 
					<span><span><span>Save Category</span></span></span>
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
	$("#status_codes").autocomplete({lookup: availableMSC, delimiter:":"});
	$("#substatus_codes").autocomplete({lookup: availableSSC, delimiter:":"});
	$("#MemberStatusDate").datepicker({dateFormat:"yy-mm-dd",duration:"",constrainInput:false});
 	$("#OfferCodes").autocomplete({lookup: availableOC, delimiter:":"});

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
