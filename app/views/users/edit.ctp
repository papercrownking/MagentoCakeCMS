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
    if(errorArray['username'] != null){
      $('#Username').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['username']+'</div>');
    }
    if(errorArray['last_name'] != null){
      $('#Lastname').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['last_name']+'</div>');
    }
    if(errorArray['first_name'] != null){
      $('#Firstname').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['first_name']+'</div>');
    }      
    if(errorArray['email'] != null){
      $('#email').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['email']+'</div>');
    }     
  });
</script>

