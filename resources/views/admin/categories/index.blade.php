@extends('admin.layouts.coreui')
@section('title','Quan ly danh muc')
@section('content')
<div class="animated fadeIn">
@include('admin.blocks.success')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    Add New Category
                </div>
                <div class="card-block">
                    <!-- add category -->
                    @include('admin.blocks.errors')
                    
                    <form action="{{route('admin.categories.create')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    
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
                            <label for="parent_id">Parent</label>
                             <select id="select" name="parent_id" class="form-control">
                                    <option value="0">No parent</option>
                        <?php 
                        $select = old('parent_id');
                        dequymenudacap($categories);
                        // $cl = multi_level_menu3($categories,0,'',$select);
                        ?>
                                </select>
                                
                            </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="select" name="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option @if(old('status') == '0') {{'selected '}} @endif value="0">Inactive</option>
                                </select>
                        </div>
                        <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Save</button>
                    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                </div>
                    </form>
                    <!-- /add category -->
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-list"></i> Categories                
                </div>
                <div class="card-block">
                    <table class="table">
                        <!-- <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead> -->
                        <tbody>
<?php 
function listdequymenu($data, $parent_id=0, $text='')
{
    foreach($data as $key => $item)
    {
        if($item['parent_id'] == $parent_id){
            echo '<tr><td>' . $text.' '.$item['name'].'</td><td>';
            if($item['status'] == 1) {
                echo '<span class="badge badge-success">Active</span>';    
            } else {
                echo '<span class="badge badge-danger">Inactive</span>';
            }
            echo '</td><td><form action="'.route('admin.categories.delete',$item['id']).'" method="POST" class="form-inline" role="form">
                <div class="form-group">';
            echo '<a href="'.route('admin.categories.edit',$item['id']).'" class="btn-link active"><i class="fa fa-pencil"></i>&nbsp;Edit</a>';
            echo '<input type="hidden" class="form-control" name="_token" value="'.csrf_token().'" placeholder="Input field">
            <button type="submit" class="btn-link btn-delete"><i class="fa fa-remove"></i>&nbsp;Delete</button>
            </div>
            </form></td></tr>'; 
            unset($data[$key]);
            listdequymenu($data, $item['id'], $text.'--');
        }
    }
}
listdequymenu($categories);
?>                                        
                    </tbody>
                </table>
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Prev</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">4</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/.col-->
</div>
@endsection

@section('footer.custom')
<script>
    $(".btn-delete").click(function(){
        var zdel = confirm('Are you want delete this category?');
        if(zdel == false) {
            return false;
        }
    });
</script>
@endsection