<?php
/**
* Чистый Шаблон для разработки
* Функции шаблона
* @package WordPress
* @subpackage clean
*/
register_nav_menus( array(
	'top' => 'Верхнее меню',
    'bottom1' => 'Нижне меню 1-ша колонка',
    'bottom2' => 'Нижне меню 2-га колонка',
    'bottom3' => 'Нижне меню 3-я колонка',
) );

add_filter('use_block_editor_for_post', '__return_false', 10);

add_action( 'wp_enqueue_scripts', 'enqueue_file' );
function enqueue_file() {
	// css
	wp_enqueue_style( 'slick_css', get_template_directory_uri() . '/css/slick.css','', null );
    wp_enqueue_style( 'rSlider_css', get_template_directory_uri() . '/css/rSlider.min.css','', null );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/css/main.css','', null );
	// js
	// wp_enqueue_script( 'jquery_js', get_stylesheet_directory_uri() . '/js/jquery-3.7.0.min.js','','',true);
	wp_enqueue_script( 'slick_js', get_stylesheet_directory_uri() . '/js/slick.min.js', array( 'jquery' ),'',true);
    wp_enqueue_script( 'datepicker', get_stylesheet_directory_uri() . '/js/jquery-ui-datepicker.min.js','','',true);
    wp_enqueue_script( 'arrive', get_stylesheet_directory_uri() . '/js/arrive.min.js','','',true);
	wp_enqueue_script( 'main_js', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ),'',true);
    wp_enqueue_script( 'rSlider_js', get_stylesheet_directory_uri() . '/js/rSlider.min.js','','',true);
    wp_enqueue_script( 'booking_js', get_stylesheet_directory_uri() . '/js/booking.js', array( 'jquery' ),'',true);
    // js data
    wp_localize_script('booking_js', 'booking_js_data', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        'ajax_nonce' => wp_create_nonce(),
    ]);
}

function print_svg($file){
    if($file) {
        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );  

        echo file_get_contents($file, false, stream_context_create($arrContextOptions));
    }
}

function create_location_category(){
    register_taxonomy(
        'locations',
        'location',
        array(
            'labels' => array(
                'name'              => 'Локації',
                'singular_name'     => 'Локації',
                'search_items'      => 'Пошук локацій',
                'all_items'         => 'Всі локації',
                'edit_item'         => 'Редагувати локацію',
                'update_item'       => 'Оновити локацію',
                'add_new_item'      => 'Додати нову локацію',
                'new_item_name'     => 'Назва локації',
                'menu_name'         => 'Локації',
            ),
            'hierarchical' => true,
            'sort' => true,
            'args' => array('orderby' => 'term_order'),
            'show_admin_column' => true
        )
    );
}
add_action('init', 'create_location_category');

function create_location_tags(){
    register_taxonomy(
        'locations_tags',
        'location_tag',
        array(
            'labels' => array(
                'name'              => 'Теги',
                'singular_name'     => 'Теги',
                'search_items'      => 'Пошук тегів',
                'all_items'         => 'Всі теги',
                'edit_item'         => 'Редагувати тег',
                'update_item'       => 'Оновити тег',
                'add_new_item'      => 'Додати новий тег',
                'new_item_name'     => 'Назва тега',
                'menu_name'         => 'Теги',
            ),
            'hierarchical' => false,
            'sort' => true,
            'args' => array('orderby' => 'term_order'),
            'show_admin_column' => true
        )
    );
}
add_action('init', 'create_location_tags');

function create_custom_post_type_location() {
    $labels = array(
        'name' => 'Сторінка для локації',
        'singular_name' => 'Сторінка для локації',
        'menu_name' => 'Сторінки для локацій',
        'all_items' => 'Усі сторінки для локацій',
        'add_new' => 'Додати нову сторінку для локації',
        'add_new_item' => 'Додати нову сторінку для локації',
        'edit_item' => 'Редагувати сторінку для локації',
        'new_item' => 'Нова сторінка для локації',
        'view_item' => 'Переглянути сторінки для локації',
        'search_items' => 'Шукати сторінки для локацій',
        'not_found' => 'Сторінки для локації не знайдено',
        'not_found_in_trash' => 'Сторінки для локації в кошику не знайдені'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => ''),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => true,
        'menu_position' => null,
        'taxonomies' => array('locations', 'locations_tags'),
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')
    );
    register_post_type('location', $args);
}
add_action('init', 'create_custom_post_type_location');

function create_custom_post_type_game() {
    $labels = array(
        'name' => 'Ігри',
        'singular_name' => 'Гра',
        'menu_name' => 'Ігри',
        'all_items' => 'Усі ігри',
        'add_new' => 'Додати гру',
        'add_new_item' => 'Додати нову гру',
        'edit_item' => 'Редагувати гру',
        'new_item' => 'Нова гра',
        'view_item' => 'Переглянути гру',
        'search_items' => 'Шукати гру',
        'not_found' => 'Ігри не знайдені',
        'not_found_in_trash' => 'Ігри в кошику не знайдені'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => ''),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => true,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')
    );
    register_post_type('game', $args);
}
add_action('init', 'create_custom_post_type_game');

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Загальні налаштування ',
		'menu_title'	=> 'Налаштування теми',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


