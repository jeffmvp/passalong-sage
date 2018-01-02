<?php
$heading = get_sub_field('heading');
$subheading = get_sub_field('subheading');
$content = get_sub_field('content');
$members = get_sub_field('members');

?>
<section class="Team">
    <div class="Container">
        <div class="row row-wrap">
            <div class="column column-25">
                <div class="Team-card Team-card--intro">
                    <h3><?php echo e($heading); ?></h3>
                    <h6><?php echo e($subheading); ?></h6>
                    <p><?php echo e($content); ?></p>
                </div>
            </div>
            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="column column-25">
                <div class="Team-card" style="background-image:url(<?php echo e($member['picture']); ?>);">
                    <h3><?php echo e($member['name']); ?></h3>
                    <h5><?php echo e($member['title']); ?></h5>
                </div>
               
            </div>
            
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>