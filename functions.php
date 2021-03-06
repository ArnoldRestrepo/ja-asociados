<?php 

    // Register Menus
    function register_all_menus() {
        register_nav_menus(array(
            'menu' => __('Menu Superior'),
            'mobile' => __('Menu Móvil'),
            'menuLeft' => __('Menu Izquierdo'),
            'mobileLang' => __('Lenguaje Móvil')
        ));
    }

    add_action('init', 'register_all_menus');

    // Register Widgets Footers
    register_sidebar(array(
        'name' => 'FooterImage',
        'before_widget' => '<div class="WidgetFooterImage">',
        'after_widget' => '</div>'
    ));

    register_sidebar(array(
        'name' => 'Footer1',
        'before_widget' => '<div class="WidgetFooter WidgetFooter1">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="WidgetFooter__title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => 'Footer2',
        'before_widget' => '<div class="WidgetFooter WidgetFooter2">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="WidgetFooter__title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => 'Footer3',
        'before_widget' => '<div class="WidgetFooter WidgetFooter3">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="WidgetFooter__title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => 'Copyright',
        'before_widget' => '<div class="Copyright">',
        'after_widget' => '</div>'
    ));

    // Register Widgets Sidebar
    register_sidebar(array(
        'name' => 'Sidebar1',
        'before_widget' => '<div class="Sidebar__widget">',
        'after_sidebar' => '</div>',
        'before_title' => '<h3 class="Sidebar__widget__title">',
        'after_title' => '</h3>'
    ));

    // Custom Class Sidebar
    add_filter('body_class', 'add_custom_class');
    function add_custom_class($classes){
        if(is_page_template('page-sidebar.php')){
            $classes[] = 'is--Sidebar';
        }
        return $classes;
    }

    // Function Search
    add_filter( 'wp_nav_menu_items', 'dcms_item_search', 10, 2);

    function dcms_item_search( $items, $args ) {

        if ($args->theme_location == 'menu') {

            $items .= '<li class="NavList__item Language">'
                    . '<a href="#" class="NavList__link Language__link">EN</a>'
                    . '</li>'
                    . '<li class="NavList__item">'. get_search_form( false ) .'</li>';
        }
        return $items;
    }