
<?php $__env->startSection('content'); ?>
  <?php (woocommerce_content()); ?>
  <?php (new \Sober\Controller\Module\Debugger(get_defined_vars(), 'hierarchy')); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>