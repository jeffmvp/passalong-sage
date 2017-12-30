<?php $__env->startSection('content'); ?>
  <?php while(have_posts()): ?> <?php (the_post()); ?>
    <?php if(have_rows('flexible')): ?>
      <?php while(have_rows('flexible')): ?> <?php (the_row()); ?>
        <?php echo $__env->make('components.' . get_row_layout(), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php endwhile; ?>
    <?php endif; ?>
  <?php endwhile; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>