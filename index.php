<?php
/**
 * Main template file
 *
 */

// Get customized config
$ifgConfig = yaml_parse_file( realpath(dirname(__FILE__)  )  . DIRECTORY_SEPARATOR . 'ifg-config.yml' );

get_header(); ?>

    <div id="content" role="main" >

    <div class="entry-content">
        <?php
        // the loop.
        while ( have_posts() ) : the_post();

            // Include the page content template.
            get_template_part( 'content', 'page' );

            if ( !is_page() ) :
                echo $ifgConfig['kategorienText'] ;
                the_category( ', '); 
                echo $ifgConfig['tagsText'] ;
                the_tags( '', ', ' ); 
            endif ;
 
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        // End the loop.
        endwhile;

        if ( have_posts() && !is_page() ) :
        ?>
        <br class="cb" />
        <div class="nav-next left"><?php previous_posts_link( 'Jüngere Beiträge' ); ?></div>
        <div class="nav-previous right"><?php next_posts_link( 'Ältere Beiträge' ); ?></div>
        <?php
        endif;
        ?>

    </div><!-- .entry-content -->

    <?php edit_post_link( __( 'Edit' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>


<p prefix="dct: http://purl.org/dc/terms/ cc: http://creativecommons.org/ns#" class="cc-block cb"><a rel="license" href="https://creativecommons.org/licenses/by-sa/4.0/"><?php echo $ifgConfig['creativecommonsText'] ; ?></p>
                        


        </div><!-- #content -->
        <div id="sidebar">
            <h2>Aktuelle Meldungen</h2>
            <ul id="recent-posts">
            <?php
                $args = array( 'numberposts' => '5' );
                $recent_posts = wp_get_recent_posts( $args );
                foreach( $recent_posts as $recent ){
                    echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
                }
            ?>
            </ul>
            
            
            <p class="leftblue">
                <a href="/blog/" class="allposts" >Alle Meldungen</a>
                <a href="/feed/" class="rss">rss</a>
            </p>

            <p class="leftblue">
                <a href="https://twitter.com/ifg_bayern" class="twitter" >twitter.com/ifg_bayern</a>
            </p>

            <div class="karte_broch">
                <a href="/ubersicht/"><img src="/wp-content/uploads/2012/10/karteklein.png" alt="Bayerische Informationsfreiheits-Landkarte" title="Bayerische Informationsfreiheits-Landkarte" /></a>
                <a href="/broschure/"><img src="/wp-content/uploads/2012/07/Informationsbroschue_Buendnisses-e1343769849208.png" alt="Informationsbroschüre" title="Informationsbroschüre" /></a>
            </div>

            
            <?php get_search_form(); ?>
        </div>
        <div class="cb"></div>
<?php get_footer(); ?>
