@extends('admin.layouts.main')
@section('title','Create new post')
@section('custom_head')
<link rel="stylesheet" href="/libs/bootstrap-tags-input/bootstrap-tagsinput.css" type="text/css" />
<link rel="stylesheet" href="/libs/bootstrap-tags-input/examples/assets/app.css">
@endsection
@section('content')
<form method="post" id=postform class="row">
@csrf
	<div class="col-lg-9">
		<!--begin::Portlet-->
		<div class="m-portlet">
			<div class="m-portlet__head m-portlet-head-create-post">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							Add New Post
						</h3>
					</div>
				</div>
			</div>
			<!--begin::Main area-->
			<div class="m-form">
				<div class="m-portlet__body">	
					<div class="m-form__section m-form__section--first">
					@if($errors->any())
					<div class="form-group m-form__group m--margin-top-10 alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Lỗi cmnr!</strong>
						<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach	
						</ul>
					</div>
					@endif
						<div class="form-group m-form__group">
							<input name="title" type="text" class="form-control m-input create-post-title" value="<?php if(old('title') !== null) echo old('title'); else echo $post->title; ?>" placeholder="Enter title here">
						</div>
						<div class="form-group m-form__group">
							<textarea name="content" class="form-control m-input" id="post_content"><?php if(old('content') !== null) echo old('content'); else echo $post->content; ?></textarea>
						</div>			
						
		            </div>
	            </div>
			</div>
			<!--end::Main area-->
		</div>
	</div>
	<div class="col-lg-3">
		<!-- publish portlet -->
		<div class="m-portlet m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_l1">
			<div class="m-portlet__head m-portlet-publish">
				<div class="m-portlet__head-caption portlet-publish-caption">
					<div class="m-portlet__head-title portlet-publish-caption-title">
						<h3 class="m-portlet__head-text" style="font-size: 14px">
							Publish
						</h3>
					</div>			
				</div>
				<div class="m-portlet__head-tools portlet-publish-tools">
					<ul class="m-portlet__nav portlet-publish-tools-nav">
						<li class="m-portlet__nav-item">
							<span m-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" aria-describedby="tooltip_dlh4ii0y3i"><i class="la la-angle-down"></i></span>	
						<div class="m-tooltip m-tooltip--portlet tooltip bs-tooltip-top" role="tooltip" id="tooltip_dlh4ii0y3i" aria-hidden="true" x-placement="top" style="position: absolute; will-change: transform; display: none; top: 0px; left: 0px; transform: translate3d(401px, 448px, 0px);">                            <div class="tooltip-arrow arrow" style="left: 0px;"></div>                            <div class="tooltip-inner">Collapse</div>                        </div></li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body portlet-publish-body" m-hidden-height="120" style="">
				<div class="m-scrollable mCustomScrollbar _mCS_6 mCS-autoHide" data-scrollbar-shown="true" data-scrollable="true" data-max-height="120" style="overflow: visible; max-height: 120px; position: relative;">
					<div class="form-group m-form__group row">
						<label class="col-lg-4 col-form-label">Status:</label>
						<div class="col-lg-8">
							<select name="status" class="form-control m-input form-control-sm" id="exampleSelect1">
							<?php
							if(old('status') !== null)
								$status = old('status');
							else
								$status = $post->status; 
							?>
							<option value="publish" <?php if($status == 'publish') echo 'selected'; ?> >Publish</option>
							<option value="draft" <?php if($status == 'draft') echo 'selected'; ?>>Draft</option>
						</select>
						</div>
					</div>
					<div class="m-portlet__foot m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions">
							<button type="Submit" class="btn btn-primary custom-small-button">Save</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /publish portlet -->

		<!-- categories portlet -->
		<div class="m-portlet m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_l2">
			<div class="m-portlet__head m-portlet-publish">
				<div class="m-portlet__head-caption portlet-publish-caption">
					<div class="m-portlet__head-title portlet-publish-caption-title">
						<h3 class="m-portlet__head-text" style="font-size: 14px">
							Categories
						</h3>
					</div>			
				</div>
				<div class="m-portlet__head-tools portlet-publish-tools">
					<ul class="m-portlet__nav portlet-publish-tools-nav">
						<li class="m-portlet__nav-item">
							<span m-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" aria-describedby="tooltip_dlh4ii0y3i"><i class="la la-angle-down"></i></span>	
						<div class="m-tooltip m-tooltip--portlet tooltip bs-tooltip-top" role="tooltip" id="tooltip_dlh4ii0y3i" aria-hidden="true" x-placement="top" style="position: absolute; will-change: transform; display: none; top: 0px; left: 0px; transform: translate3d(401px, 448px, 0px);">                            <div class="tooltip-arrow arrow" style="left: 0px;"></div>                            <div class="tooltip-inner">Collapse</div>                        </div></li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body portlet-publish-body" m-hidden-height="235" style="">
				<div class="_mCS_6 mCS-autoHide" data-scrollbar-shown="true" data-scrollable="true" data-max-height="235" style="overflow: visible; max-height: 235px; position: relative;">
					<div class="m-form__group form-group">
										<div class="m-checkbox-list">
