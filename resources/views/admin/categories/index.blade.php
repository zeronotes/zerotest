@extends('admin.layouts.main')

@section('title','posts manager')

@section('content')
@include('admin.layouts.partials.alert-error')
@include('admin.layouts.partials.alert-success')
<div class="row">
    <!-- create category -->
    <div class="col-lg-4">
        @include('admin.categories.create')
    </div>
    <!-- /create category -->

    <!-- list categories -->
    <div class="col-lg-8">
        <div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Danh sách Categories
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <!-- <a href="{{ route('admin.categories.create') }}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" style="margin-top: 12px">
                <span>
                    <i class="la la-cart-plus"></i>
                    <span>New Category</span>
                </span>
            </a> -->
            <form method="get" class="input-group" id="search_categories">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token">
                <input type="text" class="form-control" name="name" id="name_search" placeholder="Enter name of categories...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="m-portlet__body">
        <!--begin: Datatable -->
        <div class="m-datatable m-datatable--default m-datatable--brand m-datatable--loaded"><table class="m-datatable__table" id="html_table" width="100%" style="display: block; min-height: 300px; /*overflow-x: auto;*/">
            <thead class="m-datatable__head">
            <tr class="m-datatable__row" style="left: 0px;">
                <th title="Field #1" class="m-datatable__cell m-datatable__cell--sort" data-field="Order ID"><span style="width: 20px;"><input type="checkbox" name="check_category[]" value="all"></span></th>
                <th title="Field #3" class="m-datatable__cell m-datatable__cell--sort text-left" data-field="Contact"><span style="width: 200px;">Name</span></th>
                <th title="Field #4" class="m-datatable__cell m-datatable__cell--sort" data-field="Car Make"><span style="width: 180px;">Description</span></th>
                <th title="Field #5" class="m-datatable__cell m-datatable__cell--sort" data-field="Car Model"><span style="width: 110px;">Slug</span></th>
                <th title="Field #8" class="m-datatable__cell m-datatable__cell--sort" data-field="Order Date"><span style="width: 100px;">Count</span></th>
            </tr>
            </thead>
            <tbody class="m-datatable__body" style="" id="display_result">
            @foreach($data as $row)
            <tr data-row="0" class="parent-show m-datatable__row" style="left: 0px;">
            <td class="m-datatable__cell align-top"><span style="width: 20px;"><input type="checkbox" name="check_category[]" value="{{ $row['id'] }}"></span></td>
            <td data-field="Order ID" class="m-datatable__cell align-top">
            <span style="width: 200px; font-weight: 500;"><a class="xanhwp first-uppercase" href="{{ route('admin.categories.edit',$row['id']) }}">{{ $row['text'].$row['name'] }}</a></span>
            <span style="width: 200px; font-weight: 500;" class="child-hidden">
                <form method="post" action="{{ route('admin.categories.delete',$row['id']) }}" class="formdelete">
                    <div class="row">
                        <div class="col-lg-1 col-xs-1 text-left" style="padding-right: 1px; padding-left: 5px"></div>
                        <div class="col-lg-2 col-xs-3 text-left" style="padding-right: 1px; padding-left: 5px">
                            <a href="{{ route('admin.categories.edit',$row['id']) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill xanhwp" title="Edit">
                            <i class="la la-edit"></i></a>
                        </div>
                        <div class="col-lg-2 col-xs-4 text-left" style="padding-left:1px;">
                            @method('DELETE')
                            @csrf
                            <button type="submit" title="Delete" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill xanhwp"><i class="la la-trash"></i></button>
                        </div>
                        <div class="col-lg-7 col-xs-4 text-left" style="padding-right: 1px; padding-left: 5px">
                            <a href="{{ route('admin.categories.edit',$row['id']) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill xanhwp" title="View">
                            <i class="la la-caret-right"></i></a>
                        </div>
                    </div>
                </form>
            </span>
            </td>
            <td data-field="Owner" class="m-datatable__cell align-top"><span style="width: 180px;">
                    <a class="xanhwp align-top" href="#">{{ $row['description'] }}</a>
            </span></td>
            <td data-field="Contact" class="m-datatable__cell align-top"><span style="width: 110px;">
                    <a class="xanhwp" href="">{{ $row['slug'] }}</a>
            </span></td>
            <td data-field="Car Make" class="m-datatable__cell align-top test134"><span style="width: 110px;">
                    <a class="xanhwp" href="javascript:;">lol</a>
            </span></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
        
        <span class="m-datatable__pager-detail">Displaying 100 of 100 records</span>
        </div></div>
        <!--end: Datatable -->
    </div>
</div>
    </div>
</div>
@endsection
@section('footer_custom')
<script src="/assets/js/jquery.confirm.min.js"></script>
    <script>
        $('#display_result').delegate('.formdelete','submit', function(event) {
            event.preventDefault();
            var form = $(this)[0];
            $.confirm({
                text: "Are you sure you want to delete?",
                confirmButton: 'Ok',
                cancelButton: 'Cancel',
                confirmButtonClass: 'btn-success',
                cancelButtonClass: 'btn-danger',
                confirm: function() {
                    //Submit the form
                    form.submit();
                },
                cancel: function() {
                    //Do nothing
                }
            });
        });

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

        $('#search_categories').submit(function(){
            $.ajax({
                url : "/admin/categories/search",
                type : "post", 
                dateType:"html", 
                data : { 
                     name : $('#name_search').val(),
                     _token : $('#_token').val(),
                },
                beforeSend: function(){
                    // $('#pic_load').removeClass('hide');
                    // return false;
                },
                success : function (result){
                    // $('#pic_load').addClass('hide');
                    $('#display_result').html(result);
                }
            });
            return false;
        });

        $('#display_result').delegate( ".test134", "click",function(){
            alert('dmmmm');
        });


    </script>
@endsection