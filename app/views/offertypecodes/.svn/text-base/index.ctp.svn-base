<div id="messages"><?php echo $this->Session->flash(); ?></div>
<div class="content-header">
<table>
<tr>
<td><h3>Manage Categories</h3></td>
<td>
  <form method="post" action="/cmsv3/categories/index" id="search"><input name="data[query]" type="text" size="40" placeholder="Search Categories..." /></form>
  <p class="form-buttons" style="margin-right:10px;">
    <button id="new-category" title="new category" type="button" class="scalable add" onclick="window.location='/cmsv3/categories/view';" style="margin-top:5px;">
      <span><span><span>New Category</span></span></span>
    </button>
    <button id="duplicate-category" title="duplicate category" type="button" class="scalable" onclick="submitMultiForm('CategoryMultiForm','/cmsv3/categories/duplicate');" style="margin-top:5px;">
      <span><span><span>Duplicate Category</span></span></span>
    </button>
    <button id="activate-category" title="activate category" type="button" class="scalable" onclick="submitMultiForm('CategoryMultiForm','/cmsv3/categories/activate');" style="margin-top:5px;">
      <span><span><span>Activate</span></span></span>
    </button>
    <button id="deactivate-category" title="deactivate category" type="button" class="scalable" onclick="submitMultiForm('CategoryMultiForm','/cmsv3/categories/deactivate');" style="margin-top:5px;">
      <span><span><span>Deactivate</span></span></span>
    </button>

  </p>
</td>
</tr>
</table>
</div>
<form enctype="multipart/form-data" method="post" id="CategoryMultiForm" action="" class="categoryForm">
<dl id="category_actions_info" class="accordion">
  <dt id="dt-bulk">
    <a href="" id="category_actions_info_of"  class="ajaxPost" onclick="viewActionAccordion('category_actions_info_of'); return false;">Bulk Actions</a>
  </dt>
  <dd id="dt-bulk-actions">
		<div class="entry-edit">
		  <div class="fieldset">
			 <div class="hor-scroll">
			   <table cellspacing="4" class="form-list">
				  <tbody>
					 <tr>
					   <td><label for="offercode">Add Offers</label></td><td> <input id="OfferCodes" name="data[BookCategory][OfferCodes]" class="input-text" type="text" style="width:245px;"/></td><td><button id="back-to-screen" title="Back" type="button" class="scalable add" onclick="submitMultiForm('CategoryMultiForm','/cmsv3/categories/addmultioffers');"><span><span><span>Add Offers</span></span></span></button></td>
					 </tr>
					 <tr>
					   <td><label for="status_codes">Add Status</label></td><td><input id="status_codes" name="data[Category][status_codes]" class="input-text" type="text" style="width:245px;"/></td><td>  <button id="back-to-screen" title="Back" type="button" class="scalable add" onclick="submitMultiForm('CategoryMultiForm','/cmsv3/categories/addmultistatus');"><span><span><span>Add Status</span></span></span></button></td>
					 </tr>
					 <tr>
					   <td><label for="region_codes">Set Regions</label></td><td><div class="inputBG" style="margin:0;padding:1px 10px 1px 10px;"><input type="checkbox" name="data[Category][region][0]" value="UK"><img src="/cmsv3/img/flags/thumb/uk.gif" alt=""><input type="checkbox" name="data[Category][region][1]" value="US"><img src="/cmsv3/img/flags/thumb/us.gif" alt=""><input type="checkbox" name="data[Category][region][2]" value="AU"><img src="/cmsv3/img/flags/thumb/au.gif" alt=""><input type="checkbox" name="data[Category][region][3]" value="CA"><img src="/cmsv3/img/flags/thumb/ca.gif" alt=""><input type="checkbox" name="data[Category][region][4]" value="RO"><img src="/cmsv3/img/flags/thumb/ro.gif" alt=""></div></td><td><button id="back-to-screen" title="Back" type="button" class="scalable add" onclick="submitMultiForm('CategoryMultiForm','/cmsv3/categories/addmultiregions');"><span><span><span>Set Regions</span></span></span></button></td>
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
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Code</span></a></span></th>	
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Description</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">VirtualStatus</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">SubStatus</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Region</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Type</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Active</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Modified</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Action</span></a></span></th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($data as $Category): ?>
		
		
			<?php
			if($i&1){ $rowClass = 'pointer'; } else { $rowClass = 'pointer even'; } 
			?>
			<?php echo "<tr class='{$rowClass}' id='categoryrow_{$Category['Category']['id']}'><td><input type='checkbox' name='data[rowSelect][]' value='{$Category['Category']['id']}' class='checkBoxSelect'/></td><td>{$Category['Category']['CategoryCode']}</td><td>{$Category['Category']['Description']}</td>
				<td>{$text->truncate($Category['Category']['status_codes'],'10',array('ending'=>'...'))}</td><td>{$Category['Category']['substatus_codes']}</td>
				<td>{$Category['Category']['region_codes']}</td><td>{$Category['CategoryType']['text']}</td><td>{$YNValue[$Category['Category']['active']]}</td><td>{$time->niceShort($Category['Category']['MDate'])}</td>
				<td><a href='/cmsv3/categories/view/{$Category['Category']['id']}'>view</a></td></tr>"; ?>
		<?php $i++; endforeach; ?>
	</tbody>
</table>
</form>
</div>
<div class="content-header-floating" style="display:none;">
	<div class="content-header">
    <table>
      <tr>
        <td><h3>Manage Categories</h3></td>
        <td>
        <form method="post" action="/cmsv3/categories/index" id="search"><input name="data[query]" type="text" size="40" placeholder="Search Categories..." /></form>
          <p class="form-buttons" style="margin-right:10px;">
            <button id="new-category" title="new category" type="button" class="scalable add" onclick="window.location='/cmsv3/categories/view';" style="margin-top:5px;">
              <span><span><span>New Category</span></span></span>
            </button>
            <button id="duplicate-category" title="duplicate category" type="button" class="scalable" onclick="submitMultiForm('CategoryMultiForm','/cmsv3/categories/duplicate');" style="margin-top:5px;">
              <span><span><span>Duplicate Category</span></span></span>
            </button>
            <button id="activate-category" title="activate category" type="button" class="scalable" onclick="submitMultiForm('CategoryMultiForm','/cmsv3/categories/activate');" style="margin-top:5px;">
              <span><span><span>Activate</span></span></span>
            </button>
            <button id="deactivate-category" title="deactivate category" type="button" class="scalable" onclick="submitMultiForm('CategoryMultiForm','/cmsv3/categories/deactivate');" style="margin-top:5px;">
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
 	$("#OfferCodes").autocomplete({lookup: availableOC, delimiter:":"});

});
</script>



