<?php
/**
 * m-tyre functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package m-tyre
 */

// Activate WordPress Maintenance Mode
function wp_maintenance_mode(){
    $bgimage = '' . get_template_directory_uri() . '/images/technik.jpg';
    if(!current_user_can('edit_themes','Сайт находится на стадии разработки', $bgimage) || !is_user_logged_in()){
        wp_die('<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset="UTF8" />
	<meta name="viewport" content="width=device-width">
    <title>Сайт находится на стадии разработки</title>
	    <style type="text/css">
	    body{
            background-image: url(' . $bgimage . ');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            max-width: none;
            box-sizing: border-box;
	    }
	    .wp-die-message{
            text-align: center;
            margin: auto!important;
            width: 100%;
            max-width: 650px;
            height: 100%;
            display: flex;
            align-content: center;
            flex-direction: column;
            justify-content: flex-end;
	    }
	        #error-page{
          margin: 0;
          height: 100vh;
          width: 100%;
          box-shadow: none;
          border: none;
          padding-bottom: 180px;
        }
        h1{
            border-bottom: none;
            font-weight: bold;
            font-size: 36px;
            line-height: 119.9%;
            text-align: center;
            color: #FFFFFF;
        }
        p{
            font-weight: 500;
            font-size: 18px;
            line-height: 119.9%;
            text-align: center;
            color: #FFFFFF;
            margin: 10px 0;
        }
        a{
            font-weight: bold;
            font-size: 24px;
            line-height: 29px;
            text-align: center;
            color: #FF3A24;
            text-decoration: none;
        }
		</style>

</head>
<body id="error-page">
    <h1>Сайт находится на стадии разработки</h1>
        <p>Вы можете связаться с нами по телефону</p>
        <a href="tel:+998 71 200–6-200">+998 71 200–6-200</a>
        <div class="block-container"></div>
        </div>
</body>
</html>');
    }
}
add_action('get_header', 'wp_maintenance_mode');

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'm_tyre_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function m_tyre_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on m-tyre, use a find and replace
		 * to change 'm-tyre' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'm-tyre', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'page-menu' => esc_html__( 'Меню страниц', 'm-tyre' ),
				'page-icon' => esc_html__( 'Меню иконок', 'm-tyre' ),
				'market-menu' => esc_html__( 'Меню магазина', 'm-tyre' ),
				'footer-menu' => esc_html__( 'Меню футер', 'm-tyre' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'm_tyre_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'm_tyre_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function m_tyre_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'm_tyre_content_width', 640 );
}
add_action( 'after_setup_theme', 'm_tyre_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function m_tyre_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'm-tyre' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'm-tyre' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
    register_sidebar(
        array(
            'name'          => esc_html__( 'Фильтр "Шины параметры"', 'm-tyre' ),
            'id'            => 'shini-param',
            'description'   => esc_html__( 'Add widgets here.', 'm-tyre' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Фильтр "Шины автомобиль"', 'm-tyre' ),
            'id'            => 'shini-avto',
            'description'   => esc_html__( 'Add widgets here.', 'm-tyre' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Фильтр "Диски параметры"', 'm-tyre' ),
            'id'            => 'diski-param',
            'description'   => esc_html__( 'Add widgets here.', 'm-tyre' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Фильтр "Диски автомобиль"', 'm-tyre' ),
            'id'            => 'diski-avto',
            'description'   => esc_html__( 'Add widgets here.', 'm-tyre' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Сайтбар категорий', 'm-tyre' ),
            'id'            => 'sidebar-category',
            'description'   => esc_html__( 'Добавте виджет', 'm-tyre' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Подписка', 'm-tyre' ),
            'id'            => 'sidebar_mailing',
            'description'   => esc_html__( 'Добавте виджет', 'm-tyre' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'm_tyre_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function m_tyre_scripts() {
    wp_enqueue_style( 'm-tyre-style', get_template_directory_uri() . '/dist/css/style.css', array(), _S_VERSION );
//    wp_enqueue_script('m-tyre-script', get_template_directory_uri() . '/dist/js/common.js');
	wp_enqueue_script( 'm-tyre-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'm_tyre_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function mytheme_add_woocommerce_support(){
    add_theme_support('woocommerce');
}
add_action('after_setup_theme','mytheme_add_woocommerce_support');
add_theme_support( 'wc-product-gallery-zoom' );
//add_theme_support( 'wc-product-gallery-lightbox' );
//add_theme_support( 'wc-product-gallery-slider');

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Параметры',
        'menu_title'	=> 'Параметры темы',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры Header',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры Footer',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры общие',
        'menu_title'	=> 'Общие',
        'parent_slug'	=> 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры Контакты',
        'menu_title'	=> 'Контакты',
        'parent_slug'	=> 'theme-general-settings',
    ));

}

add_action( 'init', 'register_post_types' );
function register_post_types(){

    register_post_type( 'main-slider', [
        'label'  => null,
        'labels' => [
            'name'               => 'Слайдер', // основное название для типа записи
            'singular_name'      => 'Слайдер', // название для одной записи этого типа
            'add_new'            => 'Добавить слайд', // для добавления новой записи
            'add_new_item'       => 'Добавление слайда', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование слайда', // для редактирования типа записи
            'new_item'           => 'Новый слайд', // текст новой записи
            'view_item'          => 'Смотреть слайд', // для просмотра записи этого типа.
            'search_items'       => 'Искать слайд', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Слайдер', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => null, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-businessman',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
    register_post_type( 'akcii', [
        'label'  => null,
        'labels' => [
            'name'               => 'Акции', // основное название для типа записи
            'singular_name'      => 'Акции', // название для одной записи этого типа
            'add_new'            => 'Добавить акцию', // для добавления новой записи
            'add_new_item'       => 'Добавление акции', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование акции', // для редактирования типа записи
            'new_item'           => 'Новая акция', // текст новой записи
            'view_item'          => 'Смотреть акцию', // для просмотра записи этого типа.
            'search_items'       => 'Искать акцию', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Акции', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => null, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-businessman',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor','thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}
add_action( 'wp_default_scripts', 'remove_jq_migrate' );
function remove_jq_migrate( $scripts ) {
    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];
        if ( $script->deps ) {
            $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
        }
    }
}


remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);
add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_price',9);
add_action('woocommerce_shop_loop_item_title','add_opisanie',11);
function add_opisanie(){
    global $product;
    $width = $product->get_attribute('shirina');
    $prof = $product->get_attribute('profil');
    $radius = $product->get_attribute('radius');
    $coef = $product->get_attribute('indeks-nagruzki');
    echo '<div class="options-item">' . $width . '/' . $prof . ' R' . $radius . ' ' . $coef . 'T</div>';
}
add_action('woocommerce_shop_loop_item_title','add_ostatok',12);
function add_ostatok(){
    $ostatoktext = get_field('nadpis_v_nalichie','options');
    $units = get_field('nadpis_sht','options');
    global $product;
    $ostatok = $product->get_stock_quantity();
    if ($ostatok > 0){
        $color = '#27AE60';
    } else {
        $color = '#FF3A24';
    }
    echo '<div class="ostatok"><span style="background-color:'. $color .';"></span>' . $ostatoktext . ' - ' . $ostatok . ' ' . $units . '</div>';
}

add_action('woocommerce_after_shop_loop_item','add_icons',11);
function add_icons(){
    echo '<div class="pluses-icons-list">';
    if (get_field('podarok', $product_id)){
        echo '<svg class="podarok" width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.15332" width="30" height="30" fill="#2D9CDB"/>
                <g clip-path="url(#clip0)">
                <path d="M22.0248 16.009H15.587V24.1533H22.0248V16.009Z" fill="white"/>
                <path d="M14.4131 16.009H7.97534V24.1533H14.4131V16.009Z" fill="white"/>
                <path d="M20.019 9.47319C20.1932 9.15415 20.2923 8.78856 20.2923 8.40019C20.2923 7.16125 19.2843 6.15332 18.0454 6.15332C17.1291 6.15332 16.1915 6.6268 15.4731 7.45238C15.2953 7.65667 15.137 7.87622 15 8.10488C14.8631 7.87622 14.7048 7.65667 14.527 7.45238C13.8086 6.6268 12.8711 6.15332 11.9547 6.15332C10.7158 6.15332 9.7078 7.16128 9.7078 8.40019C9.7078 8.78853 9.80687 9.15415 9.98104 9.47319H6.92114V14.8352H14.4131V9.47319H15.587V14.8352H23.079V9.47319H20.019ZM11.9547 9.47319C11.3631 9.47319 10.8817 8.99184 10.8817 8.40019C10.8817 7.80855 11.3631 7.32722 11.9547 7.32722C13.0199 7.32722 14.0326 8.41682 14.3273 9.47316H11.9547V9.47319ZM18.0454 9.47319H15.6728C15.9675 8.41682 16.9802 7.32726 18.0454 7.32726C18.637 7.32726 19.1184 7.80862 19.1184 8.40023C19.1184 8.99187 18.637 9.47319 18.0454 9.47319Z" fill="white"/>
                </g>
                <defs>
                <clipPath id="clip0">
                <rect width="18" height="18" fill="white" transform="translate(6 6.15332)"/>
                </clipPath>
                </defs>
               </svg>';
    };
    if (get_field('garantiya', $product_id)){
        echo '<svg class="garantiya" width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect y="0.139771" width="30" height="30" fill="#F2994A"/>
<path d="M22.4965 10.773C22.4749 10.2994 22.4749 9.84739 22.4749 9.39538C22.4749 9.02946 22.1951 8.74964 21.8292 8.74964C19.1386 8.74964 17.0938 7.97475 15.3933 6.31735C15.135 6.08058 14.7476 6.08058 14.4893 6.31735C12.7888 7.97475 10.744 8.74964 8.05341 8.74964C7.68749 8.74964 7.40767 9.02946 7.40767 9.39538C7.40767 9.84739 7.40767 10.2994 7.38615 10.773C7.30005 15.2931 7.1709 21.4922 14.7261 24.0967L14.9413 24.1398L15.1566 24.0967C22.6902 21.4922 22.5826 15.3147 22.4965 10.773ZM14.4247 17.0366C14.2956 17.1443 14.1449 17.2088 13.9727 17.2088H13.9512C13.779 17.2088 13.6068 17.1227 13.4992 16.9936L11.4974 14.7765L12.466 13.9156L14.0373 15.6591L17.5243 12.3443L18.4068 13.2913L14.4247 17.0366Z" fill="white"/>
</svg>

                ';
    };
    if (get_field('akcziya', $product_id)){
        echo '<svg class="akcziya" width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.146484" width="30" height="30" fill="#808384"/>
                <g clip-path="url(#clip0)">
                <path d="M22.8032 15.3796C22.7308 15.2314 22.7308 15.0614 22.8032 14.9133L23.4745 13.5399C23.8483 12.7752 23.5522 11.8638 22.8003 11.4649L21.45 10.7484C21.3043 10.6712 21.2044 10.5336 21.1759 10.3712L20.9118 8.86554C20.7647 8.02721 19.9893 7.46387 19.1467 7.58308L17.6331 7.79718C17.4697 7.82024 17.3082 7.76772 17.1897 7.65308L16.091 6.59024C15.4793 5.99842 14.5209 5.99839 13.9092 6.59024L12.8105 7.65318C12.692 7.76786 12.5304 7.82028 12.3671 7.79729L10.8535 7.58319C10.0106 7.4639 9.23545 8.02731 9.08839 8.86564L8.8243 10.3713C8.79579 10.5337 8.69591 10.6712 8.55026 10.7485L7.19992 11.465C6.44807 11.8639 6.15192 12.7753 6.52569 13.54L7.197 14.9134C7.26942 15.0615 7.26942 15.2315 7.197 15.3796L6.52566 16.753C6.15188 17.5177 6.44803 18.4291 7.19988 18.828L8.55023 19.5445C8.69591 19.6217 8.79579 19.7593 8.8243 19.9217L9.08839 21.4274C9.22227 22.1905 9.87666 22.7257 10.6288 22.7257C10.7028 22.7257 10.778 22.7205 10.8535 22.7098L12.3671 22.4957C12.5303 22.4725 12.692 22.5251 12.8105 22.6398L13.9092 23.7026C14.2151 23.9986 14.6075 24.1465 15.0001 24.1465C15.3925 24.1464 15.7852 23.9985 16.091 23.7026L17.1897 22.6398C17.3082 22.5251 17.4698 22.4728 17.6331 22.4957L19.1467 22.7098C19.9897 22.829 20.7647 22.2657 20.9118 21.4273L21.1759 19.9217C21.2044 19.7593 21.3043 19.6218 21.45 19.5445L22.8003 18.828C23.5522 18.4291 23.8483 17.5176 23.4745 16.7529L22.8032 15.3796ZM12.9237 10.4747C13.9732 10.4747 14.8271 11.3285 14.8271 12.378C14.8271 13.4275 13.9732 14.2813 12.9237 14.2813C11.8743 14.2813 11.0204 13.4275 11.0204 12.378C11.0204 11.3285 11.8743 10.4747 12.9237 10.4747ZM11.9413 18.9392C11.84 19.0406 11.7071 19.0913 11.5743 19.0913C11.4415 19.0913 11.3086 19.0406 11.2073 18.9392C11.0046 18.7365 11.0046 18.4078 11.2073 18.2051L18.0588 11.3536C18.2615 11.1509 18.5902 11.1509 18.7929 11.3536C18.9956 11.5563 18.9956 11.885 18.7929 12.0877L11.9413 18.9392ZM17.0764 19.8182C16.0269 19.8182 15.1731 18.9644 15.1731 17.9149C15.1731 16.8654 16.0269 16.0116 17.0764 16.0116C18.1259 16.0116 18.9797 16.8654 18.9797 17.9149C18.9797 18.9644 18.1259 19.8182 17.0764 19.8182Z" fill="white"/>
                <path d="M17.0762 17.0498C16.5992 17.0498 16.2111 17.4379 16.2111 17.9149C16.2111 18.392 16.5991 18.78 17.0762 18.78C17.5532 18.78 17.9413 18.392 17.9413 17.9149C17.9413 17.4379 17.5532 17.0498 17.0762 17.0498Z" fill="white"/>
                <path d="M12.9237 11.5129C12.4467 11.5129 12.0586 11.901 12.0586 12.3781C12.0586 12.8551 12.4467 13.2432 12.9237 13.2432C13.4007 13.2432 13.7889 12.8551 13.7889 12.3781C13.7888 11.9011 13.4007 11.5129 12.9237 11.5129Z" fill="white"/>
                </g>
                <defs>
                <clipPath id="clip0">
                <rect width="18" height="18" fill="white" transform="translate(6 6.14648)"/>
                </clipPath>
                </defs>
                </svg>
                ';
    };
    echo '</div>';

}

add_action('woocommerce_after_shop_loop_item','add_winter',20);
function add_winter(){
    global $product;
    echo '<div class="winter-icon">';
    $sezon = $product->get_attribute('sezonnost');
    if ($sezon == 'Зимняя'){
        echo '<svg class="winter" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M19.8611 11.6434L15.8597 12.7151L14.3173 11.8253V10.1557L15.8421 9.2801L19.861 10.3569C19.9417 10.3785 20.0229 10.3891 20.1034 10.3891C20.5162 10.3891 20.8939 10.1134 21.0055 9.69585C21.1392 9.19679 20.8433 8.68392 20.3443 8.55037L18.1411 7.96004L20.1721 6.79395C20.6198 6.53682 20.7747 5.96525 20.5175 5.51739C20.2595 5.06953 19.6891 4.91438 19.2412 5.17212L17.206 6.34096L17.7962 4.13697C17.9297 3.63806 17.6343 3.12509 17.135 2.99154C16.6391 2.86146 16.1241 3.15406 15.9904 3.65264L14.918 7.65418L13.3837 8.53531L11.9293 7.69436V5.92982L14.8705 2.98859C15.2356 2.62328 15.2356 2.03157 14.8705 1.66621C14.5053 1.30094 13.9137 1.30094 13.5482 1.66621L11.9293 3.28514V0.934914C11.9293 0.418574 11.5105 -0.00012207 10.9941 -0.00012207C10.4778 -0.00012207 10.0591 0.418526 10.0591 0.934914V3.27355L8.45188 1.66621C8.08662 1.30094 7.4949 1.30094 7.12954 1.66621C6.76428 2.03152 6.76428 2.62323 7.12954 2.98859L10.0591 5.91809V7.70115L8.61564 8.53389L7.08134 7.65356L6.00971 3.65268C5.87621 3.15411 5.36367 2.8607 4.86514 2.99159C4.36618 3.12514 4.07006 3.6381 4.20375 4.13701L4.7939 6.34063L2.75874 5.17212C2.31008 4.91433 1.73898 5.06915 1.48223 5.51763C1.22525 5.96558 1.38022 6.53677 1.82803 6.7939L3.85891 7.95999L1.65563 8.55032C1.15662 8.68387 0.8606 9.19675 0.994245 9.6958C1.10609 10.1134 1.48375 10.3891 1.89661 10.3891C1.97701 10.3891 2.05822 10.3785 2.13925 10.3569L6.15865 9.27967L7.68169 10.1541L7.68326 11.8253L6.14041 12.7166L2.13925 11.6434C1.64376 11.5133 1.12808 11.8063 0.994245 12.3047C0.8606 12.8035 1.15662 13.3165 1.65563 13.4494L3.85084 14.0382L1.8257 15.2072C1.37865 15.4656 1.22525 16.037 1.4838 16.4841C1.65701 16.785 1.97122 16.9516 2.29403 16.9516C2.45251 16.9516 2.61337 16.9122 2.76074 16.826L4.79613 15.6514L4.20375 17.8635C4.07006 18.3632 4.36618 18.8746 4.86514 19.0089C4.94592 19.0308 5.02709 19.0412 5.10754 19.0412C5.52021 19.0412 5.89787 18.7651 6.00971 18.3472L7.08666 14.329L8.61839 13.4453L10.0591 14.2766V16.0825L7.12954 19.0121C6.76428 19.3773 6.76428 19.9689 7.12954 20.3344C7.3122 20.517 7.55104 20.6075 7.79069 20.6075C8.02953 20.6075 8.26923 20.517 8.45188 20.3344L10.0591 18.7271V21.0649C10.0591 21.5822 10.4778 22 10.9941 22C11.5105 22 11.9293 21.5821 11.9293 21.0649V18.7154L13.5483 20.3344C13.7309 20.517 13.9697 20.6075 14.2094 20.6075C14.4491 20.6075 14.688 20.517 14.8706 20.3344C15.2357 19.969 15.2357 19.3774 14.8706 19.0121L11.9293 16.0708V14.2838L13.3823 13.4452L14.9136 14.3289L15.9906 18.3471C16.1023 18.765 16.48 19.0411 16.8926 19.0411C16.9727 19.0411 17.0541 19.0307 17.1351 19.0088C17.6344 18.8745 17.9298 18.3631 17.7963 17.8634L17.2032 15.6513L19.2394 16.8259C19.3868 16.912 19.5476 16.9515 19.7061 16.9515C20.0289 16.9515 20.3431 16.7849 20.5163 16.484C20.7748 16.0369 20.6215 15.4656 20.1744 15.2071L18.1493 14.0382L20.3444 13.4494C20.8434 13.3166 21.1393 12.8035 21.0056 12.3048C20.8727 11.8063 20.3592 11.5127 19.8611 11.6434ZM12.4472 11.8253L11 12.6611L9.55381 11.8253L9.55219 10.1526L11 9.31738L12.4472 10.1539V11.8253Z" fill="#2D9CDB"/>
</svg>
                ';
    }
    if ($sezon == 'Летняя'){
        echo '<svg class="summer" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.81441 4.51824L4.51825 3.22208C4.16075 2.86412 3.57958 2.86412 3.22208 3.22208C2.86412 3.58004 2.86412 4.16029 3.22208 4.51824L4.51825 5.81441C4.697 5.99362 4.93166 6.08299 5.16633 6.08299C5.401 6.08299 5.63566 5.99362 5.81441 5.81441C6.17237 5.45645 6.17237 4.8762 5.81441 4.51824Z" fill="#F2C94C"/>
<path d="M2.75 10.0834H0.916667C0.410667 10.0834 0 10.494 0 11C0 11.506 0.410667 11.9167 0.916667 11.9167H2.75C3.256 11.9167 3.66667 11.506 3.66667 11C3.66667 10.494 3.256 10.0834 2.75 10.0834Z" fill="#F2C94C"/>
<path d="M5.81441 16.1857C5.45691 15.8277 4.87575 15.8277 4.51825 16.1857L3.22208 17.4819C2.86412 17.8398 2.86412 18.4201 3.22208 18.778C3.40083 18.9572 3.6355 19.0466 3.87016 19.0466C4.10483 19.0466 4.3395 18.9572 4.51825 18.778L5.81441 17.4819C6.17237 17.1239 6.17237 16.5437 5.81441 16.1857Z" fill="#F2C94C"/>
<path d="M11 18.3334C10.494 18.3334 10.0834 18.744 10.0834 19.25V21.0834C10.0834 21.5894 10.494 22 11 22C11.506 22 11.9167 21.5894 11.9167 21.0834V19.25C11.9167 18.744 11.506 18.3334 11 18.3334Z" fill="#F2C94C"/>
<path d="M18.778 17.4819L17.4819 16.1857C17.1244 15.8277 16.5432 15.8277 16.1857 16.1857C15.8277 16.5437 15.8277 17.1239 16.1857 17.4819L17.4819 18.778C17.6606 18.9572 17.8953 19.0466 18.13 19.0466C18.3646 19.0466 18.5993 18.9572 18.778 18.778C19.136 18.4201 19.136 17.8398 18.778 17.4819Z" fill="#F2C94C"/>
<path d="M21.0834 10.0834H19.25C18.744 10.0834 18.3334 10.494 18.3334 11C18.3334 11.506 18.744 11.9167 19.25 11.9167H21.0834C21.5894 11.9167 22 11.506 22 11C22 10.494 21.5894 10.0834 21.0834 10.0834Z" fill="#F2C94C"/>
<path d="M18.778 3.22208C18.4205 2.86412 17.8394 2.86412 17.4819 3.22208L16.1857 4.51824C15.8277 4.8762 15.8277 5.45645 16.1857 5.81441C16.3645 5.99362 16.5991 6.08299 16.8338 6.08299C17.0685 6.08299 17.3031 5.99362 17.4819 5.81441L18.778 4.51824C19.136 4.16029 19.136 3.58004 18.778 3.22208Z" fill="#F2C94C"/>
<path d="M11 0C10.494 0 10.0834 0.410667 10.0834 0.916667V2.75C10.0834 3.256 10.494 3.66667 11 3.66667C11.506 3.66667 11.9167 3.256 11.9167 2.75V0.916667C11.9167 0.410667 11.506 0 11 0Z" fill="#F2C94C"/>
<path d="M11 5.04163C7.71463 5.04163 5.04163 7.71463 5.04163 11C5.04163 14.2853 7.71463 16.9583 11 16.9583C14.2853 16.9583 16.9583 14.2853 16.9583 11C16.9583 7.71463 14.2853 5.04163 11 5.04163Z" fill="#F2C94C"/>
</svg>


                ';
    }
    echo '</div>';
}


// add core markup to woocommerce pages
add_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper',10);

// overwrite existing output content wrapper function
function woocommerce_output_content_wrapper()
{
    echo '<div class="page-product-category block-container">';
}

add_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper_cont',12);

// overwrite existing output content wrapper function
function woocommerce_output_content_wrapper_cont()
{
    echo '<div class="page-product-category_cont">';
}

add_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end',10);

function woocommerce_output_content_wrapper_end()
{
    echo '</div><!-- Close Main -->';
}

add_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end_cont',12);

function woocommerce_output_content_wrapper_end_cont()
{
    echo '</div><!-- Close Main -->';
}

add_action('woocommerce_before_checkout_form', 'woocommerce_output_content_wrapper');
add_action('woocommerce_after_checkout_form', 'woocommerce_output_content_wrapper_end');

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_action('woocommerce_after_shop_loop', 'woocommerce_get_sidebar', 6);

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_action('woocommerce_after_main_content', 'woocommerce_get_sidebar', 11);

add_action('woocommerce_before_shop_loop', 'sidebar_container_before_loop', 5);
function sidebar_container_before_loop(){
    echo '<div class="sidebar_container_before_loop">';
    echo '<div class="sidebar_container_before_loop_cont">';
}

add_action('woocommerce_after_shop_loop', 'sidebar_container_after_loop', 5);
function sidebar_container_after_loop(){
    echo '</div>';
}

add_action('woocommerce_after_shop_loop', 'sidebar_container_after_loop_end', 8);
function sidebar_container_after_loop_end(){
    echo '</div>';
}

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_action('woocommerce_after_shop_loop', 'add_category_sidebar', 7);
function add_category_sidebar(){
    echo get_sidebar('category');
}

//add_action('woocommerce_after_main_content','add_bottom_block_about',20);
//function add_bottom_block_about(){
//
//    get_template_part('inc/viewed');
//    get_template_part('inc/about');
//}

add_action( 'woocommerce_before_shop_loop_item_title', 'bbloomer_new_badge_shop_page', 3 );

function bbloomer_new_badge_shop_page() {
    global $product;
    $newness_days = 2;
    $triger = 0;
    $NewAtr = get_field('nadpis_na_new', 'options');
    $HitAtr = get_field('nadpis_na_hit', 'options');
    $created = strtotime( $product->get_date_created() );
    if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) {
        echo '<div class="new-marker">' . $NewAtr . '</div>';
        $triger = 1;
    } else if ($product->featured='true' || $triger = 0){

        echo '<div class="hit-marker">' . $HitAtr . '</div>';
    };
}

add_action( 'template_redirect', 'truemisha_recently_viewed_product_cookie', 20 );

function truemisha_recently_viewed_product_cookie() {

    // если находимся не на странице товара, ничего не делаем
    if ( ! is_product() ) {
        return;
    }


    if ( empty( $_COOKIE[ 'woocommerce_recently_viewed_2' ] ) ) {
        $viewed_products = array();
    } else {
        $viewed_products = (array) explode( '|', $_COOKIE[ 'woocommerce_recently_viewed_2' ] );
    }

    // добавляем в массив текущий товар
    if ( ! in_array( get_the_ID(), $viewed_products ) ) {
        $viewed_products[] = get_the_ID();
    }

    // нет смысла хранить там бесконечное количество товаров
    if ( sizeof( $viewed_products ) > 5 ) {
        array_shift( $viewed_products ); // выкидываем первый элемент
    }

    // устанавливаем в куки
    wc_setcookie( 'woocommerce_recently_viewed_2', join( '|', $viewed_products ) );

}

add_shortcode( 'recently_viewed_products', 'truemisha_recently_viewed_products' );

function truemisha_recently_viewed_products() {

    if( empty( $_COOKIE[ 'woocommerce_recently_viewed_2' ] ) ) {
        $viewed_products = array();
    } else {
        $viewed_products = (array) explode( '|', $_COOKIE[ 'woocommerce_recently_viewed_2' ] );
    }

    if ( empty( $viewed_products ) ) {
        return;
    }

    // надо ведь сначала отображать последние просмотренные
    $viewed_products = array_reverse( array_map( 'absint', $viewed_products ) );

    $title = '<div class="section-title">Ранее вы смотрели</div>';

    $product_ids = join( ",", $viewed_products );

    return $title . do_shortcode( "[products ids='$product_ids']" );

}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
function jk_related_products_args( $args ) {
    $args['posts_per_page'] = 10; // количество "Похожих товаров"
    $args['columns'] = 5; // количество колонок
    return $args;
}


add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
    $tabs['Доставка'] = array(
        'title'     => __( 'Доставка', 'woocommerce' ),
        'priority'     => 21,
        'callback'     => 'woo_new_product_tab_dostavka'
    );

    $tabs['Оплата'] = array(
        'title'     => __( 'Условия оплаты', 'woocommerce' ),
        'priority'     => 22,
        'callback'     => 'woo_new_product_tab_pay'
    );
    $tabs['Гарантия'] = array(
        'title'     => __( 'Гарантия', 'woocommerce' ),
        'priority'     => 23,
        'callback'     => 'woo_new_product_tab_varanty'
    );

    return $tabs;
}
function woo_new_product_tab_dostavka() {
    get_template_part('inc/dostavka');
}
function woo_new_product_tab_pay() {
    get_template_part('inc/oplata');
}
function woo_new_product_tab_varanty() {
    echo '<h2>Гарантия</h2>';
    echo '<p>описание 2</p>';
}

add_filter( 'woocommerce_product_tabs', 'devise_woo_rename_reviews_tab', 98);
function devise_woo_rename_reviews_tab($tabs) {

    $tabs['additional_information']['title'] = 'Описание товара';

    return $tabs;
}
// Add to cart
add_filter( 'woocommerce_product_single_add_to_cart_text', 'tb_woo_custom_cart_button_text' );
add_filter( 'woocommerce_product_add_to_cart_text', 'tb_woo_custom_cart_button_text' );
function tb_woo_custom_cart_button_text() {
    return __( 'Добавить в корзину', 'woocommerce' );
}

/*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2019.03.03
 * лицензия: MIT
*/
function dimox_breadcrumbs() {

    /* === ОПЦИИ === */
    $text['home']     = 'Главная'; // текст ссылки "Главная"
    $text['category'] = '%s'; // текст для страницы рубрики
    $text['search']   = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
    $text['tag']      = 'Записи с тегом "%s"'; // текст для страницы тега
    $text['author']   = 'Статьи автора %s'; // текст для страницы автора
    $text['404']      = 'Ошибка 404'; // текст для страницы 404
    $text['page']     = 'Страница %s'; // текст 'Страница N'
    $text['cpage']    = 'Страница комментариев %s'; // текст 'Страница комментариев N'

    $wrap_before    = '<div class="breadcrumbs block-container">'; // открывающий тег обертки
    $wrap_after     = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
    $sep            = '<span class="breadcrumbs__separator"> | </span>'; // разделитель между "крошками"
    $before         = '<span class="breadcrumbs__current">'; // тег перед текущей "крошкой"
    $after          = '</span>'; // тег после текущей "крошки"

    $show_on_home   = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
    $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
    $show_current   = 1; // 1 - показывать название текущей страницы, 0 - не показывать
    $show_last_sep  = 1; // 1 - показывать последний разделитель, когда название текущей страницы не отображается, 0 - не показывать
    /* === КОНЕЦ ОПЦИЙ === */

    global $post;
    $home_url       = home_url('/');
    $link           = '<span>';
    $link          .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
    $link          .= '<meta itemprop="position" content="%3$s" />';
    $link          .= '</span>';
    $parent_id      = ( $post ) ? $post->post_parent : '';
    $home_link      = sprintf( $link, $home_url, $text['home'], 1 );

    if ( is_home() || is_front_page() ) {

        if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;

    } else {

        $position = 0;

        echo $wrap_before;

        if ( $show_home_link ) {
            $position += 1;
            echo $home_link;
        }

        if ( is_category() ) {
            $parents = get_ancestors( get_query_var('cat'), 'category' );
            foreach ( array_reverse( $parents ) as $cat ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
            }
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                $cat = get_query_var('cat');
                echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_current ) {
                    if ( $position >= 1 ) echo $sep;
                    echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
                } elseif ( $show_last_sep ) echo $sep;
            }

        } elseif ( is_search() ) {
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                if ( $show_home_link ) echo $sep;
                echo sprintf( $link, $home_url . '?s=' . get_search_query(), sprintf( $text['search'], get_search_query() ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_current ) {
                    if ( $position >= 1 ) echo $sep;
                    echo $before . sprintf( $text['search'], get_search_query() ) . $after;
                } elseif ( $show_last_sep ) echo $sep;
            }

        } elseif ( is_year() ) {
            if ( $show_home_link && $show_current ) echo $sep;
            if ( $show_current ) echo $before . get_the_time('Y') . $after;
            elseif ( $show_home_link && $show_last_sep ) echo $sep;

        } elseif ( is_month() ) {
            if ( $show_home_link ) echo $sep;
            $position += 1;
            echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
            if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_day() ) {
            if ( $show_home_link ) echo $sep;
            $position += 1;
            echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
            $position += 1;
            echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
            if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_single() && ! is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $position += 1;
                $post_type = get_post_type_object( get_post_type() );
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
                if ( $show_current ) echo $sep . $before . get_the_title() . $after;
                elseif ( $show_last_sep ) echo $sep;
            } else {
                $cat = get_the_category(); $catID = $cat[0]->cat_ID;
                $parents = get_ancestors( $catID, 'category' );
                $parents = array_reverse( $parents );
                $parents[] = $catID;
                foreach ( $parents as $cat ) {
                    $position += 1;
                    if ( $position > 1 ) echo $sep;
                    echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
                }
                if ( get_query_var( 'cpage' ) ) {
                    $position += 1;
                    echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
                    echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
                } else {
                    if ( $show_current ) echo $sep . $before . get_the_title() . $after;
                    elseif ( $show_last_sep ) echo $sep;
                }
            }

        } elseif ( is_post_type_archive() ) {
            $post_type = get_post_type_object( get_post_type() );
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . $post_type->label . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
            }

        } elseif ( is_attachment() ) {
            $parent = get_post( $parent_id );
            $cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
            $parents = get_ancestors( $catID, 'category' );
            $parents = array_reverse( $parents );
            $parents[] = $catID;
            foreach ( $parents as $cat ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
            }
            $position += 1;
            echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
            if ( $show_current ) echo $sep . $before . get_the_title() . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_page() && ! $parent_id ) {
            if ( $show_home_link && $show_current ) echo $sep;
            if ( $show_current ) echo $before . get_the_title() . $after;
            elseif ( $show_home_link && $show_last_sep ) echo $sep;

        } elseif ( is_page() && $parent_id ) {
            $parents = get_post_ancestors( get_the_ID() );
            foreach ( array_reverse( $parents ) as $pageID ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
            }
            if ( $show_current ) echo $sep . $before . get_the_title() . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_tag() ) {
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                $tagID = get_query_var( 'tag_id' );
                echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
            }

        } elseif ( is_author() ) {
            $author = get_userdata( get_query_var( 'author' ) );
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
            }

        } elseif ( is_404() ) {
            if ( $show_home_link && $show_current ) echo $sep;
            if ( $show_current ) echo $before . $text['404'] . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( has_post_format() && ! is_singular() ) {
            if ( $show_home_link && $show_current ) echo $sep;
            echo get_post_format_string( get_post_format() );
        }

        echo $wrap_after;

    }
} // end of dimox_breadcrumbs()

if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_get_items_count' ) ) {
    function yith_wcwl_get_items_count() {
        ob_start();
        ?>
        <span class="yith-wcwl-items-count">
      <i class="yith-wcwl-icon fa fa-star-o">
    <?php echo esc_html( yith_wcwl_count_all_products() ); ?>
      </i>
  </span>
        <?php
        return ob_get_clean();
    }
    add_shortcode( 'yith_wcwl_items_count', 'yith_wcwl_get_items_count' );
}

if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_ajax_update_count' ) ) {
    function yith_wcwl_ajax_update_count() {
        wp_send_json( array(
            'count' => yith_wcwl_count_all_products()
        ) );
    }
    add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
    add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
}

if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_enqueue_custom_script' ) ) {
    function yith_wcwl_enqueue_custom_script() {
        wp_add_inline_script(
            'jquery-yith-wcwl',
            "
        jQuery( function( $ ) {
          $( document ).on( 'added_to_wishlist removed_from_wishlist', function() {
            $.get( yith_wcwl_l10n.ajax_url, {
              action: 'yith_wcwl_update_wishlist_count'
            }, function( data ) {
              $('.yith-wcwl-items-count').html( data.count );
            } );
          } );
        } );
      "
        );
    }
    add_action( 'wp_enqueue_scripts', 'yith_wcwl_enqueue_custom_script', 20 );
}

