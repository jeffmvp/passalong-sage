
<?php 
$args = array( 'post_type' => 'tracked-gifts', 'posts_per_page' => 999 );
$loop = new WP_Query( $args );

?>

<section class="TrackedGifts">
    <div class="Container Container--small"> 
        <div class="row">
            <div class="column column-100">
                <h2>Tracked Gift List</h2>
            </div>
        <?php while( $loop->have_posts() ): ?>
            <?php ($loop->the_post()); ?>
            <a href="<?php echo e(the_permalink()); ?>" class="column column-25">
                test
            </a>
        <?php endwhile; ?>
        <?php (wp_reset_query()); ?>
        </div>
    </div>
</section>