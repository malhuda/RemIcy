<?php get_header(); ?>
<div id="konten">
<div class="badan-pos">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="postingan-anime">
<div class="postingan-anime-title">
<h1><?php the_title(); ?></h1>
</div>
<div class="postingan-anime-author">
<p><b><i class="fa fa-user"></i> Posted by :</b> <?php the_author(); ?> | <b><i class="fa fa-calendar"></i> Release on </b> <?php the_time("j F Y") ?> at <?php the_time(); ?></p>
</div>
<div class="postingan-anime-thumbnail">
<?php if(has_post_thumbnail()){ ?>
<?php the_post_thumbnail(); ?>
<?php }else{ ?>
<img src="<?php echo get_template_directory_uri(); ?>/images/no-thumbnail.png" title="<?php the_title(); ?>" />
<?php } ?>
</div>
<?php endwhile; endif; ?>
<?php foreach((get_the_category()) as $category){ $get_info = new WP_Query("s=$category->cat_name&post_type=anime&orderby=name&order=ASC&showposts=1"); if ($get_info->have_posts()) : while ($get_info->have_posts()) : $get_info->the_post(); ?>
<?php echo get_post_meta($post->ID, "anime", true); ?>
<div class="anime-info-informasi">
<div class="anime-info-informasi-konten">
<div class="anime-info-informasi-konten-title">Informasi</div>
<div class="anime-info-informasi-konten-data"><b>Judul</b>: <?php the_title(); ?></div>
<div class="anime-info-informasi-konten-data"><?php echo get_the_term_list($post->ID, 'type', '<b>Tipe </b>: '); ?></div>
<div class="anime-info-informasi-konten-data"><?php echo get_the_term_list($post->ID, 'episode', '<b>Episode </b>: '); ?></div>
<div class="anime-info-informasi-konten-data"><?php echo get_the_term_list($post->ID, 'status', '<b>Status </b>: '); ?></div>
<div class="anime-info-informasi-konten-data"><?php echo get_the_term_list($post->ID, 'producer', '<b>Produser </b>: ', ', '); ?></div>
<div class="anime-info-informasi-konten-data"><?php echo get_the_term_list($post->ID, 'genre', '<b>Genre </b>: ', ', '); ?></div>
<div class="anime-info-informasi-konten-data"><?php echo get_the_term_list($post->ID, 'duration', '<b>Duration </b>: '); ?></div>
<div class="anime-info-informasi-konten-data"><?php echo get_the_term_list($post->ID, 'score', '<b>Skor </b>: '); ?></div>
</div>
</div>
<div class="anime-info-sinopsis">
<div class="anime-info-sinopsis-title">Sinopsis</div>
<div class="anime-info-sinopsis-konten">
<p><?php the_content(); ?></p>
</div>
</div>
<h1 class="download-title">Download <?php the_title(); ?></h1>
<?php endwhile; endif; ?>
<?php } ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="postingan-anime-download">
<?php the_content(); ?>
</div>
<?php endwhile; endif; ?>
</div>
<?php get_template_part('relatedpost'); ?>
<div class="commentarea">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php echo get_post_meta($post->ID, "embed", true); ?>
<?php comments_template(); ?>
<?php endwhile; endif; ?>
</div>

</div><?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>