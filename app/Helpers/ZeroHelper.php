<?php 

if(!function_exists('test01')){
	function test01(){
		return 'lol';
	}
}

if(!function_exists('')){
	function dequymenudacap($data, $parent_id=0, $text='',$selected=0, $self_id=null)
	{
	    foreach($data as $key => $item)
	    {
	        if($item['parent_id'] == $parent_id and $item['id'] != $self_id){
	            echo '<option ';
	            if($selected == $item['id']) echo 'selected ';
	            echo 'value="'.$item['id'].'">' . $text.$item['name'].'</option>';
	            unset($data[$key]);
	            dequymenudacap($data, $item['id'], $text.'--',$selected, $self_id);
	        }
	    }
	}
}