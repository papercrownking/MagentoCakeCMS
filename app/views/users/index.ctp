<div class="content-header">
<table><tr><td><h3>Manage CMS Users</h3></td><td><p class="form-buttons" style="margin-right:20px;"><button id="save-user" title="add user" type="button" class="scalable save" onclick="window.location.href='/cmsv3/users/add';"><span><span><span>Add new user</span></span></span></p></td></tr></table>
</div>
<div class="grid">
<table cellspacing="0" class="data">
	<thead>
		<tr class="headings">
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title"></span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Name</span></a></span></th>	
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Username</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Action</span></a></span></th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($data as $user): ?>
		<?php var_dump($user); ?>
			<?php echo "<tr class='pointer'><td></td><td>{$user['User']['first_name']} {$user['User']['last_name']}</td><td>{$user['User']['username']}</td>
				<td>{$user['User']['email']}</td><td>{$userGroups[$user['User']['group_id']]}</td>
				<td>{$YNValue[$user['User']['active']]}</td><td>{$YNValue[$user['User']['is_admin']]}</td><td>{$time->nice($user['User']['created'])}</td>
				<td><a href='/cmsv3/users/view/{$user['User']['id']}'>view</a></td></tr>"; ?>
		<?php $i++; endforeach; ?>
	</tbody>
</table>
</div>
<div class="content-header-floating" style="display:none;">
<div class="content-header">
<table><tr><td><h3>Manage CMS Users</h3></td><td><p class="form-buttons" style="margin-right:20px;"><button id="save-user" title="add user" type="button" class="scalable save" onclick="window.location.href='/cmsv3/users/add';"><span><span><span>Add new user</span></span></span></p></td></tr></table>
</div>
</div>



