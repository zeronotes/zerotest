@extends('admin.layouts.main')
@section('title','Edit user')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                        <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">Edit Category</h3>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form method="post" class="m-form m-form--fit m-form--label-align-right">
                <div class="m-portlet__body">
                    <div style="padding-left: 15px; padding-right: 15px;">
                    @include('admin.layouts.partials.alert-error')
                    @include('admin.layouts.partials.alert-success')
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-2 col-form-label">Name</label>
                        <div class="col-10">
                            <input class="form-control m-input" type="text" onfocusout="strSlug()" value="{{ $data->name }}" placeholder="Enter category name" name="name" id="name">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-search-input" class="col-2 col-form-label">Slug</label>
                        <div class="col-10">
                            <input class="form-control m-input" type="text" id="slug" placeholder="Enter category slug" name="slug" value="{{ $data->slug }}">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="parent_id" class="col-2 col-form-label">Parent Category</label>
                        <div class="col-10">
                            <select name="parent_id" class="form-control m-input" id="parent_category">
                                <option value="0">None</option>
                                @foreach ($multiLevelCategory as $row)
                                <option value="{{ $row['id'] }}" <?php if ($row['id'] == $data->parent_id) echo 'selected'; ?>>{{ $row['text'].$row['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-url-input" class="col-2 col-form-label">Description</label>
                        <div class="col-10">
                            <textarea class="form-control m-input" name="description" rows="5" placeholder="Enter description">{{ $data->description }}</textarea>
                            <span class="m-form__help">The description is not prominent by default; however, some themes may show it.</span>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn btn-primary custom-small-button">Submit</button>
                                <button type="reset" class="btn btn-secondary custom-small-button btn-secondary2">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('footer_custom')
<script>
    function strSlug()
        {
            // Get value va chuyen sang chu thuong
            name = document.getElementById("name").value;
            slug = name.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');

            // Xóa ký tự đặc biệt
            slug = slug.replace(/([^0-9a-z-\s])/g, '');

            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('slug').value = slug;
        }
</script>
@endsection