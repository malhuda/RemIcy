<?php
/*
Template Name: Genres Anime
*/
?>
<?php get_header(); ?>
				<div id="konten">
					<div class="badan-pos">
						<div class="postingan-anime-title">
							<?php while(have_posts()) : the_post(); ?>
							<h1><?php the_title(); ?></h1>
							<?php endwhile; ?>
						</div>
						<div id="genre-list">
							<ul class="genre-list">
								<li>
<?php
//list terms in a given taxonomy
$taxonomy = 'genre';
$tax_terms = get_terms($taxonomy,'number=50');
?>
<?php
foreach ($tax_terms as $tax_term) {
echo '' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a>';
}
?>
								</li>
							</ul>
						</div>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
		<?php get_footer(); ?>