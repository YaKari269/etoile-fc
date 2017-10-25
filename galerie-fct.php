<?php
/*
* post type Galerie
*/
add_action('init','galerie_init');
add_action('manage_edit-galerie_columns','galerie_columnfilter');
add_action('manage_posts_custom_column','galerie_column');
 

/**
* Initialisation des fonctionalités liées au galerie
**/
function galerie_init(){
	
	$labels = array(
		'name' => 'Galerie',
		'singular_name' => 'Galerie',
		'add_new' => 'Ajouter une Galerie',
		'add_new_item' => 'Ajouter un nouveau Galerie',
		'edit_item' => 'Editer une Galerie',
		'new_item' => 'Nouvelle Galerie',
		'view_item' => 'Voir la Galerie',
		'search_items' => 'Rechercher une Galerie',
		'not_found' => 'Aucune Galerie',
		'not_found_in_trash' => 'Aucune Galerie dans la corbeille',
		'parent_item_colon' => '',
		'menu_name' => 'Galerie'
	);
	
	register_post_type('galerie', array(
		'public' => true,
		'labels' => $labels,
		'menu_position' => 9,
		'capability_type' => 'post',
		'supports' => array('title','editor','thumbnail')
	));
}
function galerie_columnfilter($columns){
	$thumb = array('thumbnail' => 'Image');
	$columns = array_slice($columns, 0, 1) + $thumb + array_slice($columns,1,null);
	return $columns;
}

function galerie_column($column){
	global $post;
	if($column == 'thumbnail'){
		echo edit_post_link(get_the_post_thumbnail($post->ID,'medium'),null,null,$post->ID);
	}
}
?>