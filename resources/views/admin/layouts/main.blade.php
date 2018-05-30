<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        
        <title>@yield('title') - Admin Control Panel</title>
        <meta name="description" content="Portlet tools examples"> 

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       
        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!--end::Web font -->

        <!--begin::Base Styles -->  
			<link href="/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
			<link href="/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
			<link rel="stylesheet" href="/assets/css/custom.css" type="text/css" />
		<!--end::Base Styles -->

        <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" /> 
    
		@yield('custom_head')
</head>
    <!-- end::Head -->

    <!-- end::Body -->
    <body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >

    	<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    
	<!-- BEGIN: Header -->
@include('admin.layouts.partials.header')
	<!-- END: Header -->		
		<!-- begin::Body -->
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
			
											<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>

<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">	
	<!-- BEGIN: Aside Menu -->
	@include('admin.layouts.partials.sidebar')
	<!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->							
		   	<div class="m-grid__item m-grid__item--fluid m-wrapper">
			    			    
<!-- BEGIN: Subheader -->

<!-- END: Subheader -->		        <div class="m-content">
		            
<!-- begin content -->
@yield('content')
<!-- end content -->
		        </div>
			    		    </div>
				
		</div>
				<!-- end:: Body -->
		
<!-- begin::Footer -->
<footer class="m-grid__item		m-footer ">
	<div class="m-container m-container--fluid m-container--full-height m-page__container">
		<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
			<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
				<span class="m-footer__copyright">
					2017 &copy; Metronic theme by <a href="https://keenthemes.com" class="m-link">Keenthemes</a>
				</span>
			</div>
			<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
				<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
					<li class="m-nav__item">
						<a href="#" class="m-nav__link">
							<span class="m-nav__link-text">About</span>
						</a>
					</li>
					<li class="m-nav__item">
						<a href="#"  class="m-nav__link">
							<span class="m-nav__link-text">Privacy</span>
						</a>
					</li>
					<li class="m-nav__item">
						<a href="#" class="m-nav__link">
							<span class="m-nav__link-text">T&C</span>
						</a>
					</li>
					<li class="m-nav__item">
						<a href="#" class="m-nav__link">
							<span class="m-nav__link-text">Purchase</span>
						</a>
					</li>
					<li class="m-nav__item m-nav__item">
						<a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
							<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
						</a>
					</li>
				</ul>
			</div>	
		</div>
	</div>
</footer>
<!-- end::Footer -->		

</div>
<!-- end:: Page -->

<!-- begin::Quick Sidebar -->

<!-- end::Quick Sidebar -->		    
	    <!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
	<i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->		    <!-- begin::Quick Nav -->

<!-- begin::Quick Nav -->	
    	<!--begin::Base Scripts -->        
    	    	<script src="/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		    	<script src="/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
				<!--end::Base Scripts -->
                    
        <!--begin::Page Resources --> 
                <script src="/assets/demo/default/custom/components/portlets/tools.js" type="text/javascript"></script>
                <!--end::Page Resources -->   
        
                @yield('custom_footer_js')
            </body>
    <!-- end::Body -->
</html>