<div id="messages"><?php echo $this->Session->flash(); ?></div>
<div class="content-header"><table><tr><td><h3>Manage Feedback</h3></td><td><form method="post" action="/cmsv3/feedbacks/index" id="search"><input name="data[query]" type="text" size="40" placeholder="Search Feedback..." /></form><p class="form-buttons" style="margin-right:20px;"><button id="export" title="export" type="button" class="scalable" onclick="window.location='/cmsv3/feedbacks/export';"><span><span><span>Export</span></span></span></button><button id="set-unprocessed" title="set unprocessed" type="button" class="scalable" onclick="submitMultiForm('FeedbackMultiForm','/cmsv3/feedbacks/unprocessed');"><span><span><span>Set 'UNPROCESSED'</span></span></span></button><button id="set-processed" title="Set Processed" type="button" class="scalable" onclick="submitMultiForm('FeedbackMultiForm','/cmsv3/feedbacks/processed');"><span><span><span>Set 'PROCESSED'</span></span></span></button></p></td></tr></table></div>
<table class="massaction">
	<tr>
		<td><?php echo $this->element('paginator'); ?><td>
	</tr>
</table>
<div class="grid">
<form enctype="multipart/form-data" method="post" id="FeedbackMultiForm" action="" class="deleteForm">
<table cellspacing="0" class="data">
	<thead>
		<tr class="headings">
			<th><span class="nobr"><input type="checkbox" name="allRowCheck" class="allCheck"/></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">ID</span></a></span></th>	
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">MemberID</span></a></span></th>	
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Name</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Text</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Status</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Created</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Action</span></a></span></th>
		</tr>
	</thead>
	<tbody> 
		<?php if(!empty($data)): ?>
		<?php $i=1; foreach($data as $feedback): ?>
			<?php
				
			if($i&1){ $rowClass = 'pointer'; } else { $rowClass = 'pointer even'; } 
			?>
			<?php echo "<tr class='{$rowClass}' id='feedbackrow_{$feedback['Feedback']['id']}'><td><input type='checkbox' name='data[rowSelect][]' value='{$feedback['Feedback']['id']}' class='checkBoxSelect'/></td><td>{$feedback['Feedback']['id']}</td><td>{$feedback['Feedback']['member_id']}</td>
				<td>{$feedback['Member']['FirstName']} {$feedback['Member']['Surname']}</td><td>{$feedback['Feedback']['text']}</td><td>{$feedback['Feedback']['status']}</td><td>{$time->niceShort($feedback['Feedback']['created'])}</td>
				<td><a href='/cmsv3/feedbacks/view/{$feedback['Feedback']['id']}'>view</a></td></tr>"; ?>
		<?php $i++; endforeach; ?>
		<?php else: ?>
			<tr >
				<td colspan="7">NO RESULTS FOUND</td>
			</tr>
		<?php endif; ?>
	</tbody>
</table>
</form>
</div>
<div class="content-header-floating" style="display:none;">
	<div class="content-header"><table><tr><td><h3>Manage Feedback</h3></td><td><form method="post" action="/cmsv3/feedbacks/index" id="search"><input name="data[query]" type="text" size="40" placeholder="Search Feedback..." /></form><p class="form-buttons" style="margin-right:20px;"><button id="export" title="export" type="button" class="scalable" onclick="submitMultiForm('FeedbackMultiForm','/cmsv3/feedbacks/export');"><span><span><span>Export</span></span></span></button><button id="set-unprocessed" title="set unprocessed" type="button" class="scalable" onclick="submitMultiForm('FeedbackMultiForm','/cmsv3/feedbacks/unprocessed');"><span><span><span>Set 'UNPROCESSED'</span></span></span></button><button id="set-processed" title="Set Processed" type="button" class="scalable" onclick="submitMultiForm('FeedbackMultiForm','/cmsv3/feedbacks/processed');"><span><span><span>Set 'PROCESSED'</span></span></span></button></p></td></tr></table></div>
</div>



