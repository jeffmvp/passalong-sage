
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
        @while ( $loop->have_posts() )
            @php($loop->the_post())
            <?php
            $short = wp_trim_words(get_the_content(), 15, '…');
            ?>
            <a href="{{ the_permalink() }}" class="column column-33">
                <div class="TrackedGifts-item">
                    <div class="TrackedGifts-top" style="background-image:url(@php(the_post_thumbnail_url()))"></div>
                    <div class="TrackedGifts-bottom">
                        <h2>@php(the_title())</h2>
                        <p>{!! $short !!}</p>
                    </div>
                </div>  
            </a>
        @endwhile
        @php(wp_reset_query())
        </div>
    </div>
</section>