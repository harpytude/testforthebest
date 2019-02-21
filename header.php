<!DOCTYPE html>
<html>
<head>
	<title> <h2> Nothing will be visible here </h2></title>
<?php  wp_head();?>   <!-- this function to print the head section-->
</head>

<body <?php body_class()?> >  <!-- this function is to print classes of all tags inside html tags -->

<div class="container-fluid" style = background-color:red; >
	<h1> This is header of the page</h1>
</div>

	<div class="row" style="background-color:yellow;">
	<div class="col-xs-12">
		<h3> This is menu section </h3>
    <?php wp_nav_menu(array('theme_location'=>'primary Menu'));?>
        </div>
    </div>
   <img src = "<?php header_image();?>" widht= "<?php get_custom_header()->width ?>"   height= "<?php get_custom_header()->hegiht ?>">

 
