<?php  

/* Template Name: page No title */

get_header()  ?>

<h1> This is  index </h1>
	
<div class="row">

	<div class="col-xs-12 col-sm-8">

	<?php 

	if( have_posts() ):
		while( have_posts() ): the_post(); ?>
		<?php the_title(); ?>
	<h1> This is the Page Template with No title </h1>
		<hr>
<?php endwhile;
	endif;
		?>
	</div>

<div class="col-xs-12 col-sm-4">

<?php get_sidebar(); ?>

</div>
</div>

<?php get_footer()   ?>
