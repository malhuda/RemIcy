<?php /* Template Name: Info Anime */ ?>
<?php get_header(); ?>
<div id="konten">
<div class="badan-pos">
<div id="anime-info">
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<div class="anime-info-title">
<h1><?php the_title(); ?></h1>
</div>
<?php echo get_post_meta($post->ID, "anime", true); ?>
<div class="anime-info-navigation">
<b>Navigasi</b>
<a href="#tabel" title="Tabel Anime">Tabel</a>
<a href="#sinopsis" title="Sinopsis Anime">Sinopsis</a>
<a href="#informasi" title="Informasi Anime">Informasi</a>
<a href="#download" title="Download Anime">Download</a>
</div>
<div class="anime-info-tabel">
<div id="tabel"></div>
<div class="anime-info-tabel-thumbnail"><?php if(has_post_thumbnail()){ the_post_thumbnail();} ?></div>
<div class="anime-info-tabel-statistik">
<div class="anime-info-tabel-statistik-konten anime-info-tabel-statistik-konten-skor">
<strong>Skor</strong>
<span><?php echo get_the_term_list($post->ID, 'score'); ?></span>
<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
</div>
<div class="anime-info-tabel-statistik-konten anime-info-tabel-statistik-konten-detail">
<span class="anime-info-tabel-statistik-konten-type"><?php echo get_the_term_list($post->ID, 'type'); ?></span>
<span class="anime-info-tabel-statistik-konten-type"><?php echo get_the_term_list($post->ID, 'producer', '', ', '); ?></span>
<span class="anime-info-tabel-statistik-konten-type" style="border-right: none;"><?php echo get_the_term_list($post->ID, 'episode'); ?> Episodes</span>
</div>
</div>
<div class="anime-info-deskripsi">
<p>Informasi selengkapnya mengenai <b><?php the_title(); ?></b> beserta link download dapat ditemukan dibawah ini, lebih cepat gunakan navigasi diatas</p>
</div>
<div class="anime-info-informasi">
<div id="informasi"></div>
<div class="anime-info-informasi-konten">
<div class="anime-info-informasi-konten-title">Informasi</div>
<div class="anime-info-informasi-konten-data"><b>Judul</b>: <?php the_title(); ?></div>
<div class="anime-info-informasi-konten-data"><?php echo get_the_term_list($post->ID, 'type', '<b>Tipe </b>: '); ?></div>
<div class="anime-info-informasi-konten-data"><?php echo get_the_term_list($post->ID, 'episode', '<b>Episode </b>: '); ?></div>
<div class="anime-info-informasi-konten-data"><?php echo get_the_term_list($post->ID, 'status', '<b>Status </b>: '); ?></div>
<div class="anime-info-informasi-konten-data"><?php echo get_the_term_list($post->ID, 'producer', '<b>Produser </b>: ', ', '); ?></div>
<div class="anime-info-informasi-konten-data"><?php echo get_the_term_list($post->ID, 'genre', '<b>Genre </b>: ', ', '); ?></div>
<div class="anime-info-informasi-konten-data"><?php echo get_the_term_list($post->ID, 'duration', '<b>Durasi </b>: '); ?></div>
<div class="anime-info-informasi-konten-data"><?php echo get_the_term_list($post->ID, 'score', '<b>Skor </b>: '); ?></div>
</div>
<div class="anime-info-sinopsis">
<div id="sinopsis"></div>
<div class="anime-info-sinopsis-title">Sinopsis</div>
<div class="anime-info-sinopsis-konten">
<p><?php the_content(); ?></p>
</div>
</div>
</div>
</div>
<table class="episode">
<thead>
<tr>
<th class="episode-kolom">Judul</th>
<th class="download-kolom">Download</th>
</tr>
</thead>
<tbody>
<?php endwhile; endif; ?>
<?php global $post; ?>
<?php $slug = get_post( $post->ID, "anime", true )->post_name; ?>
<?php $recent = new WP_Query("category_name=$slug&showposts=100"); if($recent->have_posts()) : while($recent->have_posts()) : $recent->the_post(); ?>
<tr>
<td class="episode-kolom">
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
</td>
<td class="download-kolom">
<a href="<?php the_permalink(); ?>"><i class="fa fa-download"></i> Download</a>
</td>
</tr>
<?php endwhile; else : ?>
<tr>
<td class="episode-kolom">
<a>Tautan download anime ini belum ada atau tersedia</a>
</td>
<td class="download-kolom">
<strike><a><i class="fa fa-download"></i> Download</a></strike>
</td>
</tr>
<?php endif; wp_reset_query(); ?>
</tbody>
</table>
</div>
</div>
<?php get_sidebar(); ?>
</div>
</div>
</div>
<?php get_footer(); ?>