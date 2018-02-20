@extends('admin.metronic.layouts.main')

@section('title','Admin Control Panel')

@section('content')
<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Datatable initilized from HTML table
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item">
					<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
	<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
		<i class="la la-ellipsis-h m--font-brand"></i>
	</a>
	<div class="m-dropdown__wrapper">
		<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
		<div class="m-dropdown__inner">
			<div class="m-dropdown__body">
				<div class="m-dropdown__content">
					<ul class="m-nav">
						<li class="m-nav__section m-nav__section--first">
							<span class="m-nav__section-text">Quick Actions</span>
						</li>
						<li class="m-nav__item">
							<a href="" class="m-nav__link">
							<i class="m-nav__link-icon flaticon-share"></i>
							<span class="m-nav__link-text">Create Post</span>
							</a>
						</li>
						<li class="m-nav__item">
							<a href="" class="m-nav__link">
							<i class="m-nav__link-icon flaticon-chat-1"></i>
							<span class="m-nav__link-text">Send Messages</span>
							</a>
						</li>
						<li class="m-nav__item">
							<a href="" class="m-nav__link">
							<i class="m-nav__link-icon flaticon-multimedia-2"></i>
							<span class="m-nav__link-text">Upload File</span>
							</a>
						</li>
						<li class="m-nav__section">
							<span class="m-nav__section-text">Useful Links</span>
						</li>
						<li class="m-nav__item">
							<a href="" class="m-nav__link">
							<i class="m-nav__link-icon flaticon-info"></i>
							<span class="m-nav__link-text">FAQ</span>
							</a>
						</li>
						<li class="m-nav__item">
							<a href="" class="m-nav__link">
							<i class="m-nav__link-icon flaticon-lifebuoy"></i>
							<span class="m-nav__link-text">Support</span>
							</a>
						</li>
						<li class="m-nav__separator m-nav__separator--fit m--hide">
						</li>
						<li class="m-nav__item m--hide">
							<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>				</li>
			</ul>
		</div>
	</div>
	<div class="m-portlet__body">
		<!--begin: Search Form -->
		<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
			<div class="row align-items-center">
				<div class="col-xl-8 order-2 order-xl-1">
					<div class="form-group m-form__group row align-items-center">
						<div class="col-md-4">
							<div class="m-form__group m-form__group--inline">
								<div class="m-form__label">
									<label>Status:</label>
								</div>
								<div class="m-form__control">
									<div class="btn-group bootstrap-select form-control m-bootstrap-select"><button type="button" class="btn dropdown-toggle bs-placeholder btn-default" data-toggle="dropdown" role="button" data-id="m_form_status" title="All"><span class="filter-option pull-left">All</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">All</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Pending</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Delivered</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Canceled</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="form-control m-bootstrap-select" id="m_form_status" tabindex="-98">
										<option value="">All</option>
										<option value="1">Pending</option>
										<option value="2">Delivered</option>
										<option value="3">Canceled</option>
									</select></div>
								</div>
							</div>
							<div class="d-md-none m--margin-bottom-10"></div>
						</div>
						<div class="col-md-4">
							<div class="m-form__group m-form__group--inline">
								<div class="m-form__label">
									<label class="m-label m-label--single">Type:</label>
								</div>
								<div class="m-form__control">
									<div class="btn-group bootstrap-select form-control m-bootstrap-select"><button type="button" class="btn dropdown-toggle bs-placeholder btn-default" data-toggle="dropdown" role="button" data-id="m_form_type" title="All"><span class="filter-option pull-left">All</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">All</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Online</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Retail</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Direct</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="form-control m-bootstrap-select" id="m_form_type" tabindex="-98">
										<option value="">All</option>
										<option value="1">Online</option>
										<option value="2">Retail</option>
										<option value="3">Direct</option>
									</select></div>
								</div>
							</div>
							<div class="d-md-none m--margin-bottom-10"></div>
						</div>
						<div class="col-md-4">
							<div class="m-input-icon m-input-icon--left">
								<input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
								<span class="m-input-icon__icon m-input-icon__icon--left">
									<span><i class="la la-search"></i></span>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 order-1 order-xl-2 m--align-right">
					<a href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-cart-plus"></i>
							<span>New User</span>
						</span>
					</a>
					<div class="m-separator m-separator--dashed d-xl-none"></div>
				</div>
			</div>
		</div>
		<!--end: Search Form -->

		<!--begin: Datatable -->
		<div class="m-datatable m-datatable--default m-datatable--brand m-datatable--loaded"><table class="m-datatable__table" id="html_table" width="100%" style="display: block; min-height: 300px; overflow-x: auto;">
			<thead class="m-datatable__head">
			<tr class="m-datatable__row" style="left: 0px;">
				<th title="Field #1" class="m-datatable__cell m-datatable__cell--sort" data-field="Order ID"><span style="width: 110px;">Order ID</span></th>
				<th title="Field #2" class="m-datatable__cell m-datatable__cell--sort" data-field="Owner"><span style="width: 110px;">Owner</span></th>
				<th title="Field #3" class="m-datatable__cell m-datatable__cell--sort" data-field="Contact"><span style="width: 110px;">Contact</span></th>
				<th title="Field #4" class="m-datatable__cell m-datatable__cell--sort" data-field="Car Make"><span style="width: 110px;">Car Make</span></th>
				<th title="Field #5" class="m-datatable__cell m-datatable__cell--sort" data-field="Car Model"><span style="width: 110px;">Car Model</span></th>
				<th title="Field #6" class="m-datatable__cell m-datatable__cell--sort" data-field="Color"><span style="width: 110px;">Color</span></th>
				<th title="Field #7" class="m-datatable__cell m-datatable__cell--sort" data-field="Deposit Paid"><span style="width: 110px;">Deposit Paid</span></th>
				<th title="Field #8" class="m-datatable__cell m-datatable__cell--sort" data-field="Order Date"><span style="width: 110px;">Order Date</span></th>
				<th title="Field #9" class="m-datatable__cell m-datatable__cell--sort" data-field="Status"><span style="width: 110px;">Status</span></th>
				<th title="Field #10" class="m-datatable__cell m-datatable__cell--sort" data-field="Type"><span style="width: 110px;">Type</span></th>
			</tr>
			</thead>
			<tbody class="m-datatable__body" style=""><tr data-row="0" class="m-datatable__row" style="left: 0px;"><td data-field="Order ID" class="m-datatable__cell"><span style="width: 110px;">57520-0405</span></td><td data-field="Owner" class="m-datatable__cell"><span style="width: 110px;">Sunny Garton</span></td><td data-field="Contact" class="m-datatable__cell"><span style="width: 110px;">(288) 1417941</span></td><td data-field="Car Make" class="m-datatable__cell"><span style="width: 110px;">GMC</span></td><td data-field="Car Model" class="m-datatable__cell"><span style="width: 110px;">Savana 2500</span></td><td data-field="Color" class="m-datatable__cell"><span style="width: 110px;">Yellow</span></td><td data-field="Deposit Paid" class="m-datatable__cell"><span style="width: 110px;">$99799.94</span></td><td data-field="Order Date" class="m-datatable__cell"><span style="width: 110px;">2016-03-23</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--info m-badge--wide">Info</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-primary">Retail</span></span></td></tr><tr data-row="1" class="m-datatable__row m-datatable__row--even" style="left: 0px;"><td data-field="Order ID" class="m-datatable__cell"><span style="width: 110px;">43269-858</span></td><td data-field="Owner" class="m-datatable__cell"><span style="width: 110px;">Sandor Engley</span></td><td data-field="Contact" class="m-datatable__cell"><span style="width: 110px;">(411) 8011040</span></td><td data-field="Car Make" class="m-datatable__cell"><span style="width: 110px;">Chevrolet</span></td><td data-field="Car Model" class="m-datatable__cell"><span style="width: 110px;">Avalanche</span></td><td data-field="Color" class="m-datatable__cell"><span style="width: 110px;">Fuscia</span></td><td data-field="Deposit Paid" class="m-datatable__cell"><span style="width: 110px;">$88746.22</span></td><td data-field="Order Date" class="m-datatable__cell"><span style="width: 110px;">2017-06-04</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--success m-badge--wide">Success</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></span></td></tr><tr data-row="2" class="m-datatable__row" style="left: 0px;"><td data-field="Order ID" class="m-datatable__cell"><span style="width: 110px;">68084-462</span></td><td data-field="Owner" class="m-datatable__cell"><span style="width: 110px;">Morgan Cradey</span></td><td data-field="Contact" class="m-datatable__cell"><span style="width: 110px;">(818) 9105042</span></td><td data-field="Car Make" class="m-datatable__cell"><span style="width: 110px;">Dodge</span></td><td data-field="Car Model" class="m-datatable__cell"><span style="width: 110px;">Dakota</span></td><td data-field="Color" class="m-datatable__cell"><span style="width: 110px;">Maroon</span></td><td data-field="Deposit Paid" class="m-datatable__cell"><span style="width: 110px;">$57944.55</span></td><td data-field="Order Date" class="m-datatable__cell"><span style="width: 110px;">2017-08-03</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--primary m-badge--wide">Canceled</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-primary">Retail</span></span></td></tr><tr data-row="3" class="m-datatable__row m-datatable__row--even" style="left: 0px;"><td data-field="Order ID" class="m-datatable__cell"><span style="width: 110px;">44356-0001</span></td><td data-field="Owner" class="m-datatable__cell"><span style="width: 110px;">Tedd Alton</span></td><td data-field="Contact" class="m-datatable__cell"><span style="width: 110px;">(906) 2530404</span></td><td data-field="Car Make" class="m-datatable__cell"><span style="width: 110px;">Pontiac</span></td><td data-field="Car Model" class="m-datatable__cell"><span style="width: 110px;">Grand Prix</span></td><td data-field="Color" class="m-datatable__cell"><span style="width: 110px;">Khaki</span></td><td data-field="Deposit Paid" class="m-datatable__cell"><span style="width: 110px;">$45530.20</span></td><td data-field="Order Date" class="m-datatable__cell"><span style="width: 110px;">2017-10-10</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--success m-badge--wide">Success</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">Online</span></span></td></tr><tr data-row="4" class="m-datatable__row" style="left: 0px;"><td data-field="Order ID" class="m-datatable__cell"><span style="width: 110px;">55550-031</span></td><td data-field="Owner" class="m-datatable__cell"><span style="width: 110px;">Barrie Bedow</span></td><td data-field="Contact" class="m-datatable__cell"><span style="width: 110px;">(658) 1061197</span></td><td data-field="Car Make" class="m-datatable__cell"><span style="width: 110px;">Ford</span></td><td data-field="Car Model" class="m-datatable__cell"><span style="width: 110px;">Focus</span></td><td data-field="Color" class="m-datatable__cell"><span style="width: 110px;">Goldenrod</span></td><td data-field="Deposit Paid" class="m-datatable__cell"><span style="width: 110px;">$87192.06</span></td><td data-field="Order Date" class="m-datatable__cell"><span style="width: 110px;">2016-03-08</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--brand m-badge--wide">Pending</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">Online</span></span></td></tr><tr data-row="5" class="m-datatable__row m-datatable__row--even" style="left: 0px;"><td data-field="Order ID" class="m-datatable__cell"><span style="width: 110px;">63304-963</span></td><td data-field="Owner" class="m-datatable__cell"><span style="width: 110px;">Rhoda Marunchak</span></td><td data-field="Contact" class="m-datatable__cell"><span style="width: 110px;">(677) 6736776</span></td><td data-field="Car Make" class="m-datatable__cell"><span style="width: 110px;">Mazda</span></td><td data-field="Car Model" class="m-datatable__cell"><span style="width: 110px;">MX-3</span></td><td data-field="Color" class="m-datatable__cell"><span style="width: 110px;">Maroon</span></td><td data-field="Deposit Paid" class="m-datatable__cell"><span style="width: 110px;">$41307.59</span></td><td data-field="Order Date" class="m-datatable__cell"><span style="width: 110px;">2017-09-14</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">Danger</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></span></td></tr><tr data-row="6" class="m-datatable__row" style="left: 0px;"><td data-field="Order ID" class="m-datatable__cell"><span style="width: 110px;">52685-372</span></td><td data-field="Owner" class="m-datatable__cell"><span style="width: 110px;">Andie Mitro</span></td><td data-field="Contact" class="m-datatable__cell"><span style="width: 110px;">(700) 3368557</span></td><td data-field="Car Make" class="m-datatable__cell"><span style="width: 110px;">Volkswagen</span></td><td data-field="Car Model" class="m-datatable__cell"><span style="width: 110px;">rio</span></td><td data-field="Color" class="m-datatable__cell"><span style="width: 110px;">Green</span></td><td data-field="Deposit Paid" class="m-datatable__cell"><span style="width: 110px;">$85507.97</span></td><td data-field="Order Date" class="m-datatable__cell"><span style="width: 110px;">2016-09-15</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">Danger</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">Online</span></span></td></tr><tr data-row="7" class="m-datatable__row m-datatable__row--even" style="left: 0px;"><td data-field="Order ID" class="m-datatable__cell"><span style="width: 110px;">36987-2160</span></td><td data-field="Owner" class="m-datatable__cell"><span style="width: 110px;">Amalita Bimrose</span></td><td data-field="Contact" class="m-datatable__cell"><span style="width: 110px;">(904) 5507463</span></td><td data-field="Car Make" class="m-datatable__cell"><span style="width: 110px;">BMW</span></td><td data-field="Car Model" class="m-datatable__cell"><span style="width: 110px;">Z4</span></td><td data-field="Color" class="m-datatable__cell"><span style="width: 110px;">Fuscia</span></td><td data-field="Deposit Paid" class="m-datatable__cell"><span style="width: 110px;">$37483.51</span></td><td data-field="Order Date" class="m-datatable__cell"><span style="width: 110px;">2016-09-15</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--primary m-badge--wide">Canceled</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-primary">Retail</span></span></td></tr><tr data-row="8" class="m-datatable__row" style="left: 0px;"><td data-field="Order ID" class="m-datatable__cell"><span style="width: 110px;">24451-133</span></td><td data-field="Owner" class="m-datatable__cell"><span style="width: 110px;">Karie Worham</span></td><td data-field="Contact" class="m-datatable__cell"><span style="width: 110px;">(462) 5326515</span></td><td data-field="Car Make" class="m-datatable__cell"><span style="width: 110px;">Ford</span></td><td data-field="Car Model" class="m-datatable__cell"><span style="width: 110px;">F-Series</span></td><td data-field="Color" class="m-datatable__cell"><span style="width: 110px;">Pink</span></td><td data-field="Deposit Paid" class="m-datatable__cell"><span style="width: 110px;">$85033.65</span></td><td data-field="Order Date" class="m-datatable__cell"><span style="width: 110px;">2016-07-09</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--info m-badge--wide">Info</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">Online</span></span></td></tr><tr data-row="9" class="m-datatable__row m-datatable__row--even" style="left: 0px;"><td data-field="Order ID" class="m-datatable__cell"><span style="width: 110px;">35000-861</span></td><td data-field="Owner" class="m-datatable__cell"><span style="width: 110px;">Faythe Hallede</span></td><td data-field="Contact" class="m-datatable__cell"><span style="width: 110px;">(933) 6821247</span></td><td data-field="Car Make" class="m-datatable__cell"><span style="width: 110px;">Volkswagen</span></td><td data-field="Car Model" class="m-datatable__cell"><span style="width: 110px;">Passat</span></td><td data-field="Color" class="m-datatable__cell"><span style="width: 110px;">Indigo</span></td><td data-field="Deposit Paid" class="m-datatable__cell"><span style="width: 110px;">$42290.64</span></td><td data-field="Order Date" class="m-datatable__cell"><span style="width: 110px;">2017-12-30</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--metal m-badge--wide">Delivered</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></span></td></tr></tbody>
		</table><div class="m-datatable__pager m-datatable--paging-loaded clearfix"><ul class="m-datatable__pager-nav"><li><a title="First" class="m-datatable__pager-link m-datatable__pager-link--first m-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="la la-angle-double-left"></i></a></li><li><a title="Previous" class="m-datatable__pager-link m-datatable__pager-link--prev m-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="la la-angle-left"></i></a></li><li style="display: none;"><a title="More pages" class="m-datatable__pager-link m-datatable__pager-link--more-prev" data-page="1"><i class="la la-ellipsis-h"></i></a></li><li style="display: none;"><input type="text" class="m-pager-input form-control" title="Page number"></li><li><a class="m-datatable__pager-link m-datatable__pager-link-number m-datatable__pager-link--active" data-page="1" title="1">1</a></li><li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="2" title="2">2</a></li><li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="3" title="3">3</a></li><li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="4" title="4">4</a></li><li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="5" title="5">5</a></li><li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="6" title="6">6</a></li><li><a title="More pages" class="m-datatable__pager-link m-datatable__pager-link--more-next" data-page="7"><i class="la la-ellipsis-h"></i></a></li><li><a title="Next" class="m-datatable__pager-link m-datatable__pager-link--next" data-page="2"><i class="la la-angle-right"></i></a></li><li><a title="Last" class="m-datatable__pager-link m-datatable__pager-link--last" data-page="15"><i class="la la-angle-double-right"></i></a></li></ul><div class="m-datatable__pager-info"><div class="btn-group bootstrap-select m-datatable__pager-size dropup" style="width: 70px;"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" title="Select page size" aria-expanded="false"><span class="filter-option pull-left">10</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox" style="max-height: 860.797px; overflow: hidden; min-height: 15px; position: absolute; transform: translate3d(0px, -3px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="top-start"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false" style="max-height: 846.797px; overflow-y: auto; min-height: 1px;"><li data-original-index="1" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">10</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">20</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">30</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">50</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">100</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div>
		<!-- <select class="selectpicker m-datatable__pager-size" title="Select page size" data-width="70px" data-selected="10" tabindex="-98"><option class="bs-title-option" value="">Select page size</option><option value="10">10</option><option value="20">20</option><option value="30">30</option><option value="50">50</option><option value="100">100</option>
		</select> -->
		</div>
		<span class="m-datatable__pager-detail">Displaying 1 - 10 of 143 records</span></div></div></div>
		<!--end: Datatable -->
	</div>
</div>
@endsection