function my_acf_render_field( $field ) {
    $choices = get_field('tegssetting', 'option');
    if( is_array($choices) ) {
      $field['choices'] = array();
      foreach( $choices as $key => $choice ) {
        $field['choices']['key'. $key] = $choice['teg'];
      }
    }
  
    return $field;
}
add_action('acf/load_field/name=tegsglobal', 'my_acf_render_field');
  
// function my_acf_init() {
//     acf_update_setting('google_api_key', 'AIzaSyB1ojkHpnc5xph1MNAW8qBv1mqTEHBb_ZA');
// }
// add_action('acf/init', 'my_acf_init');

add_theme_support('post-thumbnails'); // Включаем поддержку миниатюр
add_image_size( '660-660', 660, 660, false);
add_image_size( '500-500', 500, 500, false);
add_image_size( '300-300', 300, 300, false);
add_image_size( '300', 300);
add_image_size( '250-250', 250, 250, false);
add_image_size( '125-125', 125, 125, false);
add_image_size( '50-50', 50, 50, false);

// Add custom language WPML switcher to top menu
function addLangSwitcherToMenu ($items, $args) {
    $languages = apply_filters('wpml_active_languages', NULL, array('skip_missing' => 1, 'orderby=id&order=desc'));
    $lang_switcher = '';
    
    if (!empty($languages) && count($languages) > 1) {
        $active_lang = '<div class="lang_switcher-active_lang">';
        $other_langs = '<div class="lang_switcher-other_langs">';
        
        foreach ($languages as $language) {
            if ($language['active']) {
                $active_lang .= '<span class="lang_switcher-lang_title">' . $language['native_name'] . '</span>';
            }
            else {
                $other_langs .= 
                    '<div class="lang_switcher-other_langs-lang_item">
                        <a class="lang_switcher-lang_link" href="' . esc_url($language['url']) . '">' . 
                            $language['native_name'] . '
                        </a>
                    </div>';
            }
        }

        $active_lang .= '</div>';
        $other_langs .= '</div>';
        $lang_switcher .= '<div class="lang_switcher">' . $active_lang . $other_langs . '</div>';
    }

    if ($args->theme_location == 'top' && get_post_type() == 'location' && !get_field('show_menu')) {
        $items = $lang_switcher;
    }
    elseif ($args->theme_location == 'top') {
        $items .= $lang_switcher;
    }
    
    return $items;
}
add_filter('wp_nav_menu_items', 'addLangSwitcherToMenu', 10, 2);

// Add AJAX handlers for Booking block
add_action('wp_ajax_booking_open_game', 'bookingOpenGame');
add_action('wp_ajax_nopriv_booking_open_game', 'bookingOpenGame');

function bookingOpenGame() {
    if (!wp_verify_nonce($_POST['_wpnonce'])) {
        die;
    }

    $result = [];

    ob_start();
    get_template_part('template-parts/single', 'booking_game', ['game_id' => $_POST['gameId']]);
    $result['game_item_tmp'] = ob_get_contents();
    ob_get_clean();
    get_template_part('template-parts/single', 'booking_time_slots', ['time_slots' => getTimeSlotsByDateFromApi()]);
    $result['time_slots_tmp'] = ob_get_contents();
    ob_get_clean();
    
    return wp_send_json_success($result);
}

add_action('wp_ajax_booking_all_games', 'bookingAllGames');
add_action('wp_ajax_nopriv_booking_all_games', 'bookingAllGames');

function bookingAllGames() {
    if (!wp_verify_nonce($_POST['_wpnonce'])) {
        die;
    }

    $test_games_ids = getLocationGamesFromApi();
    get_template_part('template-parts/single', 'booking_games_list', ['test_games_ids' => $test_games_ids]);
    die;
}

function decode_field($value, $entry, $field, $input_id) {
    $value = 'game1';
    return $value;
}

function getLocationGamesFromApi() {
    return [360, 300, 316, 326, 416];
}

add_action('wp_ajax_booking_get_time_slots', 'bookingGetTimeSlots');
add_action('wp_ajax_nopriv_booking_get_time_slots', 'bookingGetTimeSlots');

function bookingGetTimeSlots() {
    if (!wp_verify_nonce($_POST['_wpnonce'])) {
        die;
    }
    $test_time_slots = getTimeSlotsByDateFromApi();

    get_template_part('template-parts/single', 'booking_time_slots', ['time_slots' => $test_time_slots]);
    die;
}

function getTimeSlotsByDateFromApi() {
    $time_slots = [];
    for ($i = 1; $i < mt_rand(2, 5); $i++) { 
        $randDate = new DateTime();
        $randDate->setTime(mt_rand(9 + $i, 9 + $i*2), '00');

        $time_slots[] = [
            'text' => $randDate->format('H:i'),
            'value' => $randDate->format('H:i'),
            'isSelected' => '',
            'price' => ''
        ];
    }
    return $time_slots;
}

?>