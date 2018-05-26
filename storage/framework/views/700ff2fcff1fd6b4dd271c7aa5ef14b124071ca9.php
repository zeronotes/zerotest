<?php $__env->startSection('title','Admin Control Panel'); ?>

<?php $__env->startSection('content'); ?>
	Dashboard
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>