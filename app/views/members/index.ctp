<div class="content-header"><table><tr><td><h3>Manage Customers</h3></td><td><form method="post" action="/cmsv3/members/index" id="search"><input name="data[query]" type="text" size="40" placeholder="Search Customers..." /></form></td></tr></table></div>
<table class="massaction">
	<tr>
		<td><?php echo $this->element('paginator'); ?><td>
	</tr>
</table>
<div class="grid">
<table cellspacing="0" class="data">
	<thead>
		<tr class="headings">
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title"></span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">MemberID</span></a></span></th>	
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">MSC</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Name</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">UserName</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">PostCode</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Phone</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Email</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Action</span></a></span></th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($data as $member): ?>
			<?php
			if($i&1){ $rowClass = 'pointer'; } else { $rowClass = 'pointer even'; } 
			?>
			<?php echo "<tr class='{$rowClass}'><td></td><td>{$member['Member']['MemberID']}</td><td>{$member['Member']['MemberStatusCode']}</td>
				<td>{$member['Member']['FirstName']} {$member['Member']['Surname']}</td><td>{$member['Member']['UserName']}</td>
				<td>{$member['Member']['PostCode']}</td><td>{$member['Member']['Phone']}</td><td>{$member['Member']['Email']}</td>
				<td><a href='/cmsv3/members/view/{$member['Member']['MemberID']}'>view</a></td></tr>"; ?>
		<?php $i++; endforeach; ?>
	</tbody>
</table>
</div>
<div class="content-header-floating" style="display:none;">
	<div class="content-header">
	<table><tr><td><h3>Manage Customers</h3></td><td><form method="post" action="/cmsv3/members/index" id="search"><input name="data[query]" type="text" size="40" placeholder="Search Customers..." /></form></td></tr></table>
	</div>
</div>



