<!-- why we need this file ?


	Single.php is the default file that WP search and uses to print the information of the single blog post , so every time we click the title of the blog post or ussual button "read more " at the end of an excerpt , or end of a small amount of text of the blog post , wp grabs that single.php and use the structure of single.php to print remaing all the information of our blog post , we have to treate sinlge.php file as an independent file, that is why we will include the header and foot tag and  we have to reinclude  HTML mark up to create the proepr structure for our single blogpost page, we will copy-paste the code of page-72.php  and then change the structure of the page , in this page we have to print the things differently to just visualize in  better  my single.php file , my single blog post when i access the blog post, usually i have always the loop to access the post function to call all the class_id , the_title or whatever , always use the loop,   -->

	<?php  get_header()  ?>

<h1> This is  single.php page </h1>

	<?php 
	
	if(have_posts() ):
		while( have_posts() ): the_post(); ?>  <!-- we have to use while loop to check if we have post, always use the while loop to check if we have the post even though single.php prints usualy one single blog post  for how wp made / built the logic of wp , we have to use the post loop,   -->

			<h3> <?php the_title(); ?> </h3> 

			<article id="post-<?php the_id() ?>"  <?php post_class() ?>
			<?php if (has_post_thumbnail()) : ?>	      
			    <div class="pull-right"> <?php the_post_thumbnail()  ?><!-- we align the post thumbnail to  the right  with the float right CSS attribute  -->
			    <? endif; ?>
			    <small>  <?php the_category(' '); ?>  || <?php the_tags() ?> || <?php edit_post_link() ?> </small>  <!--The function the_tags() is gonna call all the tags that we input inside our WP insallation , 
i do not want to print categtory as list , i want in-line list of words and links , if we reload , we will see  tags and category will not be in list but it will be in-line

why it edit link and tags are not visible on the front page

By default , wp is not gonna show any admin related link , admin related function or actions if you are not actually logged

			      -->
			     <?php the_content(); ?>

			     <hr>

<?php if(comment_open)
{
	content_template() 
	else

	 {
		//to create the better experience for the user, instead of not printing absolutey any thing, we can use else statement to give user some feed back  like , let him know why he can not leave the commment, 

		echo "<h5 class="text-center"> Sorry , Comments are closed!  </h5>"
	}

	//if  above statment is true , we can print our desired template , I can print the actual template 
//comments_template is a built-in functionality of WP that calls the actual template of the comments that is built-in /pre-built  PHP file with all the tags, that WP uses to properly create a comment form and connect that commmon form with the wp administration panel to save all the comments  without injecting of weired code from the users, from the hackers, we have the ability to change the built-in php file for comments , we can use our custom comment template but for we will not use as it is at advance level,
	//comment section will be displayed in different ways while logged-in , while not logged in 

  }			  
            </article>
<?php endwhile; 
endif;
?>			
<!--Now we have all the infomration that we decided to print in our single.php file ,  
if we check our blog page and home page , we will see that all the content of our pages has not change till now , it means single.php file does not effect at all the other files/structure. 

The single.php file will be called , when we access the actual single blog post , this is very useful because we can have different structure for different blog post , also a really important thing , the single.php file works exactly like the content.php , so we can create a specific file for specific post type , so we can have single-aside.php , single-featured.php. single-image.php, we can change the structure of a single blog post based on the content type , in the same way, we did inside the post loop for different post type, 

Let's increase the functionality of our single.php file, normally in  generaic wp site/blog , the blog page/ actual single blog page have all the other information  but for now we are priting the categories but we can also print the tags, we can print the  edit link then can be visiible only when user will be login with admin , we can also print the commment section, 

To add all comments, edit links ,categories , we will use some built-in functionality of wp the_tags, edit_post_link() then we have to also add the comment section , we will also use built-in function for comment section

comment part/comment template  will only be activate, if the comment option of the specific blog post is activated in the CMS.


==========================
at the end of this lecture, now we better know how to print information inside our page inside our blog loop  and inside our single blog post, how to activate the tags, the edit button  and add comments

  -->
<?php get_footer()   ?>