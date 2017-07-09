<?php 
function pagenavi($before = '', $after = '', $prelabel = '', $nxtlabel = '', $pages_to_show = 10, $always_show = false){
global $request, $posts_per_page, $wpdb, $paged;
if(empty($prelabel)) {
$prelabel  = '<strong>Prev</strong>';
}
if(empty($nxtlabel)) {
$nxtlabel = '<strong>Next</strong>';
}
$half_pages_to_show = round($pages_to_show/2);
if (!is_single()) {
if(!is_category()) {
preg_match('#FROM\s(.*)\sORDER BY#siU', $request, $matches);		
} else {
preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);		
}
$fromwhere = $matches[1];
$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");
$max_page = ceil($numposts /$posts_per_page);
if(empty($paged)) {
$paged = 1;
}
if($max_page > 1 || $always_show) {
echo "$before <div class='page'><span class='right'>Pages $paged of $max_page</span><span class='left'>";
if ($paged >= ($pages_to_show-1)) {
echo '<a href="'.get_pagenum_link().'">&laquo; First</a>  ';
}
previous_posts_link($prelabel);
for($i = $paged - $half_pages_to_show; $i  <= $paged + $half_pages_to_show; $i++) {
if ($i >= 1 && $i <= $max_page) {
if($i == $paged) {
echo "<strong class='now'>$i</strong>";
} else {
echo ' <a href="'.get_pagenum_link($i).'">'.$i.'</a> ';
}
}
}
next_posts_link($nxtlabel, $max_page);
if (($paged+$half_pages_to_show) < ($max_page)) {
echo '  <a href="'.get_pagenum_link($max_page).'">Last &raquo;</a>';
}
echo "</span></div> $after";
}
}
}
?>