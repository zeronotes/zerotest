    @foreach($data as $row)
    <tr data-row="0" class="parent-show m-datatable__row" style="left: 0px;">
    <td class="m-datatable__cell align-top"><span style="width: 20px;"><input type="checkbox" name="check_select[]" value="{{ $row['id'] }}"></span></td>
    <td data-field="Order ID" class="m-datatable__cell align-top">
    <span style="width: 200px; font-weight: 500;"><a class="xanhwp first-uppercase" href="{{ route('admin.tags.edit',$row['id']) }}">{{ $row['name'] }}</a></span>
    <span style="width: 200px; font-weight: 500;" class="child-hidden">
        <form method="post" action="{{ route('admin.tags.delete',$row['id']) }}" class="formdelete">
            <div class="row">
                <div class="col-lg-1 col-xs-1 text-left" style="padding-right: 1px; padding-left: 5px"></div>
                <div class="col-lg-2 col-xs-3 text-left" style="padding-right: 1px; padding-left: 5px">
                    <a href="{{ route('admin.tags.edit',$row['id']) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill xanhwp" title="Edit">
                    <i class="la la-edit"></i></a>
                </div>
                <div class="col-lg-2 col-xs-4 text-left" style="padding-left:1px;">
                    @method('DELETE')
                    @csrf
                    <button type="submit" title="Delete" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill xanhwp"><i class="la la-trash"></i></button>
                </div>
                <div class="col-lg-7 col-xs-4 text-left" style="padding-right: 1px; padding-left: 5px">
                    <a href="{{ route('admin.tags.edit',$row['id']) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill xanhwp" title="View">
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