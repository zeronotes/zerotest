@extends('admin.layouts.main')

@section('title','Comments manager')

@section('content')
@include('admin.layouts.partials.alert-error')
@include('admin.layouts.partials.alert-success')
<div class="row">
    <!-- list comments -->
    <div class="col-lg-12">
        <div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Danh sách comments
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <form method="get" class="input-group" id="search_form">
                <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token"> -->
                <input type="text" class="form-control" name="keyword" id="name_search" placeholder="Enter keyword of comments...">
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
                <th title="Field #3" class="m-datatable__cell m-datatable__cell--sort text-left" data-field="Contact"><span style="width: 120px;">Author</span></th>
                <th title="Field #4" class="m-datatable__cell m-datatable__cell--sort" data-field="Car Make"><span style="width: 300px;">Content</span></th>
                <th title="Field #5" class="m-datatable__cell m-datatable__cell--sort" data-field="Car Model"><span style="width: 120px;">in Response to</span></th>
                <th title="Field #8" class="m-datatable__cell m-datatable__cell--sort" data-field="Order Date"><span style="width: 100px;">Created at</span></th>
            </tr>
            </thead>
            <tbody class="m-datatable__body" style="" id="display_result">
            <?php $str_csrf = csrf_token(); ?>
            @foreach ($data as $row)
            <tr data-row="0" class="parent-show m-datatable__row" style="left: 0px; min-height: 100px">
            <td class="m-datatable__cell align-top"><span style="width: 20px;"><input type="checkbox" name="check_category[]" value="{{ $row['id'] }}"></span></td>
            <td data-field="Order ID" class="m-datatable__cell align-top">
            <span style="width: 120px; font-weight: 500;"><a class="xanhwp first-uppercase" href="{{ route('admin.comments.edit',$row['id']) }}">{{ $row->user->name }}</a></span>
            </td>
            <td data-field="Owner" class="m-datatable__cell align-top"><span style="width: 300px;">
                    <span>{{ $row['content'] }}</span>>
            </span>
            
                        <span style="width: 250px; font-weight: 500;" class="child-hidden">
                <form method="post" action="{{ route('admin.comments.delete',$row['id']) }}" class="formdelete">
                    <div class="row">
                        <div class="col-lg-1 col-xs-1 text-left" style="padding-right: 1px; padding-left: 5px"></div>
                        <div class="col-lg-2 col-xs-3 text-left" style="padding-right: 1px; padding-left: 5px">
                            <a href="{{ route('admin.comments.edit',$row['id']) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill xanhwp" title="Edit">
                            <i class="la la-edit"></i></a>
                        </div>
                        <div class="col-lg-2 col-xs-4 text-left" style="padding-left:1px;">
                            @method('DELETE')
                            <input type="hidden" name="_token" value="{{ $str_csrf }}">
                            <button type="submit" title="Delete" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill xanhwp"><i class="la la-trash"></i></button>
                        </div>
                        <div class="col-lg-7 col-xs-4 text-left" style="padding-right: 1px; padding-left: 5px">
                            <a href="{{ route('admin.comments.edit',$row['id']) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill xanhwp" title="View">
                            <i class="la la-caret-right"></i></a>
                        </div>
                    </div>
                </form>
            </span>
            </td>
            <td data-field="Contact" class="m-datatable__cell align-top"><span style="width: 120px;">
                    <a class="xanhwp" href="/admin/{{ $row->parent_type }}s/edit/{{ $row->parent_id }}">{{ $row->parent_type }} id {{ $row['parent_id'] }}</a><br>
            </span></td>
            <td data-field="Car Make" class="m-datatable__cell align-top test134"><span style="width: 100px;">
                    <a class="xanhwp" href="javascript:;">{{ $row['created_at'] }}</a>
            </span></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
        {{ $data->appends(request()->query())->links() }}
        <span class="m-datatable__pager-detail">Displaying {{ $data->perPage() }} of {{ $data->total() }} records</span>
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

        // $('#search_form').submit(function(){
        //     $.ajax({
        //         url : "/admin/comments/search",
        //         type : "get", 
        //         dateType:"html", 
        //         data : { 
        //              name : $('#name_search').val(),
        //              _token : $('#_token').val(),
        //         },
        //         beforeSend: function(){
        //             // $('#pic_load').removeClass('hide');
        //             // return false;
        //         },
        //         success : function (result){
        //             // $('#pic_load').addClass('hide');
        //             $('#display_result').html(result);
        //         }
        //     });
        //     return false;
        // });

        $('#display_result').delegate( ".test134", "click",function(){
            alert('dmmmm');
        });


    </script>
@endsection