<h1> This is Stanadard Post Type </h1>

<?php the_title(); ?>
<div class="thumbnail-img">  <?php the_post_thumbnail('small'); ?>  </div>
<small>   Posted on : <?php the_time ('F' , 'j', 'y'); ?>  at <?php the_time('g:i a'); ?> , in <?php the_category(); ?> </small>
<header>

<div class="row">

	<?php if (has_post_thumbnail()): ?>

		<div class="col-xs-12 col-xs-4">
       		<div class="thumbnail"> <?php the_post_thumbnail('small'); ?></div>
        </div>
        

        <div class="col-xs-12 col-xs-4">
        	<?php the_content(); ?>
        </div>
        <div class="col-xs-12 col-xs-8">
        	<?php the_content(); ?>
        </div>
<?php endif; ?>
</div>
<hr>

