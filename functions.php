<?php
//Ajouter menus admin
add_theme_support('nav_menus');

/*
Bootstrap 4.0.0-alpha2 nav walker extension class
=================================================
*/
class bootstrap_4_walker_nav_menu extends Walker_Nav_menu {
    
    function start_lvl( &$output, $depth ){ // ul
        $indent = str_repeat("\t",$depth); // indents the outputted HTML
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
    }
  
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ // li a span
        
    $indent = ( $depth ) ? str_repeat("\t",$depth) : '';
    
    $li_attributes = '';
        $class_names = $value = '';
    
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        
        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = ($item->current || $item->current_item_anchestor) ? 'active' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if( $depth && $args->walker->has_children ){
            $classes[] = 'dropdown-menu';
        }
        
        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr($class_names) . '"';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
        
        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';
        
        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';
        
        $attributes .= ( $args->walker->has_children ) ? ' class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link"';
        
        $item_output = $args->before;
        $item_output .= ( $depth > 0 ) ? '<a class="dropdown-item"' . $attributes . '>' : '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        $output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    
    }
    
}
//Register Navbar
register_nav_menu('main','Navigation Principale');

/**
* Créaction d'un panneau d'option pour le bandeau classement
*/
add_action('admin_menu','my_pannel');

function my_pannel(){
	add_menu_page('Classement', 'Classement', 'activate_plugins', 'my_pannel', 'render_panel', null, 8);
}

function render_panel(){
	/*if(!empty($_POST)){
		var_dump($_POST); 
	}*/
	if(isset($_POST['pannel_update'])){
		if(!wp_verify_nonce($_POST['panel_noncename'], 'my-pannel')){
			die('Clé non valide');
		}
		foreach($_POST['options'] as $name => $value){
			if(empty($value)){
				$value = " - "; 
			}
			update_option($name, $value);
		}
		?>
		<div id="message" class="updated notice is-dismissible">
			<p>Les valeurs sauvegardées avec <strong>succès</strong></p>
		</div>
		<?php
	}
	?>
		<div class="wrap theme-option-page">
			<h1>Classement</h1>
			<form action="" method="post">
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row">
								<label for="division">Division</label>
							</th>
							<td>
								<input name="options[division]" type="text" id="division" value="<?= get_option('division',''); ?>" placeholder="exemple = D3">
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="poule">Poule</label>
							</th>
							<td>
								<input name="options[poule]" type="text" id="poule" value="<?= get_option('poule',''); ?>" placeholder="exemple = B">
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="position">Position du classement</label>
							</th>
							<td>
								<input name="options[position]" type="text" id="position" value="<?= get_option('position',''); ?>" >
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="point">Nombre de point</label>
							</th>
							<td>
								<input name="options[point]" type="text" id="point" value="<?= get_option('point',''); ?>">
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="journee">Journée</label>
							</th>
							<td>
								<input name="options[journee]" type="text" id="journee" value="<?= get_option('journee',''); ?>">
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="victoire">Nombre de victoire</label>
							</th>
							<td>
								<input name="options[victoire]" type="text" id="victoire" value="<?= get_option('victoire',''); ?>">
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="egalite">Nombre de match nul</label>
							</th>
							<td>
								<input name="options[egalite]" type="text" id="egalite" value="<?= get_option('egalite',''); ?>">
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="defaite">Nombre de Défaite</label>
							</th>
							<td>
								<input name="options[defaite]" type="text" id="defaite" value="<?= get_option('defaite',''); ?>">
							</td>
						</tr>
					</tbody>
				</table>
				<input type="hidden" name="panel_noncename" value="<?= wp_create_nonce('my-pannel');?>">
				<p class="submit">
					<input type="submit" name="pannel_update" id="submit" class="button button-primary" value="Enregistrer">
				</p>
			</form>
		</div>
	<?php
}
/**
*
*  Page D'accueil Administration
*
**/
add_action('wp_dashboard_setup', 'kodex_add_dashboard_widgets');
function kodex_add_dashboard_widgets(){
	add_meta_box('kodex_dashboard_widget', 'Personalisation Accueil', 'kodex_dashboard_widget_function', 'dashboard', 'normal', 'high');
	// wp_add_dashboard_widget fait la même chose, mais ne propose pas d'option de placement
}