<?php
function dequymenudacap1($data, $parent_id=0, $marginLeft=0,$select=[])
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
			dequymenudacap1($data, $item['id'], $marginLeft+18,$select);
		}
	}
}
if(old('category_check_list'))
	$selected = old('category_check_list');
else
	$selected = $categories_id;
// if(!isset($selected1)){
//  	$selected1 = [];
// }
dequymenudacap1($categories,0,0,$selected);
?>
										</div>
									</div>
				</div>
			</div>
		</div>
		<!-- /categories portlet -->
		<!-- tags portlet -->
		<div class="m-portlet m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_l3">
			<div class="m-portlet__head m-portlet-publish">
				<div class="m-portlet__head-caption portlet-publish-caption">
					<div class="m-portlet__head-title portlet-publish-caption-title">
						<h3 class="m-portlet__head-text" style="font-size: 14px" id="test_tags">
							Tags
						</h3>
					</div>			
				</div>
				<div class="m-portlet__head-tools portlet-publish-tools">
					<ul class="m-portlet__nav portlet-publish-tools-nav">
						<li class="m-portlet__nav-item">
							<span m-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" aria-describedby="tooltip_dlh4ii0y3i"><i class="la la-angle-down"></i></span>	
						<div class="m-tooltip m-tooltip--portlet tooltip bs-tooltip-top" role="tooltip" id="tooltip_dlh4ii0y3i" aria-hidden="true" x-placement="top" style="position: absolute; will-change: transform; display: none; top: 0px; left: 0px; transform: translate3d(401px, 448px, 0px);">                            <div class="tooltip-arrow arrow" style="left: 0px;"></div>                            <div class="tooltip-inner">Collapse</div>                        </div></li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body portlet-publish-body" m-hidden-height="150" style="">
			<?php
			$tags = old('tags');
			if($tags == null){
				$tags = $tags_name;
			}
			?>
				<input name="tags" id="tags" type="text" placeholder="" value="{{ $tags }}" data-role="tagsinput" />
			</div>
		</div>
		<!-- /tags portlet -->
		<!-- featured image portlet -->
		<div class="m-portlet m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_lol1">
			<div class="m-portlet__head m-portlet-publish">
				<div class="m-portlet__head-caption portlet-publish-caption">
					<div class="m-portlet__head-title portlet-publish-caption-title">
						<h3 class="m-portlet__head-text" style="font-size: 14px">
							Featured Image
						</h3>
					</div>			
				</div>
				<div class="m-portlet__head-tools portlet-publish-tools">
					<ul class="m-portlet__nav portlet-publish-tools-nav">
						<li class="m-portlet__nav-item">
							<span m-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" aria-describedby="tooltip_dlh4ii0y3i"><i class="la la-angle-down"></i></span>	
						<div class="m-tooltip m-tooltip--portlet tooltip bs-tooltip-top" role="tooltip" id="tooltip_dlh4ii0y3i" aria-hidden="true" x-placement="top" style="position: absolute; will-change: transform; display: none; top: 0px; left: 0px; transform: translate3d(401px, 448px, 0px);">                            <div class="tooltip-arrow arrow" style="left: 0px;"></div>                            <div class="tooltip-inner">Collapse</div>                        </div></li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body portlet-publish-body" m-hidden-height="120" style="">
				<?php
				$featured_image = old('featured_image');
				if(!isset($featured_image)){
					$featured_image = $post->featured_image;
				}
				?>
				@if($featured_image !== null)
				<input type="hidden" name="featured_image" id="featured_image" value="{{ $featured_image }}" />
				<div id="image" onclick="openKCFinder(this)">
					<img id="img" src="{{ $featured_image }}" style="width: 100%;margin-left: 0px; margin-top: 6px; visibility: visible;" /><br>Click the image to edit or update
				</div>	
				@else
				<input type="hidden" name="featured_image" id="featured_image" />
				<div id="image" onclick="openKCFinder(this)">
					<div style="margin:5px"><a href="#">Click here to upload or choose an image</a></div>
				</div>	
				@endif
				
			</div>
		</div>
		<!-- /featured image portlet -->
	</div>
