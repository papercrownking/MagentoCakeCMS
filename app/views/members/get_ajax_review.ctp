<div id="dt-bookReview-results-ajax">
	<div class="grid">
		<div class="hor-scroll">
			<table cellspacing="0" class="data">
				<tbody>			
					<?php if(!empty($data)): ?>
						<thead>
							<tr class="headings">
							<th>Book Code</th><th>Title</th><th>Overall Rating</th><th>Status</th><th>Created</th>				
							</tr>						
						</thead>
						<?php 

							foreach($data as $review){
		
							 echo "<tr class='even'><td>".$review['BookReview']['BookCode']."</td><td>".$review['Book']['Title']."</td><td>".$review['BookReview']['rating4']."</td><td>".$review['Status']['name']."</td><td>".$time->niceShort($review['BookReview']['created'])."</td></tr>";

							}

						?>
					<?php else: ?>
						<tr class="even"><td class="empty-text a-center" colspan="7">No reviews found.</td></tr>
					<?php endif; ?>
				</tbody>			
			</table>
		</div>
	</div>
</div>



