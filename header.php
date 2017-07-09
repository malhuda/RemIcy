<?php ob_start(); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content='Index, Follow' name='robots'/>
<meta content='Admin' name='author'/>
<meta content='Download Anime Subtitle Indonesia' name='keywords'/>
<meta content='Download Anime Subtitle Indonesia' name='description'/>
<meta content='© <?php echo date("Y") ?> <?php bloginfo('name'); ?>' name='copyright'/>
<meta content='Indonesia' name='geo.placename'/>
<meta content='ID' name='language'/>
<meta content='ID' name='geo.country'/>
<meta content='All-Language' http-equiv='Content-Language'/>
<meta content='global' name='distribution'/>
<meta content='general' name='rating'/>
<meta content='global' name='target'/>
<meta content='true' name='MSSmartTagsPreventParsing'/>
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
<meta content='index, follow' name='googlebot'/>
<meta content='follow, all' name='Googlebot-Image'/>
<meta content='follow, all' name='msnbot'/>
<meta content='follow, all' name='Slurp'/>
<meta content='follow, all' name='ZyBorg'/>
<meta content='follow, all' name='Scooter'/>
<meta content='all' name='spiders'/>
<meta content='all' name='WEBCRAWLERS'/>
<meta content='noodp' name='robots'/>
<meta content='noydir' name='robots'/>
<meta content='Download Anime Subtitle Indonesia, Download Anime Batch Subtitle Indonesia , Download Anime sub indo , Download anime batch , download anime batch sub indo , download anime sub , download anime indo , animeindo , donlod anime subtitle indonesia , donlod anime sub indo , download anime batch subtitle indonesia terlengkap' name='search engines'/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css"/>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.12.0.min.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/jquery.qtip.css" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.qtip.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.qtip.js"></script>
<title><?php wp_title( '–', true, 'right' ); ?></title>
<?php wp_head(); ?>
<script type="text/javascript">
$(document).ready(function()
{
  $('.series').each(function(){

    var $this = $(this);
    var id = $this.attr('rel');

    $this.qtip({
      content:{
        text: 'Loading..',
        ajax:{
          url: '<?php echo get_template_directory_uri(); ?>/tooltip.php',
          type: 'POST', 
          loading: false,
          data: 'id=' + id
        }
      },
      show: 'mouseover',
      hide: {
        delay: 200,
        fixed: true
      },
      position: {
	target: 'mouse',
        viewport: $(window)
      }
    });
  });
});
</script>
<script type="text/javascript">
$(document).ready(function(){$(".series").each(function(){var e=$(this),t=e.attr("rel");e.qtip({content:{text:'Loading..',ajax:{url:"<?php echo get_template_directory_uri(); ?>/tooltip.php",type:"POST",loading:!1,data:"id="+t}},show:"mouseover",hide:{delay:200,fixed:!0},position:{target:"mouse",viewport:$(window)}})})});
</script>
</head>
<body <?php body_class(); ?>>
<a class="back-to-top" href="#0"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></a>
<script type="text/javascript">function myFunction(){var x = document.getElementById("menu-menu-utama");if(x.className === "menu"){x.className += " responsive";}else{x.className = "menu";}}</script> 
<script type="text/javascript">$(document).ready(function(){var offset = 220;var duration = 500;$(window).scroll(function(){if($(this).scrollTop()>100){$('.back-to-top').fadeIn("slow");}else{$('.back-to-top').fadeOut("slow");}});$('.back-to-top').click(function(event){event.preventDefault();$('html, body').animate({scrollTop: 0}, "slow");return false;})});</script>
<div class="penengah">
<div class="rekomendasi">
<h2>Rekomendasi</h2>
<?php $rekomendasi = new WP_Query("post_type=anime&orderby=rand&showposts=5"); if($rekomendasi->have_posts()) : while($rekomendasi->have_posts()) : $rekomendasi->the_post(); ?>
<a rel="<?php the_ID(); ?>" class="series" data-toggle="tooltip" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
<?php endwhile; else : ?>
<a title="Tidak ada anime yang direkomendasikan">Tidak ada anime yang direkomendasikan</a>
<?php endif; ?>
</div>
</div>
<div class="penengah">
<div id="kepala">
<div class="penengah">
<div id="judul">
<h1><a href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
<h2>Download Anime Subtitle Indonesia</h2>
</div>
<div id="menu-layang">
<?php wp_nav_menu(array('theme_location' => 'float')); ?>
</div>
</div>
</div>
<div id="menu-utama">
<div class="penengah">
<?php wp_nav_menu(array('theme_location' => 'main')); ?>
</div>
<div class="kotak-pencarian">
<form action="/" id="searchform" method="get">
<input id="tempat-input" type="text" placeholder="Cari" name="s"/>
<input type="hidden"/>
<select id="pilih" name="post_type">
<option value="anime">Anime</option>
<option value="post">Post</option>
</select>
<input type="submit" id="proses" value="Cari"/>
</form>
</div>
</div>
</div>
<div class="penengah">
<div id="genres">
<?php
$taxonomy = 'genre';
$tax_terms = get_terms($taxonomy,'number=15');
?>
<ul>
<?php
foreach ($tax_terms as $tax_term){
echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "Lihat genre %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a></li>';
}
?>
</ul>
</div>
</div>
<div id="badan">
<div id="pembungkus">
<div id="iklan-pos">
<div class="iklan-kiri">
<!-- PASANG SCRIPT IKLAN DISINI -->
</div>
<div class="iklan-kanan">
<!-- PASANG SCRIPT IKLAN DISINI -->
</div>
</div>