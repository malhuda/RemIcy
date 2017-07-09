<?php 
$orig_post = $post;
global $post;
$categories = get_the_category($post->ID);
if($categories){
$category_ids = array();
foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
$args=array(
'post__not_in' => array($post->ID),
'posts_per_page'=> 5,
'caller_get_posts'=>1
);
$my_query = new wp_query($args);
if($my_query->have_posts()){
echo '<ul class="recent-post"><h3>Related Post</h3>';
while( $my_query->have_posts()){
$my_query->the_post(); ?>
<li>
<div class="recent-post-konten">
<?php if(has_post_thumbnail()){ ?>
<?php the_post_thumbnail('thumb'); ?>
<?php }else{ ?>
<img src="<?php echo get_template_directory_uri(); ?>/images/no-thumbnail.png"/>
<?php } ?>
<h2><a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<?php 
foreach((get_the_category()) as $category){ $get_info = new WP_Query("s=$category->cat_name&post_type=anime&orderby=name&order=ASC&showposts=1"); if ($get_info->have_posts()) : while ($get_info->have_posts()) : $get_info->the_post(); ?>
<?php echo get_post_meta($post->ID, "anime", true); ?>
<?php the_excerpt(); ?>
<?php endwhile; endif; ?>
<?php } ?>
</div>
</li>
<?php } echo '</ul>'; }} $post = $orig_post; wp_reset_query(); ?>