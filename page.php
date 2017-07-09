<?php get_header(); ?>
<div id="konten">
<div class="badan-pos">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="postingan-halaman">
<div class="postingan-halaman-title">
<h1><?php the_title(); ?></h1>
</div>
<div class="postingan-halaman-thumbnail"><?php if(has_post_thumbnail()){ the_post_thumbnail();} ?></div>
<div class="postingan-halaman-teks">
<?php the_content(); ?>
</div>
</div>
<?php endwhile; endif; ?>
</div>
<?php get_sidebar(); ?>
</div>
</div>
</div>
<?php get_footer(); ?>