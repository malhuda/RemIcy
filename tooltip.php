<?php 
require('../../../wp-blog-header.php');
$target = $_POST["id"]; 
$id = $target;
$post = get_post($id);
setup_postdata($post); ?>
<div class="inzserjdl"><?php the_title(); ?></div>
<div class="inzser">
<?php if ( has_post_thumbnail() ) { ?><?php the_post_thumbnail(); ?><?php } else { ?><img src="<?php echo get_template_directory_uri(); ?>/images/nothumb.png" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /><?php } ?>
<div class="rapi">
<span><b>Judul</b> : <?php the_title(); ?></span>
<span><?php echo get_the_term_list($post->ID, 'producer', '<b>Produser </b>: ', ', '); ?></span>
<span><?php echo get_the_term_list($post->ID, 'type', '<b>Tipe </b>: '); ?></span>
<span><?php echo get_the_term_list($post->ID, 'episode', '<b>Episode </b>: '); ?></span>
<span><?php echo get_the_term_list($post->ID, 'status', '<b>Status </b>: '); ?></span>
<span><?php echo get_the_term_list($post->ID, 'genre', '<b>Genre </b>: ', ', '); ?></span>
<span><?php echo get_the_term_list($post->ID, 'duration', '<b>Duration </b>: '); ?></span>
<span><?php echo get_the_term_list($post->ID, 'score', '<b>Skor </b>: '); ?></span>
<div class="sinz"><?php the_excerpt(); ?></div>
</div>
</div>
<?php wp_reset_postdata(); ?>