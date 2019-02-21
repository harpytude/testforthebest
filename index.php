<?php  get_header()  ?>  <!-- this function to attach hedaer.php file-->

<h1> This is  Home Index Page </h1>

<?php if(is_front_page())

{
//i can write custom queries 
}
else
{
//my query_loop
}
?>
<!-- in this way , i wil have  all my code inside index.phpl, it can be complex, if i want to create a lots of exception or different query post, this page is going to look clutter, it's gonna be hard to update and to maintain, so better keep it simple, 

wp give us the ability to split our code,  different pages and different templates , lets use those built-in functionaliy, previously , we have discuss page template

we can use slug, the id to create the template name , in this case , we gonna use slug name, our page name is home, so our page name will be page-home.php  and copy-paste index.php


 till now we have just implement the back-end of the sidebar , we also have to write the front-end of sidebar

To implement the sidebar in our front end we are gonna use the same functions that we use to call the header [get_header()] and the footer get_footer()

After print the sidebar , we have to align it at the right side of the theme by  using HMTL mark up the BS grid 

if we notice in our front end that blog occupies the 100 percent area and there is no space left at the right side , rightnow sidebar is underneath the blog post before the footer, so we want left coloum of BS grid as blog post and the right coloum as side bar 

// how to do that ?

 // we have to manage the two parts of our front page/home page , i.e index.php file , encapsulate two parts into the grids , first part (blog part)encapsulate in to the HTML mark up of BS grids and second part (side bar)  align at the right side of the home page using HTML mark up of BS -->

<div class="row" >

	<div class="col-xs-12 col-sm-8" style="background-color:yelow";><!-- phone size, its gonna be 100 percent and for tablet and full size devices its gonna be cover the total 8 coloums--> 

	<?php 
	//part 1
	 if( have_posts() ):
	    while( have_posts() ): the_post();?>
		</h3> <?php echo 'The post format is:'.get_post_format(); ?> </h3>
        <?php get_template_part( 'content', get_post_format()); ?>
	    <?php endwhile;
		endif;
	/*====================================================
 we will discuss the post formats now
 ==================================================	 */
	?>
	</div>
<div class="col-xs-12 col-sm-4">
<!-- part 2 -->

<?php get_sidebar(); ?>   <!-- this function to attach with sidebar.php file --> 

</div>

<!-- after implementing the div on both parts , we can see in our front end , both parts are implemented as per our requirement 
 if we access our home page, we will have our required structure , but if we access other pages, they will not have same structure , does not even appear the side bar 

 why it is so ?

 because previously , we created some specific pages (page formats ), if we access the pages  page-notitle.php , we will notice that , we have our custom template , because page-notitle is associated with  specific template with no-title

 Always remember! if we have some custom page  for some custom content we have to re-create the page strucutre  if we want to use the same structure for other pages like of index page. 

 For example if we have page  (page-6.php) associated with  page with id no. 6 , if we want to show the sidebar in page 6, we will use the same HTML mark up with BS classes in page-6.. see page page6.php to see the markup 

 Always Remember ! if you have the custom pages or custom templates  always add the header and footer , and if you want specific structure , you have to implement /copy-paste the same mark up 

 if you add /remove some widgets in side bar, it will automatically reflect in front end , as sidebar is dynamically associated 

======================================
Now chapter No. 9  about wp_query()   // the query post 
======================================

query post is the core functionalities of Wp, if you understand how it works, you will be able to create/edit pretty much every things, you will be able to crete drastically your theme and create some amazing results. the WP_query is the funciton that  handles the generation of the core content of wp installation , 
wp_query is the funciton that calls the database , access the databsae and retrive all the data of yoru page, post or custom post type or whatever content you have save in your CMS.

what do we have right now ?

wp_query, we are already using it without knowing it, if we access the index.php , we have blog loop , blog through all the posts
have_posts() is the subsequential funtion  called after the query post 

The query_post () is the function that WP calls by itself while generating the website, so we do not have to call the function, its the built-in function , this function come some global variables as parameter. Wp every time, you  access a page, access a post , it will call the query post, it will retrive for you all those dynamic information without you creating or writing again the query post.
why we we wanna edit ?

because editing the query_post()  give us the ability to generate the content whevever and wherever we want ? 

for example, if we go on our website, rightnow we have all our blog post in blog page, but if we want 2, 3 or just one most recent last pulished blog post in my home page, 

how can i do that ?

I have to edit the home page, i have to create the specific section , specific php file to handle the home page and generate the query post with the specific limit, for example if we want just one post and the most recent post , that is why query_post() is very important . 

Also some time , we see in some websites , we have some specific section with specific blog post that are seperated based on the argument or based on the category or based on the tags, or based on whatever option thehy selected in the CMS, those different sections that prints different blog post are mostly mananged through the query_post().

before start if we see the URL  in codex.wordpress.org/Functions_references/query_post 
you will see the nice warning and desciption that we should not use the query_post(), This is confusing , basically query_post() is the standard function of WP  and you should not touch/edit the main loop functionality becasue the main loop is for WP only , its very complicated and convulated and it can cause problem for you. so if you have to edit the query_post(), do not use the query_post()

if we decide to headed to use the query_post() function , you are gonna drastically increase the loading speed 

How can we do it ?

we have two method that WP gives us to handle the query_post without destroying the the actual query_post , the main loops , those methods are 

(1)  wp_query()
(2)  get_post()

First let's access our CMS/admin panel of wp , we have already created some blog post with some content to manage our new query and to print some specific infomration ,  some specific pages, we also created three categories to organize our blog post

what we wanna acheive in this lecture?

(1)we want to print the most recent blog post in the Home page 
(2)we also want to print another row with just news section 
(3)we want to print the third row to review section 


To do that we will use the wp_query post,  to actually edit the home page we have to create a specific page template for that page , so that i can input /inset  my  specific php code 

I could use the other page because the home page is my front page , so i could use another code -->
<?php get_footer(); ?>   <!-- this function to attach with footer.php file -->

