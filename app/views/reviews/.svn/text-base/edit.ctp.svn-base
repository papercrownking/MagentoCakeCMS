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
    if(errorArray['BookCode'] != null){
      $('#BookCode').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['BookCode']+'</div>');
    }
    if(errorArray['author'] != null){
      $('#Author').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['author']+'</div>');
    }    
    if(errorArray['rating1'] != null){
      $('#TextRating').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['rating1']+'</div>');
    } 
    if(errorArray['rating2'] != null){
      $('#BindingRating').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['rating2']+'</div>');
    } 
    if(errorArray['rating3'] != null){
      $('#IllustrationRating').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['rating3']+'</div>');
    } 
    if(errorArray['rating4'] != null){
      $('#OverallRating').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['rating4']+'</div>');
    } 
  });
</script>
