<?php if(isset($message)): ?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#messages').html('<ul class="messages"><li class="<?php echo $messageType; ?>-msg"><ul><li><span><?php echo $message; ?></span></li></ul></li></ul>');
    });     
  </script>
<?php endif; ?>
<form enctype="multipart/form-data" method="post" id="DeleteOffersForm" action="/cmsv3/categories/deleteMultiOffers/<?php  echo $cat_data['Category']['id']; ?>" class="deleteForm">
<div id="dt-categories-results-ajax">
	<div class="grid">
		<div class="hor-scroll">
			<table cellspacing="0" class="data">
		
					<?php if(!empty($data)): ?>
						<thead>
							<tr class="headings">
							 <th></th>
                <th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Offer Code</span></a></span></th>
                <th><span class="nobr"><a href="#" class="not-sort"><span class="sort-title">Action</span></a></span></th>			
							</tr>						
						</thead>
						<tbody>
            <?php foreach($data as $item): ?>
						  <tr class="even">
                <td id='categoryrow_<?php echo $item['BookCategory']['BookCategoryID']; ?>'><input type="checkbox" name="data[rowSelect][]" value="<?php echo $item['BookCategory']['BookCategoryID']; ?>" class="checkBoxSelect"/></td><td><?php echo $item['BookCategory']['OfferCode']; ?></td><td><a href="javascript:submitDeleteRow('dt-offers-results','categories','deleteOffers','<?php echo $item['BookCategory']['BookCategoryID']; ?>');">Delete</a></td>
              </tr>
						<?php endforeach; ?>
            </tbody>			
					<?php else: ?>
						<tbody>
              <tr class="even"><td class="empty-text a-center" colspan="7">No Offers found.</td></tr>
					   </tbody>
          <?php endif; ?>
			
			</table>
		</div>
	</div>
</div>
</form>