function kodex_dashboard_widget_function(){
	if(isset($_POST['pageaccueil_update'])){
		if(!wp_verify_nonce($_POST['pageaccueil_noncename'], 'my-pageaccueil')){
			die('Clé non valide');
		}
		foreach($_POST['options'] as $name => $value){
			if(empty($value)){
				$value = " - "; 
			}
			update_option($name, $value);
		}
		?>
		<div id="message" class="updated notice is-dismissible">
			<p>Les valeurs sauvegardées avec <strong>succès</strong></p>
		</div>
		<?php
	}
	?>
		<div class="inside">
			<form name="post" action="" method="post">
				<div id="title-wrap" class="input-text-wrap">
					<input name="options[bloc1]" type="text" id="bloc1" value="<?= get_option('bloc1',''); ?>" placeholder="Nom de la page">
				</div>
				<div id="title-wrap" class="input-text-wrap">
					<label id="title-prompt-text" for="pagename"></label>
					<input name="options[bloc2]" type="text" id="bloc2" value="<?= get_option('bloc2',''); ?>" placeholder="Nom de la page">
				</div>
				<input type="hidden" name="pageaccueil_noncename" value="<?= wp_create_nonce('my-pageaccueil');?>">
				<input type="submit" name="pageaccueil_update" id="submit" class="button button-primary" value="Enregistrer les modifications">
			</form>
		</div>
		
	<?php
}

/**
 * Register two EFC widget areas.
 *
 * @since Etoile Football Club 1.0
 */
if(function_exists('register_sidebar')){
	
register_sidebar( array(
	'name'          => __( 'Content Sidebar', 'efc' ),
	'id'            => 'sidebar-1',
	'description'   => __( 'Additional sidebar that appears on the right.', 'efc' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h1 class="widget-title">',
	'after_title'   => '</h1>',
) );
register_sidebar( array(
	'name'          => __( 'Footer Widget Area', 'efc' ),
	'id'            => 'sidebar-2',
	'description'   => __( 'Appears in the footer section of the site.', 'efc' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h1 class="widget-title">',
	'after_title'   => '</h1>',
) );
}

/*
* Post type partenaire
*/
add_action('init', 'partenaire_init');
add_action('add_meta_boxes','partenaire_metaboxes');
add_action('save_post','partenaire_savepost', 10, 2);
function partenaire_init() 
{
  $labels = array(
    'name' => 'Partenaire',
    'singular_name' => 'Partenaire',
    'add_new' => 'Ajouter un partenaire',
    'add_new_item' => 'Ajouter un nouveau partenaire',
    'edit_item' => 'Modifier un partenaire',
    'new_item' => 'Nouveau partenaire',
    'view_item' => 'Voir les informations du partenaire',
    'search_items' => 'Rechercher un partenaire',
    'not_found' =>  'Aucun partenaire trouvé',
    'not_found_in_trash' => 'Aucun partenaire dans la poubelle', 
    'parent_item_colon' => '',
    'menu_name' => 'Partenaire'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
	'publicly_queryable' => false,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post', 
    'hierarchical' => false,
    'menu_position' => 3,
    'supports' => array('title', 'editor', 'thumbnail')
  ); 
  register_post_type('partenaire',$args);
}

//Permet de gérer les metabox
function partenaire_metaboxes(){
	add_meta_box('partenaire','Lien du partenaire','partenaire_metabox','partenaire','normal','high');
}

//Metabox pour gérer le lien
function partenaire_metabox($object){
	wp_nonce_field('partenaire','partenaire_nonce');
	?>
	<div class="meta-box-item-content">
		<input type="text" name="partenaire_link" style="width:100%;" value="<?= esc_attr(get_post_meta($object->ID, 'part_link', true));?>">
	</div>
	<?php
}

//Permet la sauvegarde de la metabox
function partenaire_savepost($post_id, $post){
	//print_r($_POST); die();
	if(!isset($_POST['partenaire_link']) || !wp_verify_nonce($POST['partenaire_nonce'], 'partenaire')){
		return $post_id;
	}
	
	$type = get_post_type_object($post->post_type);
	if(!current_user_can($type->cap->edit_post)){
		return $post_id;
	}
	
	update_post_meta($post_id, 'part_link', $_POST['partenaire_link']);
}

/*
* post type Galerie
*/
include('galerie-fct.php');

/*
*Changer apparence extrait
*/
function custom_excerpt_more($more){
	return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');

// Choisir la longueur de l'extrait
function excerpt($limit) {
$excerpt = explode(' ', get_the_excerpt(), $limit);
if (count($excerpt)>=$limit) {
array_pop($excerpt);
$excerpt = implode(" ",$excerpt).'</br> En savoir plus'; } else { $excerpt = implode(" ",$excerpt); }
$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
return $excerpt;
}

//Gerer les images a la une
add_theme_support('post-thumbnails');
add_image_size('imgpre', 0, 400, true);
add_image_size('slider', 0, 500, true);
?>
