<div id="messages"><?php echo $this->Session->flash(); ?></div>
<div class="content-header"><table><tr><td><h3>Manage Baskets</h3></td><td><form method="post" action="/cmsv3/baskets/index" id="search"><input name="data[query]" type="text" size="40" placeholder="Search Baskets..." /></form><p class="form-buttons" style="margin-right:20px;"><button id="save-user" title="delete baskets" type="button" class="scalable delete" onclick="submitDeleteForm('BasketRemoveForm');"><span><span><span>Delete Baskets</span></span></span></button></p></td></tr></table></div>
<table class="massaction">
	<tr>
		<td><?php echo $this->element('paginator'); ?><td>
	</tr>
</table>
<div class="grid">
<form enctype="multipart/form-data" method="post" id="BasketRemoveForm" action="/cmsv3/baskets/remove" class="deleteForm">
<table cellspacing="0" class="data">
	<thead>
		<tr class="headings">
			<th><span class="nobr"><input type="checkbox" name="allRowCheck" class="allCheck"/></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">ID</span></a></span></th>	
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">MemberID</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Member Status</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Quantity</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Created</span></a></span></th>
			
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Action</span></a></span></th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($data as $basket): ?>
			<?php
			
			if($i&1){ $rowClass = 'pointer'; } else { $rowClass = 'pointer even'; } 
			?>
			<?php echo "<tr class='{$rowClass}' id='basketrow_{$basket['Basket']['id']}'><td><input type='checkbox' name='data[rowSelect][]' value='{$basket['Basket']['id']}' class='checkBoxSelect'/></td><td>{$basket['Basket']['id']}</td><td>{$basket['Basket']['MemberID']}</td>
				<td>{$basket['Basket']['VirtualStatusCode']}</td><td>".count($basket['Basketoffer'])."</td><td>{$time->niceShort($basket['Basket']['created'])}</td>
				<td><a href='/cmsv3/baskets/view/{$basket['Basket']['id']}'>view</a></td></tr>"; ?>
		<?php $i++; endforeach; ?>
	</tbody>
</table>
</div>
</form>
<div class="content-header-floating" style="display:none;">
<div class="content-header"><table><tr><td><h3>Manage Baskets</h3></td><td><form method="post" action="/cmsv3/baskets/index" id="search"><input name="data[query]" type="text" size="40" placeholder="Search Baskets..." /></form><p class="form-buttons" style="margin-right:20px;"><button id="save-user" title="delete baskets" type="button" class="scalable delete" onclick="submitDeleteForm('BasketRemoveForm');"><span><span><span>Delete Baskets</span></span></span></p></td></tr></table></div>
</div>



