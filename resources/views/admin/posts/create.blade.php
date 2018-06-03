@extends('admin.layouts.main')
@section('title','Create new post')
@section('head_custom')
<link rel="stylesheet" href="/libs/bootstrap-tags-input/bootstrap-tagsinput.css" type="text/css" />
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
						@include('admin.layouts.partials.alert-error')
						<div class="form-group m-form__group">
							<input name="title" type="text" class="form-control m-input create-post-title" value="{{ old('title') }}" placeholder="Enter title here">
						</div>
						<div class="form-group m-form__group">
							<textarea name="content" class="form-control m-input" id="post_content">{{ old('content') }}</textarea>
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
							<option value="publish" <?php if (old('status') == 'publish') echo 'selected'; ?> >Publish</option>
							<option value="draft" <?php if (old('status') == 'draft') echo 'selected'; ?>>Draft</option>
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
							$selected = old('category_check_list');
							if (! isset($selected)) {
							 	$selected = [];
							}
							multi_level_category($categories,0,0,$selected);
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
				<input name="tags" id="tags" type="text" placeholder="" value="{{ old('tags') }}" data-role="tagsinput" />
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
				
				@if (old('featured_image') !== null)
				<input type="hidden" name="featured_image" id="featured_image" value="{{ old('featured_image') }}" />
				<div id="image" onclick="openKCFinder(this)">
					<img id="img" src="{{ old('featured_image') }}" style="width: 100%;margin-left: 0px; margin-top: 6px; visibility: visible;" /><br>Click the image to edit or update
				</div>	
				@else
				<input type="hidden" name="featured_image" id="featured_image" />
				<div id="image" onclick="openKCFinder(this)">
					<div style="margin:5px"><span>Click here to upload or choose an image</span></div>
				</div>	
				@endif
				
			</div>
		</div>
		<!-- /featured image portlet -->
	</div>
</form>		
@endsection
@section('footer_custom')
<!--begin::Page Resources --> 
    <script src="/assets/demo/default/custom/components/portlets/tools.js" type="text/javascript"></script>
    <script src="/libs/ckeditor/ckeditor.js"></script>
    <script src="/libs/bootstrap-tags-input/bootstrap-tagsinput.min.js"></script>
    <script src="/assets/js/typeahead.bundle.min.js"></script>
    <script src="/assets/js/custom_posts.js"></script>
@endsection