<?php
//~ add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
//~ function my_theme_enqueue_styles() {
    //~ wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
//~ }

function email_klml($post_ID)  {
    $title = get_the_title( $post_ID) ;
    $link = get_permalink( $post_ID ) ;
    mail('earth@klml.de', "neuer ifg post: $title ($post_ID)", "$link");
    return $post_ID;
}
add_action('publish_post', 'email_klml');
?>
