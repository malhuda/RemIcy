<?php get_header(); ?>
<div id="konten">
<center>
<h1>ERROR 404!</h1>
<div class="kotak-pencarian-404">
<form action="/" id="searchform" method="get">
<input id="tempat-input" type="text" placeholder="Cari" name="s"/>
<input type="hidden"/>
<select id="pilih" name="post_type">
<option value="anime">Anime</option>
<option value="ost">OST</option>
</select>
<input type="submit" id="proses" value="Cari"/>
</form>
</div>
<p>- OR -</p>
</center>
<div id="anime-pos">
<div class="textwidget">
<div class="anime-pos-title">
<h1><span>Anime Terbaru</span></h1>
<?php
$pos = new WP_Query("post_type=post&showposts=5");
if($pos->have_posts()) : while($pos->have_posts()) : $pos->the_post();
?>
<?php get_template_part('articles'); ?>
<?php
endwhile; endif;
?>
</div>
</div>
</div>
</div>
</div>
</div>
<?php get_footer(); ?>