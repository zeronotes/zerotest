<?php 

if(!function_exists('test01')){
	function test01(){
		return 'lol';
	}
}

if(!function_exists('multi_level_category')){
	function multi_level_category($data, $parent_id=0, $marginLeft=0,$select=[])
	{
		foreach($data as $key => $item)
		{
			if($item['parent_id'] == $parent_id){
				echo '<label class="m-checkbox checkcl" style="margin-left: '.$marginLeft.'px;">';
				echo '<input type="checkbox" name="category_check_list[]" value="'.$item['id'].'"';
	            if(in_array($item['id'], $select)) echo ' checked';
	            echo '>'.$item['name'];
	            echo '<span></span></label>';
				unset($data[$key]);
				multi_level_category($data, $item['id'], $marginLeft+18,$select);
			}
		}
	}
}


if(!function_exists('test_foreach')){
	function test_foreach(){
		echo 'fuck';
		return [1,2,5,6,8];
	}
}