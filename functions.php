<?php
ob_start();
include 'inc/widget.php';
include 'inc/settings.php';
if(function_exists('register_sidebar'))
register_sidebar(
	array(
		'name' => 'Sidebar Right',
		'before_widget' => '<div class="textwidget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	)
);
add_action('init','register_my_menus');
function register_my_menus(){
	register_nav_menus(
		array(
			'main' => __('Menu Utama'),
			'float' => __('Menu Float'),
			'secondary' => __('Menu Bawah')
		)
	);
}
add_filter('widget_tag_cloud_args','set_tag_cloud_sizes');
function set_tag_cloud_sizes($args){
	$args['smallest'] = 10;
	$args['largest'] = 10;
	return $args;
}
add_action('init', 'cptui_register_my_cpt_anime');
function cptui_register_my_cpt_anime(){
	register_post_type('anime',
		array(
			'label' => 'Anime',
			'description' => '',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'hierarchical' => false,
			'rewrite' => array(
				'slug' => 'anime',
				'with_front' => true
			),
			'query_var' => true,
			'supports' => array(
				'title',
				'editor',
				'custom-fields',
				'revisions',
				'thumbnail',
				'author',
				'post-formats',
				'categories'
			),
			'labels' => array(
				'name' => 'Anime List',
				'singular_name' => 'Anime List',
				'menu_name' => 'Anime List',
				'add_new' => 'Add anime',
				'add_new_item' => 'Add New anime',
				'edit' => 'Edit',
				'edit_item' => 'Edit anime',
				'new_item' => 'New anime',
				'view' => 'View anime',
				'view_item' => 'View anime',
				'search_items' => 'Search anime',
				'not_found' => 'No anime Found',
				'not_found_in_trash' => 'No anime Found in Trash',
				'parent' => 'Parent anime',
			),
			'public' => true,
			'has_archive' => true,
		)
	);
}
add_action('init', 'cptui_register_my_taxes_durations');
function cptui_register_my_taxes_durations(){
	register_taxonomy(
		'duration',
		array(
			0 => 'anime',
		),
		array(
			'hierarchical' => false,
			'label' => 'Duration',
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => false,
			'labels' => array(
				'search_items' => 'Total Duration',
				'popular_items' => 'Popular Duration',
				'all_items' => 'All Durations',
				'parent_item' => 'Parent Duration',
				'parent_item_colon' => 'Parent Duration:',
				'edit_item' => 'Edit Duration',
				'update_item' => 'Update Duration',
				'add_new_item' => 'Add New Duration',
				'new_item_name' => 'New Duration Name',
				'separate_items_with_commas' => '',
				'add_or_remove_items' => '',
				'choose_from_most_used' => '',
			)
		)
	); 
}
add_action('init', 'cptui_register_my_taxes_episodes');
function cptui_register_my_taxes_episodes(){
	register_taxonomy(
		'episode',
		array(
			0 => 'anime',
		),
		array(
			'hierarchical' => false,
			'label' => 'Total Episode',
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => false,
			'labels' => array(
				'search_items' => 'Total Episode',
				'popular_items' => 'Popular Episode',
				'all_items' => 'All Durations',
				'parent_item' => 'Parent Episode',
				'parent_item_colon' => 'Parent Episode:',
				'edit_item' => 'Edit Episode',
				'update_item' => 'Update Episode',
				'add_new_item' => 'Add New Episode',
				'new_item_name' => 'New Duration Name',
				'separate_items_with_commas' => '',
				'add_or_remove_items' => '',
				'choose_from_most_used' => '',
			)
		)
	); 
}
add_action('init', 'cptui_register_my_taxes_genre');
function cptui_register_my_taxes_genre(){
	register_taxonomy(
		'genre',
		array(
			0 => 'anime',
		),
		array(
			'hierarchical' => true,
			'label' => 'Genre',
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => false,
			'labels' => array(
				'search_items' => 'Genre',
				'popular_items' => 'Popular Genre',
				'all_items' => 'All Genres',
				'parent_item' => 'Parent Genre',
				'parent_item_colon' => 'Parent Genre:',
				'edit_item' => 'Edit Genre',
				'update_item' => 'Update Genre',
				'add_new_item' => 'Add New Genre',
				'new_item_name' => 'New Genre Name',
				'separate_items_with_commas' => '',
				'add_or_remove_items' => '',
				'choose_from_most_used' => '',
			)
		)
	); 
}
add_action('init', 'cptui_register_my_taxes_producer');
function cptui_register_my_taxes_producer(){
	register_taxonomy(
		'producer',
		array(
			0 => 'anime',
		),
		array(
			'hierarchical' => true,
			'label' => 'Producers',
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => false,
			'labels' => array(
				'search_items' => 'Producers',
				'popular_items' => 'Popular Producers',
				'all_items' => 'All Producers',
				'parent_item' => 'Parent Producers',
				'parent_item_colon' => 'Parent Producers:',
				'edit_item' => 'Edit Producers',
				'update_item' => 'Update Producers',
				'add_new_item' => 'Add New Producers',
				'new_item_name' => 'New Producers Name',
				'separate_items_with_commas' => '',
				'add_or_remove_items' => '',
				'choose_from_most_used' => '',
			)
		)
	); 
}
add_action('init', 'cptui_register_my_taxes_scores');
function cptui_register_my_taxes_scores(){
	register_taxonomy(
		'score',
		array(
			0 => 'anime',
		),
		array(
			'hierarchical' => false,
			'label' => 'Total Score',
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => false,
			'labels' => array(
				'search_items' => 'Total Score',
				'popular_items' => 'Popular Score',
				'all_items' => 'All Durations',
				'parent_item' => 'Parent Score',
				'parent_item_colon' => 'Parent Score:',
				'edit_item' => 'Edit Score',
				'update_item' => 'Update Score',
				'add_new_item' => 'Add New Score',
				'new_item_name' => 'New Score Name',
				'separate_items_with_commas' => '',
				'add_or_remove_items' => '',
				'choose_from_most_used' => '',
			)
		)
	); 
}
add_action('init', 'cptui_register_my_taxes_season');
function cptui_register_my_taxes_season(){
	register_taxonomy(
		'season',
		array(
			0 => 'anime',
		),
		array(
			'hierarchical' => true,
			'label' => 'Season',
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => false,
			'labels' => array(
				'search_items' => 'Season',
				'popular_items' => 'Popular Season',
				'all_items' => 'All Season',
				'parent_item' => 'Parent Season',
				'parent_item_colon' => 'Parent Season:',
				'edit_item' => 'Edit Season',
				'update_item' => 'Update Season',
				'add_new_item' => 'Add New Season',
				'new_item_name' => 'New Season Name',
				'separate_items_with_commas' => '',
				'add_or_remove_items' => '',
				'choose_from_most_used' => '',
			)
		)
	); 
}
add_action('init', 'cptui_register_my_taxes_status');
function cptui_register_my_taxes_status(){
	register_taxonomy(
		'status',
		array(
			0 => 'anime',
		),
		array(
			'hierarchical' => true,
			'label' => 'Status',
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => false,
			'labels' => array(
				'search_items' => 'Status',
				'popular_items' => 'Popular Status',
				'all_items' => 'All Status',
				'parent_item' => 'Parent Status',
				'parent_item_colon' => 'Parent Status:',
				'edit_item' => 'Edit Status',
				'update_item' => 'Update Status',
				'add_new_item' => 'Add New Status',
				'new_item_name' => 'New Status Name',
				'separate_items_with_commas' => '',
				'add_or_remove_items' => '',
				'choose_from_most_used' => '',
			)
		)
	); 
}
add_action('init', 'cptui_register_my_taxes_type');
function cptui_register_my_taxes_type(){
	register_taxonomy(
		'type',
		array(
			0 => 'anime',
		),
		array(
			'hierarchical' => true,
			'label' => 'Type',
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => false,
			'labels' => array(
				'search_items' => 'Type',
				'popular_items' => 'Popular Type',
				'all_items' => 'All Types',
				'parent_item' => 'Parent Type',
				'parent_item_colon' => 'Parent Type:',
				'edit_item' => 'Edit Type',
				'update_item' => 'Update Type',
				'add_new_item' => 'Add New Type',
				'new_item_name' => 'New Type Name',
				'separate_items_with_commas' => '',
				'add_or_remove_items' => '',
				'choose_from_most_used' => '',
			)
		)
	); 
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
?>