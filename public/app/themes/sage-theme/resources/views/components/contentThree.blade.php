<?php
$content = get_sub_field('content');
$contentTwo = get_sub_field('content_two');
$contentThree = get_sub_field('content_three');


?>
<section class="Content">
<div class="Container">
    <div class="row">
        <div class="column column-25">
            <?php echo $content; ?>
        </div>
        <div class="column column-50">
            <?php echo $contentTwo; ?>
        </div>
        <div class="column column-25">
            <?php echo $contentThree; ?>
        </div>
    </div>
</div>
</section>