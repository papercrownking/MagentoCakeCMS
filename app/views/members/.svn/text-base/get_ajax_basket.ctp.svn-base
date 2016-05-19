<div id="dt-shoppingCart-results-ajax">
	<div class="grid">
		<div class="hor-scroll">
			<table cellspacing="0" class="data">
				<tbody>			
					<?php if(!empty($data['Basketoffer'])): ?>
						<thead>
							<tr class="headings">
							<th>Catalogue Code</th><th>Title</th><th>Quantity</th><th>Commitment Count</th><th>Added</th>				
							</tr>						
						</thead>
						<?php 
							foreach($data['Basketoffer'] as $basketoffer){
							 echo "<tr class='even'><td>".$basketoffer['OfferCode']."</td><td>".$basketoffer['title']."</td><td>".$basketoffer['quantity']."</td><td>".$basketoffer['CommitmentCount']."</td><td>".$time->niceShort($basketoffer['created'])."</td></tr>";

							}

						?>
					<?php else: ?>
						<tr class="even"><td class="empty-text a-center" colspan="7">No books found.</td></tr>
					<?php endif; ?>
				</tbody>			
			</table>
		</div>
	</div>
</div>



