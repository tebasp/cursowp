<?php

// Agregar soporte para el tema
function init_template() {
	// Agregar soporte para thumbnails y titulo en el brower tag
	add_theme_support('post-thumbnails');
	add_theme_support('title-tag');

	register_nav_menus(
		array('top_menu' => 'Menu Principal')
	);

}

add_action('after_setup_theme', 'init_template');


// Agregar Assets

function assets() {
	wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css', '', '5.0', 'all');
	wp_register_style('montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat&display=swap', '', '1.0', 'all');
	wp_enqueue_style('estilos', get_stylesheet_uri(), array('bootstrap', 'montserrat'), '1.0', 'all');

	wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js', '', '2.6.0', true);
	wp_enqueue_script('bootstraps', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js', array('jquery', 'popper'), '5.0', true);
	wp_enqueue_script('custom', get_template_directory_uri().'/assets/js/custom.js', '', '1.0', true);

	wp_localize_script('custom', 'pg', array('ajaxurl' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'assets');


// Agregar Sidebar Widgets

function sidebar() {
	register_sidebar(
		array(
			'name'          => 'Pie de pagina',
			'id'            => 'sidebar-footer',
			'description'   => 'Zona de widgets para pie de pagina',
			'before_title'  => '<p>',
			'after_title'   => '</p>',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>'
		)
	);
}

add_action('widgets_init', 'sidebar');


// Creando el custom post type Productos

function productos_type() {
	$labels = array(
		'name' => 'Productos',
		'singular_name' => 'Producto',
		'menu_name' => 'Productos',
	);

	$args = array(
		'label'         => 'Productos',
		'description'   => 'Productos de platzi',
		'labels'        => $labels,
		'show_in_menu'  => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-cart',
		'can_export'    => true,
		'public'        => true,
		'publicly_queryable' => true,
		'rewrite'       => true,
		'supports'      => array('editor', 'title', 'thumbnail', 'revisions'),
		'show_in_rest'  => true,
	);

	register_post_type('productos', $args);
}

add_action('init', 'productos_type');


// Registrar Toxomony: Categoria-Productos

function pgRegisterTax() {
	$labels = array(
		'name' => 'Categorias de Productos',
		'singular_name' => 'Categoria de Productos',
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_in_nav_menu' => true,
		'show_admin_columns' => true,
		'rewrite' => array ('slug' => 'categoria-productos')
	);

	register_taxonomy('categoria-productos', array('productos'), $args);
}

add_action('init', 'pgRegisterTax');


// Query para llamada de WP_Query con ajax - Filtro Productos
function pgFiltroProductos() {
	$args = array(
		'post_type'        => 'productos',
		'posts_per_page'   => -1,
		'order'            => 'ASC',
		'orderby'          => 'title'
	);

	if ( $_POST['categoria'] ) {
		$args['tax_query'] = array(
			'taxonomy' => 'categoria-productos',
			'field' => 'slug',
			'terms' => $_POST['categoria']
		);
	}

	$productos = new WP_Query($args);

	if ($productos->have_posts()) {
		$return = array();

		while( $productos->have_posts() ) {
			$productos->the_post();
			$return[] = array(
				'image' => get_the_post_thumbnail(get_the_ID(), 'medium'),
				'link'  => get_the_permalink(),
				'titulo'=> get_the_title(),
			);
		}

		wp_send_json($return);
	}
}

add_action('wp_ajax_nopriv_pgFiltroProductos', 'pgFiltroProductos');
add_action('wp_ajax_pgFiltroProductos', 'pgFiltroProductos');