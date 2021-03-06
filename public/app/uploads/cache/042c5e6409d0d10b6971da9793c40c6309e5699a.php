<?php
$cards = get_sub_field('cards');
?>
<section class="DoubleCta">
<div class="Container Container--content">
    <div class="row">
    <?php foreach($cards as $card) : ?>
        <div class="column column-50">
            <div class="DoubleCta-card">
                <h3><?php echo $card['title']; ?></h3>
                <?php echo $card['content']; ?>
                <a class="Button" target="<?php echo $card['button']['target']; ?>" href="<?php echo $card['button']['url']; ?>"><?php echo $card['button']['title']; ?></a>
            </div>
        </div>
    <?php endforeach;?>
    </div>
</div>
</section>