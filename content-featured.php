<!--
in my case, we have post thumbnail, for all the post that we are calling , so we will have featured image on top and the title at the bottom in  h1 class -->


<article id="post-<?php the_ID();?>"   <?php post_class(); ?>>


<?php if(has_post_thumbnail()): ?>
	<div class="thumbnail"> <?php the_post_thumbnail('thumbnail'); ?> </div>
<?php endif; ?>
<?php the_title(sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?>
<small> <?php the_category(); ?> <small>
</article>
	
	<!-- what will happened after running this code

	ofcousre, the structue, the HTML markup  does not recognize what i wanna do , he does not know that , i want my three blog post nicely aligned close to each other, 

	so what we have to do ?

we have to change the HTML mark up  what WP is generating , if we go to page-home.php 
	>