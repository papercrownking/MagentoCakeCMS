<div id="messages"><?php echo $this->Session->flash(); ?></div>
<div class="content-header"><table><tr><td><h3>Manage Reviews</h3></td><td><form method="post" action="/cmsv3/reviews/index" id="search"><input name="data[query]" type="text" size="40" placeholder="Search Reviews..." /></form><p class="form-buttons" style="margin-right:20px;"><button id="save-user" title="delete baskets" type="button" class="scalable delete" onclick="submitMultiForm('ReviewMultiForm','/cmsv3/reviews/remove');"><span><span><span>Delete Review</span></span></span></button><button id="approve-review" title="Approve Reviews" type="button" class="scalable save" onclick="submitMultiForm('ReviewMultiForm','/cmsv3/reviews/approve');"><span><span><span>Approve Review</span></span></span></button></p></td></tr></table></div>
<table class="massaction">
	<tr>
		<td><?php echo $this->element('paginator'); ?><td>
	</tr>
</table>
<div class="grid">
<form enctype="multipart/form-data" method="post" id="ReviewMultiForm" action="" class="deleteForm">
<table cellspacing="0" class="data">
	<thead>
		<tr class="headings">
			<th><span class="nobr"><input type="checkbox" name="allRowCheck" class="allCheck"/></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">ID</span></a></span></th>	
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">BookCode</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Book Title</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Member ID</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Author</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Overall Rating</span></a></span></th>			
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Status</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Created</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Action</span></a></span></th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($data as $review): ?>
			<?php
				
			if($i&1){ $rowClass = 'pointer'; } else { $rowClass = 'pointer even'; } 
			?>
			<?php echo "<tr class='{$rowClass}' id='reviewrow_{$review['BookReview']['id']}'><td><input type='checkbox' name='data[rowSelect][]' value='{$review['BookReview']['id']}' class='checkBoxSelect'/></td><td>{$review['BookReview']['id']}</td><td>{$review['BookReview']['BookCode']}</td>
				<td>{$review['Book']['Title']}</td><td>{$review['BookReview']['member_id']}</td><td>{$review['BookReview']['author']}</td><td>{$review['BookReview']['rating4']}</td><td>{$review['Status']['name']}</td><td>{$time->niceShort($review['BookReview']['created'])}</td>
				<td><a href='/cmsv3/reviews/view/{$review['BookReview']['id']}'>view</a></td></tr>"; ?>
		<?php $i++; endforeach; ?>
	</tbody>
</table>
</div>
</form>
<div class="content-header-floating" style="display:none;">
<div class="content-header"><table><tr><td><h3>Manage Reviews</h3></td><td><form method="post" action="/cmsv3/reviews/index" id="search"><input name="data[query]" type="text" size="40" placeholder="Search Reviews..." /></form><p class="form-buttons" style="margin-right:20px;"><button id="save-user" title="delete baskets" type="button" class="scalable delete" onclick="submitMultiForm('ReviewMultiForm','/cmsv3/reviews/remove');"><span><span><span>Delete Review</span></span></span></button><button id="approve-review" title="Approve Reviews" type="button" class="scalable save" onclick="submitMultiForm('ReviewMultiForm','/cmsv3/reviews/approve');"><span><span><span>Approve Review</span></span></span></button></p></td></tr></table></div>
</div>



