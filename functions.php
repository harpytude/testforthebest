<?php
/*=======================
Include Scripts 
=====================*/

function testtheme_script_enqueue(){

	wp_enqueue_style( 'customstyle', get_template_directory_uri().'/css/testtheme.css', array(), '1.0.0','all');
	wp_enqueue_script('customjs', get_template_directory_uri().'/js/testtheme.js', array(), '3.0.0', 'false');
	wp_enqueue_script( 'jquery');
	 // it will automatically grab the Jquery files
	wp_enqueue_style( 'custom_BS', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css' );
	};
add_action('wp_enqueue_scripts', 'testtheme_script_enqueue');

/* =========================
       Menu Function 
   ==========================*/

function Test_theme_setup(){
	add_theme_support( 'menus');

	register_nav_menu( 'primary', 'this is the primary location');
	register_nav_menu ('secondary','This is secondary location of menu');
}
add_action( 'init', 'Test_theme_setup');

/* ======================
Theme Support Functions
========================= */

//why we use these functions outside the bracket without any action 
add_theme_support( 'custom-background');
add_theme_support( 'custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('side', 'link', 'gallery', 'image', 'audio', 'video', 'quote', 'status' , 'chat'));
add_theme_support( 'widgets');

/*	
	=========================
 Sidebar Function 
==========================*/


//Always use custom function to put all the sidebars and footer and all the widgets areas that your generate 
function testtheme_widget_function() {

register_sidebar( array(  

                     'name' => 'sidebar',  //name of the sidebar 
                     'id' => 'sidebar-1' , //unique id for the sidebar 
                     'class' => 'custom-class' ,           // this parameter may be weired, because Wp does not apply class to your front-end widget but applies only in back end , so in the admin panel , just apply class wrapper around the siebar, around the widget , if you want to customize the  administration experience , you can leave it blank or not specified, This is not the class we will print in our widget or sidebar, but the actual class will be sidebar-custom , so every time you specify a class, wp will pre-pend side bar name wiht the dash (sidebar-custom) before your actual class 
                     'description'=> 'standard-sidebar', // , we can use this parameter to write custom description , this parameter is for if you want help your user , if you have multiple side bars , you need to specify or guide some specific user to know that in the side bar , you can use the specific type of widget or this is the footer  or this is secondary side- bar or whatever

                     // the last four parameters are the most important parameters , these four parameters gives you the ability to completely customize the markup, that single widget returns when you activate in the front end 
                     'before_widget' => '<li id="%1$s" class="widget %2$s">',
	                 'after_widget'  => '</li>',
	                 'before_title'  => '<h2 class="widgettitle">',
	                 'after_title'   => '</h2>' 
	             ));

// we do not have to repeat all the function and action , if we need to generate another sidebar 
}


add_action('widgets_init', 'testtheme_widget_function' ); // we have to use another momenet, when Widgets are being initialized 

// till now we have just implement the back-end of the sidebar , we also have to write the front-end of side bar 

// to implement the sidebar in our front end we are gonna use the same functions that we use to call the header get_header() and the footer get_footer()

//after print the sidebar , we have to align it at the right side of the theme by  using the BS grid 

//if we notice in our front end that blog occupies the 100 percent area and there is no space left at the right side , rightnow side bar underneath the blog post before the footer, so we want left coloum of BS grid as blog post and the right coloum as side bar 

// how to do that ?

 // we have to manage the two parts of our front page/home page , i.e index.php file , encapsulate two parts into the grids , first part (blog part)encapsulate in to the HTML mark up of BS grids and second part (side bar)  align at the right side of the home page using HTML mark up of BS


?>