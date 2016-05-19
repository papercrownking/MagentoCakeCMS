<ul class="messages">
	<li class="<?php echo $data['type']; ?>-msg">
		<ul>
			<li><span><?php echo $data['msg']; ?></span></li>
		</ul>
	</li>
</ul>
<?php if($data['id'] != NULL): ?>
<script type="text/javascript">
var cat_id = <?php echo json_encode($data); ?>

window.top.location.href = "http://romulus.foliosociety.com/cmsv3/categories/view/"+cat_id['id']; 

</script>
<?php endif; ?>
<script type="text/javascript">
  $(document).ready(function(){
    var errorArray = <?php echo json_encode($errors); ?>;
    if(errorArray['CategoryCode'] != null){
      $('#CategoryCode').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['CategoryCode']+'</div>');
    }
    if(errorArray['Description'] != null){
      $('#Description').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['Description']+'</div>');
    }    
    if(errorArray['slug'] != null){
      $('#Slug').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['slug']+'</div>');
    } 
    if(errorArray['status_codes'] != null){
      $('#status_codes').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['status_codes']+'</div>');
    } 
    if(errorArray['LayoutTitle'] != null){
      $('#LayoutTitle').after('<div class="validation-advice" id="advice-required-entry-model">'+errorArray['LayoutTitle']+'</div>');
    } 
  });
</script>