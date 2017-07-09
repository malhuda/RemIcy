<?php get_header(); ?>
<div id="konten">
<div class="badan-pos">
<div id="anime-ongoing">
<div class="textwidget">
<div class="anime-ongoing-title">
<h1><span>Anime Ongoing</span> <a class="anime-ongoing-more" href="status/currently-airing/">Ongoing List</a></h1>
<div class="anime-ongoing-konten">
<?php $ongoing = new WP_Query(array('post_type' => 'anime','orderby' => 'rand','showposts' => '4','tax_query' => array(array('taxonomy' => 'status','field'    => 'slug','terms'    => 'currently-airing',),),));if($ongoing->have_posts()) :while($ongoing->have_posts()) : $ongoing->the_post(); ?>
<div class="anime-ongoing-thumbnail">
<a href="<?php the_permalink(); ?>" class="series" data-toggle="tooltip" rel="<?php the_ID(); ?>" title="<?php the_title(); ?>"><img src="<?php if(has_post_thumbnail()){the_post_thumbnail();} ?>" alt="<?php the_title(); ?>"><span><?php the_title(); ?></span></a>
</div>
<?php endwhile; else : ?>
<center><p>Tidak ada anime ongoing yang tersedia</p></center>
<?php endif; ?>
</div>
</div>
</div>
</div>
<div id="anime-pos">
<div class="textwidget">
<div class="anime-pos-title">
<h1><span>Anime Terbaru</span> <a class="anime-pos-more" href="/?post_type=post&s=">Update List</a></h1>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<?php get_template_part('articles'); ?>
<?php endwhile; else : ?>
<center><p>Tidak ada pos yang tersedia</p></center>
<?php endif; ?>
</div>
</div>
<?php wp_pagenavi(); ?>
</div>
<div id="anime-serial">
<div class="textwidget">
<div class="anime-serial-title">
<h1><span>Serial Lainnya</span> <a class="anime-serial-more" href="/anime-list">Anime List</a></h1>
<div class="anime-serial-konten">
<?php $serial = new WP_Query(array('post_type' => 'anime','showposts' => '4','orderby' => 'rand','tax_query' => array(array('taxonomy' => 'type','field'    => 'slug','terms'    => array('tv', 'ova'),),),));if($serial->have_posts()) :while($serial->have_posts()) : $serial->the_post(); ?>
<div class="anime-serial-thumbnail">
<a href="<?php the_permalink(); ?>" class="series" data-toggle="tooltip" rel="<?php the_ID(); ?>" title="<?php the_title(); ?>"><img src="<?php if(has_post_thumbnail()){the_post_thumbnail();} ?>" alt="<?php the_title(); ?>"><span><?php the_title(); ?></span></a>
</div>
<?php endwhile; else : ?>
<center></p>Tidak ada serial anime yang tersedia</p></center>
<?php endif; ?>
</div>
</div>
</div>
</div>
<div id="anime-movie">
<div class="textwidget">
<div class="anime-movie-title">
<h1><span>Movie Anime</span> <a class="anime-movie-more" href="/movie-list">Movie List</a></h1>
<div class="anime-movie-konten">
<?php if(have_posts()) : $movie = new WP_Query(array('post_type' => 'anime','showposts' => '4','orderby' => 'rand','tax_query' => array(array('taxonomy' => 'type','field'    => 'slug','terms'    => 'movie',),),)); while($movie->have_posts()) : $movie->the_post(); ?>
<div class="anime-movie-thumbnail">
<a href="<?php the_permalink(); ?>" class="series" data-toggle="tooltip" rel="<?php the_ID(); ?>" title="<?php the_title(); ?>"><img src="<?php if(has_post_thumbnail()){the_post_thumbnail();} ?>" alt="<?php the_title(); ?>"><span><?php the_title(); ?></span></a>
</div>
<?php endwhile; else : ?>
<center><p>Tidak ada movie anime yang tersedia</p></center>
<?php endif; ?>
</div>
</div>
</div>
</div>
</div>
<?php get_sidebar(); ?>
</div>
</div>
</div>
<?php get_footer(); ?>