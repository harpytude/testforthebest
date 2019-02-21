<?php  get_header()  ?>

<h1> This is  index </h1>

	<?php 
	
	if( have_posts() ):
		
		while( have_posts() ): the_post(); ?>
		
			<h3> <?php the_title(); ?> </h3>
			<small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>, in <?php the_category(); ?></small>
			
			<?php the_content(); ?>
			<h1> Please confirm if this is sample page or not ? </h1>
			
			<hr>
		
		<?php endwhile;
		
	endif;
	
	?>

<?php get_footer()   ?>