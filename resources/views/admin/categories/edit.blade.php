@extends('admin.layouts.coreui')
@section('title','Edit category')
@section('content')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit category</strong>
                </div>
                <div class="card-block">
                @include('admin.blocks.errors')
                @include('admin.blocks.success')
                    <form action="" method="post">
                    	<input type="hidden" name="_token" value="{{csrf_token()}}">
                    	<div class="form-group">
                    		<label for="parent_id">Parent</label>
                    		 <select id="select" name="parent_id" class="form-control">
                                    <option value="0">Root</option>
<?php 
// function dequymenudacap2($data, $selected_id, $parent_id=0, $text='')
// {
// 	foreach($data as $key => $item)
// 	{
// 		if($item['parent_id'] == $parent_id){
// 			echo '<option ';
//             if($item['id'] == $selected_id) {
//                 echo 'selected ';
//             }
//             echo 'value="'.$item['id'].'">' . $text.' '.$item['name'].'</option>';
// 			unset($data[$key]);
// 			dequymenudacap($data, $selected_id, $item['id'], $text.'--');
// 		}
// 	}
// } 
// dequymenudacap2($categories, $category['parent_id']);
dequymenudacap($categories, 0, '', $category['parent_id'], $category['id']);
// dequymenudacap($categories, $category['parent_id']);
?>
                            	</select>
                    		</div>
                        <div class="form-group">
                            <label for="name">Category name *</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$category['name']}}" placeholder="Enter category name..">
                            <!-- <span class="help-block">Please enter your email</span> -->
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" id="nf-password" name="slug" class="form-control" placeholder="Enter Slug.." value="{{$category['slug']}}">
                            <!-- <span class="help-block">Please enter your password</span> -->
                        </div>
                        <div class="form-goroup">
                        	<label for="description">Description</label>
                        	<textarea id="description" name="description" rows="3" maxlength="255" class="form-control" placeholder="Description..">{{$category['description']}}</textarea>
                        </div>
                        <div class="form-group">
                        	<label for="status">Status</label>
                        	<select id="select" name="status" class="form-control">
                                    <option value="1">Publish</option>
                                    <option value="0"<?php if($category['status'] == 0) echo ' selected'; ?>>Hidden</option>
                                </select>
                        </div>
                        <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Save</button>
                    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                </div>
                    </form>
                </div>
                
            </div>
        </div>
        <!--/.col-->
    </div>
                    
</div>
@endsection