remove_action('load-update-core.php', 'wp_update_plugins');
add_filter('pre_site_transient_update_plugins', create_function('$a', "return null;") );
wp_clear_scheduled_hook('wp_update_plugins');


//Для формы фильтра на главную страницу
add_action('pre_get_posts', 'search_by_cat');
function  search_by_cat() {
    global $wp_query;

    if (is_search()) {

        $diametr =  intval($_GET['radius']);
        if($diametr>0){
            $wp_query->query_vars['tax_query'][] = array( //для атрибутов товаров
                "taxonomy" => "pa_radius",
                "field" => "id",
                "terms" =>  $diametr
            );
        }

        $razmer =  intval($_GET['shirina']);
        if($razmer>0){
            $wp_query->query_vars['tax_query'][] = array(
                "taxonomy" => "pa_shirina",
                "field" => "id",
                "terms" =>  $razmer
            );
        }

        $profil =  intval($_GET['profil']);
        if($profil>0){
            $wp_query->query_vars['tax_query'][] = array(
                "taxonomy" => "pa_profil",
                "field" => "id",
                "terms" =>  $razmer
            );
        }
        $indeksnagruzki =  intval($_GET['indeks-nagruzki']);
        if($indeksnagruzki>0){
            $wp_query->query_vars['tax_query'][] = array(
                "taxonomy" => "pa_indeks-nagruzki",
                "field" => "id",
                "terms" =>  $razmer
            );
        }

        $proizvoditel =  intval($_GET['proizvoditel']);
        if($proizvoditel>0){
            $wp_query->query_vars['tax_query'][] = array(
                "taxonomy" => "pa_proizvoditel",
                "field" => "id",
                "terms" =>  $proizvoditel
            );
        }

        $sezonnost =  intval($_GET['sezonnost']);
        if($sezonnost>0){
            $wp_query->query_vars['tax_query'][] = array(
                "taxonomy" => "pa_sezonnost",
                "field" => "id",
                "terms" =>  $sezonnost
            );
        }

        $indeksskorosti =  intval($_GET['indeks-skorosti']);
        if($indeksskorosti>0){
            $wp_query->query_vars['tax_query'][] = array(
                "taxonomy" => "pa_indeks-skorosti",
                "field" => "id",
                "terms" =>  $sezonnost
            );
        }

        $shipy =  intval($_GET['shipy']);
        if($shipy>0){
            $wp_query->query_vars['tax_query'][] = array(
                "taxonomy" => "pa_shipy",
                "field" => "id",
                "terms" =>  $shipy
            );
        }



        $cat =  intval($_GET['cat']);

        if($cat<0){
            $wp_query->query_vars['product_cat'] =  '';
        }else{
            $term = get_term_by('id',$cat,'product_cat');
            $wp_query->query_vars['cat'] = '';
            $wp_query->query_vars['product_cat'] =  $term->slug;
        }
    }
}
//Для формы фильтра на главную страницу - конец