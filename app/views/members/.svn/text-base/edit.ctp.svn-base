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
    if(errorArray['FirstName'] != null){
      $('#FirstName').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['FirstName']+'</div>');
    }
    if(errorArray['Surname'] != null){
      $('#Surname').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['Surname']+'</div>');
    }    
    if(errorArray['Email'] != null){
      $('#Email').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['Email']+'</div>');
    } 
    if(errorArray['Address1'] != null){
      $('#Address1').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['Address1']+'</div>');
    } 
    if(errorArray['PostCode'] != null){
      $('#PostCode').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['PostCode']+'</div>');
    } 
    if(errorArray['CountryCode'] != null){
      $('#CountryCode').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['CountryCode']+'</div>');
    } 
    if(errorArray['MemberStatusCode'] != null){
      $('#MemberStatus').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['MemberStatusCode']+'</div>');
    } 
  });
</script>