</form>		
@endsection
@section('custom_footer_js')
<!--begin::Page Resources --> 
    <script src="/assets/demo/default/custom/components/portlets/tools.js" type="text/javascript"></script>
    <script src="/libs/ckeditor/ckeditor.js"></script>
    <script>
    	CKEDITOR.replace('post_content',{
    		autoGrow_onStartup: true,
    		//extraPlugins: 'autogrow',
			autoGrow_minHeight: 500,
			autoGrow_maxHeight: 800,
			autoGrow_bottomSpace: 50
    	});
    </script>
    <script src="/libs/bootstrap-tags-input/bootstrap-tagsinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script>
    // typeahead
		var citynames = new Bloodhound({
		  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
		  queryTokenizer: Bloodhound.tokenizers.whitespace,
		  prefetch: {
		    url: '/api/tags',
		    // url: 'assets/citynames.json',
		    filter: function(list) {
		      return $.map(list, function(cityname) {
		        return { name: cityname }; });
		    }
		  }
		});
		citynames.initialize();

		$('#tags').tagsinput({
		  typeaheadjs: {
		    name: 'citynames',
		    displayKey: 'name',
		    valueKey: 'name',
		    source: citynames.ttAdapter()
		  }
		});
	// end typeahead

		// khong submit khi enter
		document.getElementById("postform").onkeypress = function(e) {
			  var key = e.charCode || e.keyCode || 0;     
			  if (key == 13) {
			    // alert("I told you not to, why did you do it?");
			    e.preventDefault();
			  }
		}

		//test
		$('#test_tags').click(function(){
			// alert('ll');
			test = $("#tags").val();
			alert(test);
		});
		</script>
<!--end::Page Resources -->

<!-- featured image -->
<script type="text/javascript">
function openKCFinder(div) {
    window.KCFinder = {
        callBack: function(url) {
            window.KCFinder = null;
            div.innerHTML = '<div style="margin:5px">Loading...</div>';
            var img = new Image();
            img.src = url;
            img.onload = function() {
                div.innerHTML = '<img id="img" src="' + url + '" /><br>Click the image to edit or update';
                $('#featured_image').val(url);
                var img = document.getElementById('img');
                var o_w = img.offsetWidth;
                var o_h = img.offsetHeight;
                var f_w = div.offsetWidth;
                var f_h = div.offsetHeight;
                if ((o_w > f_w) || (o_h > f_h)) {
                    if ((f_w / f_h) > (o_w / o_h))
                        f_w = parseInt((o_w * f_h) / o_h);
                    else if ((f_w / f_h) < (o_w / o_h))
                        f_h = parseInt((o_h * f_w) / o_w);
                    img.style.width = f_w + "px";
                    img.style.height = f_h + "px";
                } else {
                    f_w = o_w;
                    f_h = o_h;
                }
                img.style.marginLeft = parseInt((div.offsetWidth - f_w) / 2) + 'px';
                img.style.marginTop = parseInt((div.offsetHeight - f_h) / 2) + 'px';
                img.style.visibility = "visible";
            }
        }
    };
    window.open('/libs/kcfinder/browse.php?type=images&dir=images/public',
        'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    );
}
</script>
<!-- /featured image -->
@endsection