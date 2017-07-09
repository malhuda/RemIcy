<div class="anime-pos-konten">
<a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>">
<?php if(has_post_thumbnail()){ ?>
<?php the_post_thumbnail('thumb', array('title' => get_the_title())); ?>
<?php }else{ ?>
<img src="<?php echo get_template_directory_uri(); ?>/images/no-thumbnail.png" title="<?php the_title(); ?>" />
<?php } ?></a>
<div class="anime-pos-konten-detail">
<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<span><b><i class="fa fa-user"></i> Posted by</b>: Admin</span>
<span><b><i class="fa fa-calendar"></i> Release on</b>: <?php the_time('j F Y'); ?></span>
<span><b><i class="fa fa-comment"></i> Comments</b>: <?php comments_number( 'No comments', '1 comments', '% comments' ); ?></span>
<span><b><i class="fa fa-archive"></i> Category</b>:
<?php foreach((get_the_category()) as $category){ echo '<a href="/anime/'.$category->slug.'">'.$category->cat_name.'</a>';} ?>
</span>
</div>
</div>