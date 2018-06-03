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
						<h3 class="m-portlet__head-text">Edit user</h3>
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
						<label for="example-text-input" class="col-2 col-form-label">Username</label>
						<div class="col-10">
							<input class="form-control m-input" type="text" value="{{ $user->username }}" placeholder="Enter your username" name="username" readonly="">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-search-input" class="col-2 col-form-label">Password</label>
						<div class="col-10">
							<input class="form-control m-input" type="password" id="example-password-input" placeholder="Enter your password" name="password">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-email-input" class="col-2 col-form-label">Email</label>
						<div class="col-10">
							<input class="form-control m-input" name="email" type="email" placeholder="Enter your email" value="{{ $user->email }}" readonly="">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-url-input" class="col-2 col-form-label">Name</label>
						<div class="col-10">
							<input class="form-control m-input" value="{{ $user->name }}" type="text" name="name" placeholder="Enter your name">
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