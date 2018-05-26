@extends('admin.layouts.main')
@section('title','Create new post')
@section('content')
<form class="row">
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
			<!--begin::Form-->
			<div class="m-form">
				<div class="m-portlet__body">	
					<div class="m-form__section m-form__section--first">
						<div class="form-group m-form__group">
							<input type="email" class="form-control m-input create-post-title" placeholder="Enter title here">
						</div>
						<div class="form-group m-form__group">
							<textarea class="form-control m-input" id="post_content" rows="20"></textarea>
						</div>			
						
		            </div>
	            </div>
			</div>
			<!--end::Form-->
		</div>
	</div>
	<div class="col-lg-3">
		<!-- publish portlet -->
		<div class="m-portlet m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_7">
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
							<a href="#" m-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" aria-describedby="tooltip_dlh4ii0y3i"><i class="la la-angle-down"></i></a>	
						<div class="m-tooltip m-tooltip--portlet tooltip bs-tooltip-top" role="tooltip" id="tooltip_dlh4ii0y3i" aria-hidden="true" x-placement="top" style="position: absolute; will-change: transform; display: none; top: 0px; left: 0px; transform: translate3d(401px, 448px, 0px);">                            <div class="tooltip-arrow arrow" style="left: 0px;"></div>                            <div class="tooltip-inner">Collapse</div>                        </div></li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body portlet-publish-body" m-hidden-height="120" style="">
				<div class="m-scrollable mCustomScrollbar _mCS_6 mCS-autoHide" data-scrollbar-shown="true" data-scrollable="true" data-max-height="120" style="overflow: visible; max-height: 120px; position: relative;">
					<div class="form-group m-form__group row">
						<label class="col-lg-4 col-form-label">Status:</label>
						<div class="col-lg-8">
							<select class="form-control m-input form-control-sm" id="exampleSelect1">
							<option>Publish</option>
							<option>Draff</option>
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
		<div class="m-portlet m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_7">
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
							<a href="#" m-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" aria-describedby="tooltip_dlh4ii0y3i"><i class="la la-angle-down"></i></a>	
						<div class="m-tooltip m-tooltip--portlet tooltip bs-tooltip-top" role="tooltip" id="tooltip_dlh4ii0y3i" aria-hidden="true" x-placement="top" style="position: absolute; will-change: transform; display: none; top: 0px; left: 0px; transform: translate3d(401px, 448px, 0px);">                            <div class="tooltip-arrow arrow" style="left: 0px;"></div>                            <div class="tooltip-inner">Collapse</div>                        </div></li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body portlet-publish-body" m-hidden-height="120" style="">
				<div class="m-scrollable mCustomScrollbar _mCS_6 mCS-autoHide" data-scrollbar-shown="true" data-scrollable="true" data-max-height="120" style="overflow: visible; max-height: 120px; position: relative;">
					<div class="m-form__group form-group">
										<div class="m-checkbox-list">
											<label class="m-checkbox">
											<input type="checkbox"> Checked
											<span></span>
											</label>
											<label class="m-checkbox">
											<input type="checkbox" checked="checked"> Checked
											<span></span>
											</label>
											<label class="m-checkbox">
											<input type="checkbox"> Checked
											<span></span>
											</label>
											<label class="m-checkbox">
											<input type="checkbox" checked="checked"> Checked
											<span></span>
											</label>
											<label class="m-checkbox">
											<input type="checkbox" checked="checked"> Checked
											<span></span>
											</label>
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
		<!-- /categories portlet -->
	</div>
</form>		
@endsection
@section('custom_footer_js')
<!--begin::Page Resources --> 
    <script src="/assets/demo/default/custom/components/portlets/tools.js" type="text/javascript"></script>
    <script src="/libs/ckeditor/ckeditor.js"></script>
    <script>
    	CKEDITOR.replace('post_content',{
    		height: 500
    	});
    </script>
<!--end::Page Resources -->
@endsection