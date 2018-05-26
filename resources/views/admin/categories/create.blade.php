@extends('admin.layouts.coreui')
@section('title','Create category')
@section('content')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <strong>Create new category</strong>
                </div>
                <div class="card-block">
                @include('admin.blocks.errors')
                    <form action="" method="post">
                    	<input type="hidden" name="_token" value="{{csrf_token()}}">
                    	<div class="form-group">
                    		<label for="parent_id">Parent</label>
                    		 <select id="select" name="parent_id" class="form-control">
                                    <option value="0">No parent</option>
<?php 
function dequymenudacap($data, $parent_id=0, $text='',$select=0)
{
	foreach($data as $key => $item)
	{
		if($item['parent_id'] == $parent_id){
			echo '<option ';
            if($select == $item['id']) echo 'selected ';
            echo 'value="'.$item['id'].'">' . $text.$item['name'].'</option>';
			unset($data[$key]);
			dequymenudacap($data, $item['id'], $text.'--',$select);
		}
	}
}
$select = old('parent_id');
dequymenudacap($categories,0,'',$select);
?>
                            	</select>
                    		</div>
                        <div class="form-group">
                            <label for="name">Category name *</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter category name..">
                            <!-- <span class="help-block">Please enter your email</span> -->
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" id="nf-password" name="slug" class="form-control" placeholder="Enter Slug..">
                            <!-- <span class="help-block">Please enter your password</span> -->
                        </div>
                        <div class="form-goroup">
                        	<label for="description">Description</label>
                        	<textarea id="description" name="description" rows="3" maxlength="255" class="form-control" placeholder="Description..">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                        	<label for="status">Status</label>
                        	<select id="select" name="status" class="form-control">
                                    <option value="1">Publish</option>
                                    <option @if(old('status') == '0') {{'selected '}} @endif value="0">Hidden</option>
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