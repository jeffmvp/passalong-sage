<?php
$content = get_sub_field('content');
$contentCol = get_sub_field('two_columns');
$contentTwo = get_sub_field('content_two');

if ($contentCol != true) {
    $contentClass = 'Container--small';
}
else {
    $contentClass = '';
}

?>
<section class="Content">
<div class="Container <?php echo $contentClass; ?>">
    <div class="row">
    <?php if ($contentCol == false) : ?>
        <div class="column">
            <?php echo $content; ?>
        </div>
    <?php else : ?>
        <div class="column column-66">
            <?php echo $content; ?>
        </div>
        <div class="column column-33">
            <?php echo $contentTwo; ?>
        </div>
    <?php endif; ?>
    </div>
</div>
</section>