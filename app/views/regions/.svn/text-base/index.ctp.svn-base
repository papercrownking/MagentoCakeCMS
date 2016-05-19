<div id="messages"><?php echo $this->Session->flash(); ?></div>
<div class="content-header"><table><tr><td><h3>Manage Regions</h3></td><td></td></tr></table></div>
<table class="massaction">
	<tr>
		<td><td>
	</tr>
</table>
<div class="grid">
<form enctype="multipart/form-data" method="post" id="ReviewMultiForm" action="" class="deleteForm">
<table cellspacing="0" class="data">
	<thead>
		<tr class="headings">
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Region</span></a></span></th>	
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Currency</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Currency Code</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Exchange Rate</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Phone</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">IB Message</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Action</span></a></span></th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($data as $region): ?>
			<?php
				
			if($i&1){ $rowClass = 'pointer'; } else { $rowClass = 'pointer even'; } 
			?>
			<?php echo "<tr class='{$rowClass}' id='reviewrow_{$region['Region']['RegionCode']}'><td>{$region['Region']['RegionCode']}</td>
				<td>{$region['Region']['Currency']}</td><td>{$region['Region']['CurrencyCode']}</td><td>{$region['Region']['ExchangeRate']}</td><td>{$region['Region']['Phone']}</td><td>{$region['Region']['IBMsg']}</td>
				<td><a href='/cmsv3/regions/view/{$region['Region']['RegionCode']}'>view</a></td></tr>"; ?>
		<?php $i++; endforeach; ?>
	</tbody>
</table>
</div>
</form>
<div class="content-header-floating" style="display:none;">
<div class="content-header"><table><tr><td><h3>Manage Regions</h3></td><td></td></tr></table></div>
</div>



