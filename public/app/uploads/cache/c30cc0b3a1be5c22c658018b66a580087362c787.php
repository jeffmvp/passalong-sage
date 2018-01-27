
<article <?php (post_class()); ?>>
  <header> 
    <?php (var_dump($single) ); ?>
    <h1 class="entry-title"></h1>
   
  </header>
  <div class="entry-content">
      
  </div>
  <footer>
    <?php echo wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>

  </footer>
  <?php (comments_template('/partials/comments.blade.php')); ?>
</article>
