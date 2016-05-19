<div id="messages"><?php echo $this->Session->flash(); ?></div>
<div class="content-header">
<table>
<tr>
<td><h3>Manage OfferTypeCodes</h3></td>
<td>
  <form method="post" action="/cmsv3/offertypecodes/index" id="search"><input name="data[query]" type="text" size="40" placeholder="Search OfferTypeCodes..." /></form>
  <p class="form-buttons" style="margin-right:10px;">
    <button id="new-otc" title="new OTC" type="button" class="scalable add" onclick="window.location='/cmsv3/offertypecodes/view';" style="margin-top:5px;">
      <span><span><span>New OTC</span></span></span>
    </button>
    <button id="duplicate-otc" title="duplicate OTC" type="button" class="scalable" onclick="submitMultiForm('OTCMultiForm','/cmsv3/offertypecodes/duplicate');" style="margin-top:5px;">
      <span><span><span>Duplicate OTC</span></span></span>
    </button>
    <button id="activate-otc" title="activate OTC" type="button" class="scalable" onclick="submitMultiForm('OTCMultiForm','/cmsv3/offertypecodes/activate');" style="margin-top:5px;">
      <span><span><span>Activate</span></span></span>
    </button>
    <button id="deactivate-otc" title="deactivate OTC" type="button" class="scalable" onclick="submitMultiForm('OTCMultiForm','/cmsv3/offertypecodes/deactivate');" style="margin-top:5px;">
      <span><span><span>Deactivate</span></span></span>
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
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">OTC</span></a></span></th>	
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Description</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Flag</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Max Qty</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Incentive</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Incentive Terms</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Active</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Modified</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Action</span></a></span></th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($data as $otc): ?>
		
		
			<?php
			if($i&1){ $rowClass = 'pointer'; } else { $rowClass = 'pointer even'; } 
			?>
			<?php echo "<tr class='{$rowClass}' id='categoryrow_{$otc['OfferType']['id']}'><td><input type='checkbox' name='data[rowSelect][]' value='{$otc['OfferType']['id']}' class='checkBoxSelect'/></td><td>{$otc['OfferType']['OfferTypeCode']}</td><td>{$otc['OfferType']['Description']}</td>
				<td>{$otc['OfferType']['OfferTypeFlag']}</td><td>{$otc['OfferType']['MaxQty']}</td>
				<td>{$otc['OfferType']['Incentive']}</td><td>{$otc['OfferType']['IncentiveTerms']}</td><td>{$YNValue[$otc['OfferType']['active']]}</td><td>{$time->niceShort($otc['OfferType']['MDate'])}</td>
				<td><a href='/cmsv3/offertypecodes/view/{$otc['OfferType']['id']}'>view</a></td></tr>"; ?>
		<?php $i++; endforeach; ?>
	</tbody>
</table>
</form>
</div>
<div class="content-header-floating" style="display:none;">
	<div class="content-header">
    <table>
      <tr>
        <td><h3>Manage OfferTypeCodes</h3></td>
        <td>
          <form method="post" action="/cmsv3/offertypecodes/index" id="search"><input name="data[query]" type="text" size="40" placeholder="Search OfferTypeCodes..." /></form>
          <p class="form-buttons" style="margin-right:10px;">
            <button id="new-otc" title="new OTC" type="button" class="scalable add" onclick="window.location='/cmsv3/offertypecodes/view';" style="margin-top:5px;">
              <span><span><span>New OTC</span></span></span>
            </button>
            <button id="duplicate-otc" title="duplicate OTC" type="button" class="scalable" onclick="submitMultiForm('OTCMultiForm','/cmsv3/offertypecodes/duplicate');" style="margin-top:5px;">
              <span><span><span>Duplicate OTC</span></span></span>
            </button>
            <button id="activate-otc" title="activate OTC" type="button" class="scalable" onclick="submitMultiForm('OTCMultiForm','/cmsv3/offertypecodes/activate');" style="margin-top:5px;">
              <span><span><span>Activate</span></span></span>
            </button>
            <button id="deactivate-otc" title="deactivate OTC" type="button" class="scalable" onclick="submitMultiForm('OTCMultiForm','/cmsv3/offertypecodes/deactivate');" style="margin-top:5px;">
              <span><span><span>Deactivate</span></span></span>
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



