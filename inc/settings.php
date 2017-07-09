<?php
add_theme_support( 'automatic-feed-links' );
function new_excerpt_more( $more ) {
return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
function custom_excerpt_length( $length ) {
return 23;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function excerpt($limit) {
$excerpt = explode(' ', get_the_excerpt(), $limit);
if (count($excerpt)>=$limit) {
array_pop($excerpt);
$excerpt = implode(" ",$excerpt).'...';
} else {
$excerpt = implode(" ",$excerpt);
} 
$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
return $excerpt;
}
add_filter( 'mce_buttons', 'my_add_next_page_button', 1, 2 );
function my_add_next_page_button( $buttons, $id ){
if ( 'content' != $id )
return $buttons;
array_splice( $buttons, 13, 0, 'wp_page' );
return $buttons;
}
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
function load_dashicons_front_end() {
wp_enqueue_style( 'dashicons' );
}
if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
}
add_filter( 'wp_title', 'filter_wp_title' );
function filter_wp_title( $title ) {
global $page, $paged;

if ( is_feed() )
return $title;

$site_description = get_bloginfo( 'description' );

$filtered_title = $title . get_bloginfo( 'name' );
$filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' – ' . $site_description: '';
$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' – ' . sprintf( __( 'Page %s' ), max( $paged, $page ) ) : '';

return $filtered_title;
}

add_action('init','random_add_rewrite');
function random_add_rewrite() {
global $wp;
$wp->add_query_var('random');
add_rewrite_rule('random/?$', 'index.php?random=1', 'top');
}

add_action('template_redirect','random_template');
function random_template() {
if (get_query_var('random') == 1) {
$posts = get_posts('post_type=post&orderby=rand&numberposts=1');
foreach($posts as $post) {
$link = get_permalink($post);
}
wp_redirect($link,307);
exit;
}
}
function wpb_set_post_views($postID) {
$count_key = 'wpb_post_views_count';
$count = get_post_meta($postID, $count_key, true);
if($count==''){
$count = 0;
delete_post_meta($postID, $count_key);
add_post_meta($postID, $count_key, '0');
}else{
$count++;
update_post_meta($postID, $count_key, $count);
}
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
if ( !is_single() ) return;
if ( empty ( $post_id) ) {
global $post;
$post_id = $post->ID;    
}
wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
$count_key = 'wpb_post_views_count';
$count = get_post_meta($postID, $count_key, true);
if($count==''){
delete_post_meta($postID, $count_key);
add_post_meta($postID, $count_key, '0');
return "0 View";
}
return $count.' Views';
}

add_filter( 'the_content', 'prefix_insert_post_ads' );
function prefix_insert_post_ads( $content ) {
$ad_code = '<div class="ads">'.get_option( 'adssingle' ).'</div>';
if ( is_single() && ! is_admin() ) {
return prefix_insert_after_paragraph( $ad_code, 2, $content );
}
return $content;
} 
function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
$closing_p = '</p>';
$paragraphs = explode( $closing_p, $content );
foreach ($paragraphs as $index => $paragraph) {
if ( trim( $paragraph ) ) {
$paragraphs[$index] .= $closing_p;
}
if ( $paragraph_id == $index + 1 ) {
$paragraphs[$index] .= $insertion;
}
}
return implode( '', $paragraphs );
}
function get_image() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
$first_img = $matches [1] [0];

if(empty($first_img)){
$first_img = get_template_directory_uri()."/images/nothumb.png";
}
return $first_img;
}
?>