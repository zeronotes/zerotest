<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-lg-12">
		<!--begin::Portlet-->
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							Add new user
						</h3>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			<form method="post" class="m-form">
				<div class="m-portlet__body">	
					<div class="m-form__section m-form__section--first">
					<?php if($errors->any()): ?>
					<div class="form-group m-form__group alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Lỗi cmnr!</strong>
						<ul>
						<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><?php echo e($error); ?></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
						</ul>
					</div>
					<?php endif; ?>
						<div class="form-group m-form__group">
							<label for="example_input_full_name">Username:</label>
							<input type="text" name="username" class="form-control m-input" placeholder="Enter username">
							<span class="m-form__help">Please enter your username</span>
						</div>
						<div class="form-group m-form__group">
							<label for="example_input_full_name">Password:</label>
							<input type="password" name="password" class="form-control m-input" placeholder="Enter password">
							<span class="m-form__help">Please enter your password</span>
						</div>
						<div class="form-group m-form__group">
							<label>Email address:</label>
							<input type="email" name="email" class="form-control m-input" placeholder="Enter email">
							<span class="m-form__help">We'll never share your email with anyone else</span>
						</div>
						<div class="form-group m-form__group">
							<label for="example_input_full_name">Full Name:</label>
							<input type="text" name="name" class="form-control m-input" placeholder="Enter full name">
							<span class="m-form__help">Please enter your full name</span>
						</div>	
		            </div>
	            </div>
	            <div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions m-form__actions">
						<button type="submit" class="btn btn-primary">Submit</button>
						<button type="reset" class="btn btn-secondary">Cancel</button>
						<?php echo csrf_field(); ?>
					</div>
				</div>
			</form>
			<!--end::Form-->
		</div>
		<!--end::Portlet-->
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>