

<?php $__env->startSection('content'); ?>
<div class="Container Container--small">
<div class="row">
  <div class="column column-100">


  <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php if(!have_posts()): ?>
    <div class="alert alert-warning">
      <?php echo e(__('Sorry, but the page you were trying to view does not exist.', 'sage')); ?>

    </div>
    <br/>
    <button onclick="goBack()">Go Back</button>

    <script>
    function goBack() {
        window.history.back();
    }
    </script>
  <?php endif; ?>
<?php $__env->stopSection(); ?>
</div>
</div>
</div>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>