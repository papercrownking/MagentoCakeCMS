<?php
/* /app/views/helpers/link.php */


class ToolsHelper extends AppHelper {
    var $helpers = array('Html');
	
	function writePrivilege() {
    	if($_SESSION['Auth']['User']['is_admin'])
    		return e('admin');
    	else
    		return e('user');
	}
	
	function check($which){
		if(count($which)==0)
			e(' class="hide"');
	}
	
	function hide($which){
		if(empty($which))
			e(' class="hide"');
	}
	
	function adminOnly(){
		if($_SESSION['Auth']['User']['group_id']>1)
			e(' style="display:none"');
	}
	
	function editorialOnly(){
		if($_SESSION['Auth']['User']['group_id']>2)
			e(' style="display:none"');
	}
	
	function bookURL($data){
		e(stripslashes(PREVIEW_LINK.'book/'.$data['Book']['BookCode'].'/'.$data['Book']['slug'].time()));
	}
	
	function drawFlagCheckboxes($data,$active=array(),$model='Editorial'){
		$active = array_filter($active);
		e('<div class="input checkbox">');
			e('<div class="inputBG">');
				$i = 0;
				foreach ($data as $row){
					if(in_array($row,$active)){
						e('<input type="checkbox" CHECKED name="data['.$model.'][region]['.$i.']" value="'.$row.'">');
					}else{
						e('<input type="checkbox" name="data['.$model.'][region]['.$i.']" value="'.$row.'">');
					}
//					e($row);
					e($this->Html->image('flags/thumb/'.strtolower($row).'.gif'));
					$i++;
				}
				//e('<span style="margin-left:5px">
			//			<a href="#" onclick="selectCheckBoxes(event,\'all\',\'input\')">all</a> |
			//			<a href="#" onclick="selectCheckBoxes(event,\'none\',\'input\')">none</a> |
		//				<a href="#" onclick="selectCheckBoxes(event,\'invers\',\'input\')">invers</a>
		//			</span>');
			e('</div>');
		e('</div>');
	}
	
	function drawFlagCheckboxesVertical($data,$active=array()){
				$active = array_filter($active);
				$i = 0;
				e('<div class="input checkbox">');
					e('
						<a href="#" onclick="selectCheckBoxes(event,\'all\',\'input\')">all</a> |
						<a href="#" onclick="selectCheckBoxes(event,\'none\',\'input\')">none</a> |
						<a href="#" onclick="selectCheckBoxes(event,\'invers\',\'input\')">invers</a>
					   ');
					e("<br>");
					foreach ($data as $row){
						if(in_array($row,$active)){
							e('<input type="checkbox" CHECKED name="data[Editorial][region]['.$i.']" value="'.$row.'">');
						}else{
							e('<input type="checkbox" name="data[Editorial][region]['.$i.']" value="'.$row.'">');
						}
						e($this->Html->image('flags/thumb/'.strtolower($row).'.gif'));
						e("<br>");
						$i++;
					}
				e('</div>');
				
	}
	
	function convertCurrencyToPounds($value,$regionCode){
		$output = 0;
		switch (strtoupper($regionCode)) {
			case 'US':
				$output = $value/1.96;
			break;
			case 'AU':
				$output =  $value/2.66;
			break;
			case 'CA':
				$output =  $value/2.15;
			break;
			default:
				$output =  $value;
			break;
		}
		
		return number_format($output,0);
	}
	
	function array_flatten($array, &$newArray = Array() ,$prefix='',$delimiter='|') {
	  foreach ($array as $key => $child) {
	    if (is_array($child)) {
	      $newPrefix = $prefix.$key.$delimiter;
	      $newArray =& $this->array_flatten($child, $newArray ,$newPrefix, $delimiter);
	    } else {
	      $newArray[$prefix.$key] = $child;
	    }
	  }
	  return $newArray;
	}
	
}

?>