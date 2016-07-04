<?php
/**
 * The default template for displaying content
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <?php
            if ( is_single() || is_page() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
            endif;
        ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
            if ( !is_page() ) :
            ?>
                <p>Publiziert am <?php the_date(); ?> von <?php the_author(); the_date(); ?></p>
        <?php
            endif;
        ?>
        <?php
            /* translators: %s: Name of current post */
            the_content( );
        ?>

    </div><!-- .entry-content -->
</article><!-- #post-## -->
