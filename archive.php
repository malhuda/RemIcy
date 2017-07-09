<?php get_header(); ?>
<div id="konten">
<?php if(have_posts()) : ?>
<div class="badan-pos">
<div id="anime-pos">
<div class="textwidget">
<div class="anime-pos-title">
<h1><span>Hasil Pencarian</span></h1>
<?php while(have_posts()) : the_post(); if(get_post_type(get_the_ID()) == "anime"){ ?>
<div class="anime-cari-konten">
<a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>"><?php if(has_post_thumbnail()){ the_post_thumbnail();} ?></a>
<?php echo get_post_meta($post->ID, "anime", true); ?>
<div class="anime-cari-konten-detail">
<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="anime-cari-konten-skor"><i class="fa fa-star"></i><?php echo get_the_term_list($post->ID, 'score', ''); ?></div>
<span><?php echo get_the_term_list($post->ID, 'type', '<b>Tipe </b>: '); ?></span>
<span><?php echo get_the_term_list($post->ID, 'episode', '<b>Episode </b>: '); ?></span>
<span><?php echo get_the_term_list($post->ID, 'status', '<b>Status </b>: '); ?></span>
<span><?php echo get_the_term_list($post->ID, 'producer', '<b>Produser </b>: ', ', '); ?></span>
<span><?php echo get_the_term_list($post->ID, 'genre', '<b>Genre </b>: ', ', '); ?></span>
<span><?php echo get_the_term_list($post->ID, 'duration', '<b>Duration </b>: '); ?> menit</span>
<span><?php echo get_the_term_list($post->ID, 'score', '<b>Skor </b>: '); ?></span>
<span><b>Sinopsis</b>:</span>
<span><?php the_excerpt(); ?></span>
</div>
</div>
<?php } endwhile; ?>
<?php if(get_post_type(get_the_ID()) == "post"){$searchQuery = get_search_query();if(have_posts()) : while(have_posts()) : the_post(); ?>
<?php get_template_part('articles'); ?>
<?php endwhile; else : ?>
<center><p>Tidak ada pos yang tersedia</p></center>
<?php endif; } ?>
</div>
</div>
<?php if(function_exists('wp_pagenavi')){ wp_pagenavi(); } ?> 
</div>
</div>
<?php get_sidebar(); ?>
<?php else : ?>
<?php get_template_part('no-post'); ?>
<?php endif; ?>
</div>
</div>
</div>
<?php get_footer(); ?>