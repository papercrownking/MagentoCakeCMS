<div id="messages"><?php echo $this->Session->flash(); ?></div>
<div class="content-header">
    <table>
      <tr>
        <td><h3>Manage Offers</h3></td>
        <td>
          <form method="post" action="/cmsv3/offers/index" id="search"><input name="data[query]" type="text" size="40" placeholder="Search Offers..." /></form>
          <p class="form-buttons" style="margin-right:10px;">
            <button id="new-offer" title="new offer" type="button" class="scalable add" onclick="window.location='/cmsv3/offers/view';" style="margin-top:5px;">
              <span><span><span>New Offer</span></span></span>
            </button>
            <button id="duplicate-offer" title="duplicate offer" type="button" class="scalable" onclick="submitMultiForm('OfferMultiForm','/cmsv3/offers/duplicate');" style="margin-top:5px;">
              <span><span><span>Duplicate</span></span></span>
            </button>
            <button id="delete-offer" title="delete" type="button" class="scalable delete" onclick="submitMultiForm('OfferMultiForm','/cmsv3/offers/delete');" style="margin-top:5px;">
              <span><span><span>Delete</span></span></span>
            </button>
          </p>
        </td>
      </tr>
    </table>
</div>
<form enctype="multipart/form-data" method="post" id="OTCMultiForm" action="" class="categoryForm">
<dl id="otc_actions_info" class="accordion">
  <dt id="dt-bulk">
    <a href="" id="otc_actions_info_of"  class="ajaxPost" onclick="viewActionAccordion('otc_actions_info_of'); return false;">Bulk Actions</a>
  </dt>
  <dd id="dt-bulk-actions">
		<div class="entry-edit">
		  <div class="fieldset">
			 <div class="hor-scroll">
			   <table cellspacing="4" class="form-list">
				  <tbody>
					 <tr>
					   <td><label for="status_codes">Add Member Status</label></td><td><input id="status_codes" name="data[OfferType][status_codes]" class="input-text" type="text" style="width:245px;"/></td><td>  <button id="back-to-screen" title="Back" type="button" class="scalable add" onclick="submitMultiForm('OTCMultiForm','/cmsv3/offertypecodes/addMultiMemberStatus');"><span><span><span>Add</span></span></span></button></td>
					 </tr>
					 <tr>
					   <td><label for="substatus_codes">Add SubStatus</label></td><td><input id="substatus_codes" name="data[OfferType][substatus_codes]" class="input-text" type="text" style="width:245px;"/></td><td>  <button id="back-to-screen" title="Back" type="button" class="scalable add" onclick="submitMultiForm('OTCMultiForm','/cmsv3/offertypecodes/addMultiSubStatus');"><span><span><span>Add</span></span></span></button></td>
					 </tr>
					</tbody>
				 </table>
       </div>
      </div>
     </div>  
  </dd>
</dl>	
<table class="massaction">
	<tr>
		<td><?php echo $this->element('paginator'); ?><td>
	</tr>
</table>
<div class="grid">

<table cellspacing="0" class="data">
	<thead>
		<tr class="headings">
			<th><span class="nobr"><input type="checkbox" name="allRowCheck" class="allCheck"/></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">OfferTypeCode</span></a></span></th>	
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Region</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">OfferCode</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Book</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">SIC</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Price</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">OCount</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">CCount</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Modified</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Action</span></a></span></th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($data as $item): ?>

		
			<?php
			if($i&1){ $rowClass = 'pointer'; } else { $rowClass = 'pointer even'; } 
			?>
			<?php echo "<tr class='{$rowClass}' id='offerrow_{$item['Offer']['id']}'><td><input type='checkbox' name='data[rowSelect][]' value='{$item['Offer']['id']}' class='checkBoxSelect'/></td><td>{$item['Offer']['OfferTypeCode']}</td><td>{$item['Offer']['RegionCode']}</td>
				<td><b>{$item['Offer']['OfferCode']}</b></td><td>{$item['Offer']['BookCode']} - {$item['Book']['Title']}</td>
				<td>{$item['Offer']['StockIndicatorCode']}</td><td>{$currency_html[$item['Offer']['RegionCode']]}{$item['Offer']['Price']}</td><td>{$item['Offer']['ObligationCount']}</td><td>{$item['Offer']['CommitmentCount']}</td><td>{$time->niceShort($item['Offer']['MDate'])}</td>
				<td><a href='/cmsv3/offers/view/{$item['Offer']['id']}'>view</a></td></tr>"; ?>
		<?php $i++; endforeach; ?>
	</tbody>
</table>
</form>
</div>
<div class="content-header-floating" style="display:none;">
	<div class="content-header">
    <table>
      <tr>
        <td><h3>Manage Offers</h3></td>
        <td>
          <form method="post" action="/cmsv3/offers/index" id="search"><input name="data[query]" type="text" size="40" placeholder="Search Offers..." /></form>
          <p class="form-buttons" style="margin-right:10px;">
            <button id="new-offer" title="new offer" type="button" class="scalable add" onclick="window.location='/cmsv3/offers/view';" style="margin-top:5px;">
              <span><span><span>New Offer</span></span></span>
            </button>
            <button id="duplicate-offer" title="duplicate offer" type="button" class="scalable" onclick="submitMultiForm('OfferMultiForm','/cmsv3/offers/duplicate');" style="margin-top:5px;">
              <span><span><span>Duplicate</span></span></span>
            </button>
            <button id="delete-offer" title="delete" type="button" class="scalable delete" onclick="submitMultiForm('OfferMultiForm','/cmsv3/offers/delete');" style="margin-top:5px;">
              <span><span><span>Delete</span></span></span>
            </button>
          </p>
        </td>
      </tr>
    </table>
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
});
</script>



