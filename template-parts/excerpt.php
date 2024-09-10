<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail();?>
    </a>

    <div class="entry-header">

        <?php the_title('<h2 class="entry-title"><a href="' 
        . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

    </div><!--/entry-header-->

    <time class="card__time" datetime="<?php the_time('Y.m.d'); ?>">
        <?php the_time('Y.m.d'); ?>
    </time>

    <div class="entry-footer">
        <span class="cat-links">カテゴリー： <?php the_category(','); ?></span>
    </div><!--.entry-footer-->

</article><!--#post-<?php the_ID(); ?> -->