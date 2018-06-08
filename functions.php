<?php

// include navwalker class for boostrab navigation menu
require_once('wp_foundation_nav_walker.php');

// include navwalker class for boostrab navigation menu
require_once('wp-boostrab-navbar-walker.php');


// include comment walker
require_once('wp-comment-walker.php');





register_nav_menus(array('primary' => 'Primary Menu'));






// sidepar
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'theme-slug' ),
        'id' => 'sidebar-1', // must be in lower case you put this in is_active_sisdebar function
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget  %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
      'calss'       =>'main-post',

    ) );
}







// 
add_theme_support('automatic-feed-links');

function get_title()
{
    $title = get_bloginfo('name');
    $title .= wp_title( '|', false, 'left' );

    return $title;
};




/*
**add featured image suport
** 
*/
add_theme_support( 'post-thumbnails' ); 










/*
**add  custem style
**
*/
function amjad_add_styles(){
    // wp_deregister_
    wp_enqueue_style('my-foundation-css', get_template_directory_uri().'/css/foundation.min.css' );
    //  $rand is parametere that chenge the var of style.css file
    wp_enqueue_style('main-css', get_template_directory_uri().'/css/main.css' , '' , $rand );

    
    wp_enqueue_style('normalize-css', get_template_directory_uri().'/css/normalize.css' );
    wp_enqueue_style('new-css', get_template_directory_uri().'/css/new.css', '' , $rand  );
    wp_enqueue_style('motion-ui-css', get_template_directory_uri().'/css/motion-ui.css' );
    wp_enqueue_style('fontawsome-min-css', get_template_directory_uri().'/css/font-awesome.min.css' );
    wp_enqueue_style('fontawsome-css', get_template_directory_uri().'/css/fontawesome.css' );




}








/*
**add  custem script jquery
**
*/
add_action("wp_enqueue_scripts", "myscripts");
function myscripts() { 
    wp_register_script('myfirstscript', 
                        get_template_directory_uri() .'/myscript.js',   //
                        array ('jquery', 'jquery-ui'),                  //depends on these, however, they are registered by core already, so no need to enqueue them.
                        false, false);
    wp_enqueue_script('myfirstscript');
      
}













/*

**add  custem script
**
*/
function amjad_add_script(){
  
    wp_deregister_script('jquery'); // remove register
    // register a new jquery in footer 
    // wp_register_script('jquery' , includes_url('/js/jquery.js' , array() , false , false));
      //  enqueue a new jquery in footer 
      wp_enqueue_script('jquery');

    wp_enqueue_script('my-foundation-js', get_template_directory_uri().'/js/foundation.min.js'  , array('jquery') , false , true);

    wp_enqueue_script('my-jquery-js', get_template_directory_uri().'/js/jquery.js'  , array() , false , true);
    // for face detection library
    wp_enqueue_script('my-pico-js', get_template_directory_uri().'/js/pico.js'  , array() , false , true);

    // wp_enqueue_script('my-what-js', get_template_directory_uri().'/js/what-input.js'  , array() , false , true);

    wp_enqueue_script('my-main-js', get_template_directory_uri().'/js/main.js'  , array() , true , true);

    // add conditinal script 
    wp_script_add_data('html5shiv' ,'conditional' , 'lt IE 9');
    wp_script_add_data('respond' ,'conditional' , 'lt IE 9');
    wp_enqueue_script('html5shiv', get_template_directory_uri().'/js/html5shiv.min.js'  , array() , false , true);
    wp_enqueue_script('respond', get_template_directory_uri().'/js/respond.min.js'  , array() , false , true);

}
/*
**add_action  script   style
**
*/
// الخطاف مع حرف الs
// hock 
add_action( 'wp_enqueue_scripts', 'amjad_add_styles' );
add_action('wp_enqueue_scripts','amjad_add_script');










/*
**add custem menu suport 
** added by amjad
*/
function amjad_register_custem_menu(){
//    for all menus
    register_nav_menus( array(
        'boostrab_menu'  =>  'NavBar' , 
        'footer-menu'  =>   'Footer Bar'
    ));
    //simple one nav
    // register_nav_menu('boostrab_menu' , __('NavBar'));
};




/*
**add_action
**like javascript
*/
 add_action ('init' , 'amjad_register_custem_menu'); 





/*
**add_nav_menu
** theme_location(must be registered  with register nav menu)
*/
function amjad_boostrap_menu(){
wp_nav_menu(array(
    'theme_locatoin' => 'footer-menu',
    'menu_class'     => 'nav navbar-nav' ,
    'container'      => 'false ' , 
    'depth'          => ' 2',
    // custem class
    'walker'         => new Foundation_Walker_Nav_Menu()
));
};




/*
**read more test function
** Users can prevent the scroll by filtering the_content_more_link with a simple regular expression.

*/


function modify_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '">Your Read More Link Text</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );





/**
 * Filter the except length to 9 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
 function wpdocs_custom_excerpt_length( $length ) {
   if (is_author()){
       return 30;
   }else if(is_category()){
    return 60;

    }else{
    return 20;
   }
}
// 
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 9 );
/**
 * Filter the except dots to [   ......] words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */

function wpdocs_custom_excerpt_dots( $more ) {
    return '   .....';
}
add_filter( 'excerpt_more', 'wpdocs_custom_excerpt_dots', 9 );




 // numbaring the padgination

function num_pag(){
    // from the global pages in doc
    global $wp_query;
    $all_pages = $wp_query->max_num_pages;
    // get the current page number
    $current_page = max(1 , get_query_var('paged')) ; // in php max()
   

    
    echo paginate_links( array(
        'base' =>  get_pagenum_link(  ) . '%_%' ,
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'show_all'           => TRUE,
	'end_size'           => '',
	'mid_size'           => 2,
	'prev_next'          => true,
	'prev_text'          => __('« Previous'),
	'next_text'          => __('Next »'),
	'type'               => 'plain',
	'add_args'           => false,
	'add_fragment'       => '',
	'before_page_number' => '',
	'after_page_number'  => ''
    ) );


}




/*
*  Get Category Comment Count
* همزة الوصل بين التعليقات والقسم هو البوست فكل تعليق في البوست يضاف للقسم
*/

function amjad_cat_comment_count(){
    $comm_args = array(
        'status' => 'all'   // Only approved Comment
    );
     $comment_count = 0  ;// Start from zero

     $all_comments = get_comments($comm_args);  // Get all comments
 
     foreach ($all_comments as $comment) {  // loop throw the comment
        
        $post_id = $comment->comment_post_ID; // Get post id of the comment
          
        // in_categor ( ' slug ' , ' post id')
        if (! in_category( 'def-rules' , $post_id)){  // Check if the post not in this ctegory
            
            continue; //contenu loop without count the comment
        
        }

        
        $comment_count++; // Counter

        echo  $comment_count ;

         
     }   

}



/*
*  Get Category Posts Count
* 
*/

function amjad_cat_post_count(){

   $cat = get_queried_object();

   $post_count= $cat->count;  // Get full  opject property 

   echo $post_count ; // Get post Count
}













































