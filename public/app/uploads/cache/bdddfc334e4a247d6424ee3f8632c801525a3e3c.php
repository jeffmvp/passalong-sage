

<?php $__env->startSection('content'); ?>
<?php while(have_posts()): ?> <?php (the_post()); ?>
<?php 
$meta = get_field('story_meta');
$addons = get_field('story_addons');
?>

<section class="TrackedGift">
    <div class="row">
      <div class="column column-50 TrackedGift-story">
        <div class="TrackedGift-container">
          <h2><?php (the_title()); ?></h2>
          <h4><?php echo e($meta); ?></h4>
          <?php (the_content()); ?>
          <img src="<?php (the_post_thumbnail_url()); ?>">
        </div>
      </div>
      <div class="column column-50 TrackedGift-addon">
        <div class="TrackedGift-container">
          <h4>Story History</h4>
          <?php $__currentLoopData = $addons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="TrackedGift-extra">
            <div class="TrackedGift-name">
              Passed Along to: <?php echo e($addon['name']); ?>

            </div>

            <div class="TrackedGift-date">
              On: <?php echo e($addon['date']); ?>

            </div>

            <div class="TrackedGift-message">
                <?php echo $addon['content']; ?>

            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <div class="TrackedGift-form">
              <?php echo do_shortcode('[contact-form-7 id="262" title="Submit a Story Addition"]'); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
    
<?php endwhile; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>