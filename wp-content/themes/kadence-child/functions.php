<?php
/**
 * Enqueue child styles.
 */
function child_enqueue_styles() {
	wp_enqueue_style( 'child-theme', get_stylesheet_directory_uri() . '/style.css', array(), 100 );
}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles' ); // Remove the // from the beginning of this line if you want the child theme style.css file to load on the front end of your site.
if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'post-thumbnails' );

add_action( 'init', 'create_genre_posttype' );
function create_genre_posttype() {

	// Раздел вопроса - genre
	register_taxonomy( 'genre', [ 'genre' ], [
		'label'                 => 'Жанр', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Жанр',
			'singular_name'     => 'Жанр',
			'search_items'      => 'Искать Жанр',
			'all_items'         => 'Все Жанры',
			'parent_item'       => 'Жанр',
			'parent_item_colon' => 'Жанр',
			'edit_item'         => 'Редактировать Жанр',
			'update_item'       => 'Обновить Жанр',
			'add_new_item'      => 'Добавить Жанр',
			'new_item_name'     => 'Новый Жанр',
			'menu_name'         => 'Жанр',
		),
		'description'           => 'Описание Жанра', // описание таксономии
		'public'                => true,
		'show_in_nav_menus'     => false, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => false, // равен аргументу show_ui
		'hierarchical'          => true,
		'rewrite'               => array('slug'=>'genre', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
	] );
	// Раздел вопроса - countries
	register_taxonomy( 'countries', [ 'countries' ], [
		'label'                 => 'Страны', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Страны',
			'singular_name'     => 'Страны',
			'search_items'      => 'Искать Страны',
			'all_items'         => 'Все Страны',
			'parent_item'       => 'Страны',
			'parent_item_colon' => 'Страны',
			'edit_item'         => 'Редактировать Страны',
			'update_item'       => 'Обновить Страны',
			'add_new_item'      => 'Добавить Страны',
			'new_item_name'     => 'Новый Страны',
			'menu_name'         => 'Страны',
		),
		'description'           => 'Описание Страны', // описание таксономии
		'public'                => true,
		'show_in_nav_menus'     => false, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => false, // равен аргументу show_ui
		'hierarchical'          => true,
		'rewrite'               => array('slug'=>'countries', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
	] );
	// Раздел вопроса - years
	register_taxonomy( 'years', [ 'years' ], [
		'label'                 => 'Год', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Год',
			'singular_name'     => 'Год',
			'search_items'      => 'Искать Год',
			'all_items'         => 'Все Годы',
			'parent_item'       => 'Год',
			'parent_item_colon' => 'Год',
			'edit_item'         => 'Редактировать Год',
			'update_item'       => 'Обновить Год',
			'add_new_item'      => 'Добавить Год',
			'new_item_name'     => 'Новый Год',
			'menu_name'         => 'Год',
		),
		'description'           => 'Описание Года', // описание таксономии
		'public'                => true,
		'show_in_nav_menus'     => false, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => false, // равен аргументу show_ui
		'hierarchical'          => true,
		'rewrite'               => array('slug'=>'years', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
	] );
	// Раздел вопроса - actor
	register_taxonomy( 'actor', [ 'actor' ], [
		'label'                 => 'Актер', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Актер',
			'singular_name'     => 'Актер',
			'search_items'      => 'Искать Актера',
			'all_items'         => 'Все Актеры',
			'parent_item'       => 'Актер',
			'parent_item_colon' => 'Актер',
			'edit_item'         => 'Редактировать Актера',
			'update_item'       => 'Обновить Актера',
			'add_new_item'      => 'Добавить Аатерв',
			'new_item_name'     => 'Новый Актер',
			'menu_name'         => 'Актер',
		),
		'description'           => 'Описание Актера', // описание таксономии
		'public'                => true,
		'show_in_nav_menus'     => false, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => false, // равен аргументу show_ui
		'hierarchical'          => true,
		'rewrite'               => array('slug'=>'actor', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
	] );

	// тип записи
	register_post_type( 'films', [
		'label'               => 'Фильмы',
		'labels'              => array(
			'name'          => 'Фильмы',
			'singular_name' => 'Фильм',
			'menu_name'     => 'Архив фильмов',
			'all_items'     => 'Все фильмы',
			'add_new'       => 'Добавить фильм',
			'add_new_item'  => 'Добавить новый фильм',
			'edit'          => 'Редактировать',
			'edit_item'     => 'Редактировать фильм',
			'new_item'      => 'Новый фильм',
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_rest'        => false,
		'rest_base'           => '',
		'show_in_menu'        => true,
		'exclude_from_search' => false,
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
		'hierarchical'        => false,
		//'rewrite'             => array( 'slug'=>'movies/%genre%', 'with_front'=>false, 'pages'=>false, 'feeds'=>false, 'feed'=>false ),
		'has_archive'         => 'movies',
		'query_var'           => true,
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'taxonomies'          => array( 'genre', 'countries','years', 'actor' ),
	] );

}


