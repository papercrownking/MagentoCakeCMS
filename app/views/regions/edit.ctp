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
    if(errorArray['IBMsg'] != null){
      $('#IBMsg').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['IBMsg']+'</div>');
    }
    if(errorArray['Phone'] != null){
      $('#Phone').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['Phone']+'</div>');
    }    
    if(errorArray['ExchangeRate'] != null){
      $('#ExchangeRate').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['ExchangeRate']+'</div>');
    } 
  });
</script>
