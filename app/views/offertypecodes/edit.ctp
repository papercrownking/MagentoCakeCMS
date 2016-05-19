<ul class="messages">
	<li class="<?php echo $data['type']; ?>-msg">
		<ul>
			<li><span><?php echo $data['msg']; ?></span></li>
		</ul>
	</li>
</ul>
<script type="text/javascript">
  $(document).ready(function(){
    var errorArray = <?php echo json_encode($errors); ?>;
    if(errorArray['OfferTypeCode'] != null){
      $('#OfferTypeCode').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['OfferTypeCode']+'</div>');
    }
    if(errorArray['Description'] != null){
      $('#Description').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['Description']+'</div>');
    }    
    if(errorArray['OfferTypeFlag'] != null){
      $('#OfferTypeFlag').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['OfferTypeFlag']+'</div>');
    } 
  });
</script>