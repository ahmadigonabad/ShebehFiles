<?php





//menu location
function register_my_menus() {
register_nav_menus(
array(
'Top-Menu-lg' => __( 'منو بزرگ' ),
'Top-Menu-sm' => __( 'منو موبایل' ),
)
);
}
add_action( 'init', 'register_my_menus' );



function custom_excerpt_length( $length ) {
return 15;
}
add_filter( 'excerpt_length' , 'custom_excerpt_length' , 999 );



@ini_set( 'upload_max_size' , '64MB' );
@ini_set( 'post_max_size', '64MB');
@ini_set( 'max_execution_time', '300' );


 if ( has_post_thumbnail() ){
 the_post_thumbnail('post-thumb');
}

if (function_exists('add_theme_support')) {
 
    add_theme_support('post-thumbnails');
 

}


?>