<?php 

if (! function_exists('test01')) {
	function test01()
	{
		return 'lol';
	}
}

if (! function_exists('multi_level_category')) {
	function multi_level_category($data, $parent_id=0, $marginLeft=0,$select=[])
	{
		foreach ($data as $key => $item)
		{
			if ($item['parent_id'] == $parent_id) {
				echo '<label class="m-checkbox checkcl" style="margin-left: '.$marginLeft.'px;">';
				echo '<input type="checkbox" name="category_check_list[]" value="'.$item['id'].'"';
	            if (in_array($item['id'], $select)) echo ' checked';
	            echo '>'.$item['name'];
	            echo '<span></span></label>';
				unset($data[$key]);
				multi_level_category($data, $item['id'], $marginLeft+18,$select);
			}
		}
	}
}

// return array
if (! function_exists('multiLevelArray')) {
	function multiLevelArray(Array $data, $parent = 0, $text = '') {
	    $result = array();
	    foreach ($data as $key => $item) {
	        if ($item['parent_id'] == $parent) {
	        	unset($data[$key]);
	        	$item['text'] = $text;
	        	$result[] = $item;
	            $children = multiLevelArray($data, $item['id'], $text.'—');
	            if (!empty($children)) {
	            	foreach ($children as $value) {
	            		$result[] = $value;
	            	}
	            }  
	        }
	    }
	    return $result;
	}
}

// if (! function_exists('buildTree')) {
// 	function buildTree(Array $data, $parent = 0) {
// 	    $tree = array();
// 	    foreach ($data as $key => $item) {
// 	        if ($item['parent_id'] == $parent) {
// 	        	unset($data[$key]);
// 	            $children = buildTree($data, $item['id']);
// 	            // set a trivial key
// 	            if (!empty($children)) {
// 	                $item['_children'] = $children;
// 	            }
// 	            $tree[] = $item;
// 	        }
// 	    }
// 	    return $tree;
// 	}
// }


if (! function_exists('test_foreach')) {
	function test_foreach() 
	{
		$post = new App\Post;
		$title = str_random(20);
		$post->title = $title;
		$post->content = 'test test';
		$post->slug = str_slug($title);
		$post->author_id = 1;
		$post->save();
		return [1,2,5,6,8];
	}
}