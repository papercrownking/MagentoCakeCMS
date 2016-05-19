<div class="content-header"><table><tr><td><h3>View Orders</h3></td><td><form method="post" action="/cmsv3/orders/index" id="search"><input name="data[query]" type="text" size="40" placeholder="Search Orders..." /></form></td></tr></table></div>
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
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">OrderID</span></a></span></th>	
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">MemberID</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Name</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">MemberStatusCode</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Items</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Country Code</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Date</span></a></span></th>
			<th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Action</span></a></span></th>
		</tr>
	</thead>
	<tbody>
	  <?php if(!empty($data)): ?>
		<?php $i=1; foreach($data as $order): ?>
			<?php
			if($i&1){ $rowClass = 'pointer'; } else { $rowClass = 'pointer even'; } 
			?>
			<?php echo "<tr class='{$rowClass}'><td></td><td>{$order['BookOrder']['OrderID']}</td><td>{$order['BookOrder']['MemberID']}</td>
				<td>{$order['BookOrder']['Name']}</td><td>{$order['BookOrder']['MemberStatusCode']}</td>
				<td>{$order['BookOrder']['OrderItemCount']}</td><td>{$order['BookOrder']['CountryCode']}</td><td>{$time->niceShort($order['BookOrder']['CDate'])}</td>
				<td><a href='/cmsv3/orders/modal_view/{$order['BookOrder']['OrderID']}' class='modalview  fancybox.iframe fancybox.iframe'>view</a></td></tr>"; ?>
		<?php $i++; endforeach; ?>
		<?php else: ?>
		    <tr class="pointer"><td colspan="9"><b>NO ORDERS FOUND</b></td></tr>
		<?php endif; ?>
	</tbody>
</table>
</div>
<div class="content-header-floating" style="display:none;">
  <div class="content-header"><table><tr><td><h3>View Orders</h3></td><td><form method="post" action="/cmsv3/orders/index" id="search"><input name="data[query]" type="text" size="40" placeholder="Search Orders..." /></form></td></tr></table></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$(".modalview").fancybox({
		maxWidth	: 800,
		fitToView	: false,
		width		: '800px',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
	});
});
</script>



