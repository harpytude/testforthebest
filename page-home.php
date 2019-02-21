<?php  get_header()  ?>  <!-- this function to attach hedaer.php file-->
<h1> This is  Home Page </h1>


<div class="row">
		
		<?php 
			
			$args_cat = array(
				'include' => '1, 9, 8'
			);
			
			$categories = get_categories($args_cat);
			foreach($categories as $category):
				
				$args = array( 
					'type' => 'post',
					'posts_per_page' => 1,
					'category__in' => $category->term_id,
					'category__not_in' => array( 10 ),
				);
				
				$lastBlog = new WP_Query( $args );
				
				if( $lastBlog->have_posts() ):
					
					while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>
						
						<div class="col-xs-12 col-sm-4">
						
							<?php get_template_part('content','featured'); ?>
						
						</div>
					
					<?php endwhile;
					
				endif;
				
				wp_reset_postdata();
				
			endforeach;
		
		?>

<!-- it will show to same home page untill query post edited,  built-in query post is still accessing the post information after fetching from the database and printing the content of that page, that is conent without any type of post format , so we gonna see all the infomration , we have sidebar, footer and others 

First Goal: i wanna create as the first row of BS grid outside my left and right sidebar , we want to create our latest blog post -->
<!--  <div class="row">   
 <div class="col-xs-12">  we have a wrapper container here that is 100 percent i.e 12 , to change the mark up we have to access this container and geneate the  article with the  post classes, we are geneting the repeating to loop with the <article> with the post class , so its a 100 percent div container with no restricitons. and no strucutre, (-- see content-featured)  

so, what can we do to change the HTML mark up ?

I can just  delete the  class="col-xs-12"  100 percent mark up , use only the simple  <div class="row">   and delete the  <div class="col-xs-12"> then open another row not to damange the HTML structure, in this way , we have 

	  -->
<?php 
/*
$lastblog = new wp_query('type=>post&post_per_page=1');    // it can access the post , pages, custom post type , categoreis , tags, whatever element, for now i want to access just one blog post type, now we have our new query post, following the logic of wp ,we should be able to print , re-use the query loop , because we have to always use the query loop to call the spcific content that we want, 

// we have implement two lopps to duplicate teh content that is why it will print twice the content of the Home page , 
 ?>  
  <!--first we have to create the variable,  variable name conveniency with meaning, in this variable we just store the class wp_query , this class will access the query_post loop and give us a new instance of query_post loop so we are not gonna touch the actual built-in/main loop of query post, but we gonna crete new empty query_post from scratch that we can handle and manage , however we want without destroying the actual loop, with this query post , 

  Now i have to specify some specific information inside , wp_query give us the ability to select whatever element , whatever content we want from our administration panel by just by stating the variable of the content we want , those variable can be written throtuh single string inside the query_post or with an array of variables, for now , i am gonna use the string in next the row, i m gonna use array of variable, we will see  both examples, it can access the post , pages, custom post type , categoreis , tags, whatever element  , we have to specify which type of content we wan t  -->
<?php 
// why effect of  new wp_query is not on first loop ? how can we implement the wp_query on first loop, How we can communicate to Wp , I wan to use the wp_query on the below loop , simple we have to inject wp_query in the function below 
	
		if( $lastblog->have_posts()): // this is the basic PHP function,  basically a class the function and inject a specific information of the  new class wp_query()  instanace created inside this function, we have to repeate /implement the same with other functions like have_posts(), the_posts() , we do not have to repeate same for the post format , becasue if we edit the post funciton , every thing inside the loop is gonna refer to the_post() funciton ,so  if we want the_time(), the_category(), the_title() or whatever information inside the post that  we use to call simply inside our loop we can do it, after manipulting the the query post without repeating the same thing, because after we manipulating the_post with our new query post , only information is gonna be refer to this new one , not the actual old one.
    while($lastblog->have_posts() ): $lastblog->the_post();?>
    </h3> <?php echo 'The post format is:'.get_post_format(); ?> </h3>  <!-- we do not have to repeat $lastblog for the post format because if we edit the post functions , everything inside the loop is gonna refer to the the_post function  , if we want the_time()  , the_category(), the_title() or whatever information inside the post we use to call simply inside our loop ,we can do it after manipulating the query_post without repeating the same because after manupulating  the_post with our new post , only information is gonna be refer to new one , not the actual one  -->
        <?php get_template_part( 'content', get_post_format()); ?>
<?php the_title(); ?>
<?php the_content(); ?>       
	<?php endwhile;
		   endif;
	wp_reset_postdata(); //always remember , everytime you added a query post with a newinstant , at the end of the loop always use the function to reset the post data. This function is the safeguard, that reset all the previous editing of the post data, before this function.  use this function everytime when we edit the query post ,use this function to avoiud effect the new query post use in fututre,if we use the same variable 

    ?>
	</div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-4">
 <?php 
  if( have_posts()):
    while(have_posts()): the_post();?>
	</h3> <?php echo 'The post format is:'.get_post_format(); ?> </h3>
	<?php the_title(); ?>
	<?php the_content(); ?>
    <?php get_template_part( 'content', get_post_format()); ?>
	<?php endwhile;
	endif;
	wp_reset_postdata();
	?>
	</div>
</div>
<!--
	As I wanted , we have created the latest post,we have publihsed the dupilicate the  post on  home page, one is the latest one the second is from the list of post,without touching the actual query post, if we were using the actual built-in query post, we have to secure the other one by resetting the standard query post, in this case, we create the instanace that is not effecting the actual query post, all the other content of our page still there and not effected by our query post , Now after the infomraiton of the home page, I wanna print the other two blog post from my list of three but i wanna skip the last one , i do not wanna skip ,   -->

<!-- till now we have two loops, first div with row having loop with custom query post having single post and second div with row having regular blog post with our standard query post.. No we wan to print the OTHER REMANING POSTS NOT THE FIRST ONE, LETS START ANOTHER CUSTOMIZE QUERY POST BY COPY-PAST CODE -->
div class="row">
<div class="col-xs-12 col-sm-4">
 <?php 
 /*
  $lasttwoblogs = new wp_query('type => post&post_per_page=4&offset=1'); // after printing this loop we still have repetition of previous loop , if we will not add offset variable ,  with  offset varible we are saying to wp , loop with this current new , and post per page just 2, skip the first one , i do not want to see the first one, Now we have the same exact lease post that is in our post page in our CMS/ administration panel,  
  if($lasttwoblogs->have_posts()):
    while($lasttwoblogs->have_posts()): $lasttwoblogs->the_post();?>

	</h3> <?php echo 'The post format is:'.get_post_format(); ?> </h3>
	<?php the_title(); ?>
	<?php the_content(); ?>

    <?php get_template_part('content', get_post_format()); ?>
	<?php endwhile;
	endif;
	wp_reset_postdata();
	?>
	</div>

	<!-- Now , we want other blog post , that is inside category self-respect,  so will create another row to print just the post that are in the category 'self-respect' how can we do it ? first copy-paste  -->

<hr>

<!-- Print only the category Self_Respect -->
div class="row">
<div class="col-xs-12 col-sm-4">
 <?php 
  $lasttwoblogs = new wp_query('type => post&post_per_page=-1&cat=13');  // cat=8   or category_name='self-respect'


  // Now I do not want any limit, so I want to print all the post related to category 'self-respect' without any limit , if we do not specify anything in the parameter e.g page_per_post, the default value the WP is gonna print the  amount number of post in a single page is based on our reading option in the settings menu ,  if i do not specifiy anythign in the new query_post, that query_post is gonna use that variable in the  setting menu the reading option , so always specify something, in my case, I do not want any limit to print our category , so the value we will put will be page_per_post=  -1, with minus one , we are saying to the wp that page per post must be unlimited, we will remove the offset, we just want to print the tutorial to call a specific post in a specfic in a specfic category , so we will insert the catergory id(cat=7) or category name (category_name="self-respect")

// how to check the category id = admin panel/CMS -> Posts -> categories -> self-respect -> check the slug and find tag_id= ?


  if($lasttwoblogs->have_posts()):
    while($lasttwoblogs->have_posts()): $lasttwoblogs->the_post();?>

	</h3> <?php echo 'The post format is:'.get_post_format(); ?> </h3>
	<?php the_title(); ?>
	<?php the_content(); ?>

    <?php get_template_part('content', get_post_format()); ?>
	<?php endwhile;
	endif;
	wp_reset_postdata();
	?>
	</div>

	<!-- Now i want to use the array method instead of single string method 

		Print other 2 posts not the first one 
 Why we use array instead of string as paramter, if the length of string is too long , it can cause  convuated strcture of string, to make the long string more reable we use  arary of inputs , we wil use a variable to store array values 
 If we have a long string with a lot of options of input always use an array, it is easy to understand, easy to expand



	-->  
<
<div class="row">
<div class="col-sm-12">
 <? php 
 /*
 $args = array('type' => 'post',
	         'post_per_page'=> 2, // in this case , we are in array not in a string, we can use numeric values,  not a  string  
	         'offset'=> 1,
	         'category_name'=>'self respect');

$querytest = new WP_Query($args);

 if($querypost->have_posts()):
    while($querypost->have_posts()): $querypost->the_title();
	$querypost->the_content(); ?>

	<?php get_template_part('content', get_post_format();)  ?>
<?php endwhile;
endif;
wp_reset_postdata();

?>
</div>
</div>

<!--  =========================
	CHAPTER NO. 10 FITLER THE WP_QUERY WITH CATEGORIES 
	==================================================== 
WP_QUERY is the core funcationality of WP to call pretty much every type of content from your CMS/Admin panel priniting whatever you want,  we can call  post, page, category , thumbnail, custom texonomy , custom post type , we can call , handle and mangae  it and associate to the specific template or do whatever we wnat , but we have to follow some specific rules, we have to call specific classes, functions, actions to clean what you doing , with this wp_query , we can develop almost every thing , every kind of theme, no limitation , with this wp_query. 

For now we have only one blog post printed on the top of the home page, Now we want to clean  up/ remove all posts that i do not need and i just wanna print the most recent blog post in my top row in a better way, for now we want remove some previous code so we will comment the code, never delete the code just comment it 
if  you need to delete the copy , just make a copy of your code in another file for safety, 

our goal is to print the  three most recent posts.

-->

*/
?>
<div class="row">
<?php  

$args_cat =array('include'=> '13, 14, 15');  // in my categories loop , i wanna include some specific categories and categories are those three categories that are already selected , why we have string value, the category have to specify as a string not as an array , now we can call function to call our those specific categories and loop throguh those categories 

$categories = get_categories($args_cat);// we need another variable to store all the categories that we are looking for and to store this information inside this variable ,we need a function get_categories and inside we need to pass the argument 

// how to see what is inside our function get-categories($args_cat
var_dump($categories) // if we check our front-end , what is going on, what we retrieved with our function , we have string of 3 categoreis becasue we have our object array withe three categories ,  we need the id of the specific  category id , becasue we need id that we need to associate with our posts to call just  those specific posts, 

// now we have to  loop through these categories , array that we created to do that we need a php function  , foreach loop is to access the object array elements sequentially 
foreach(categories as category) {   //category is the dynamically generated variable , this loop with access our three categories in  liner subsequential manners  that we fetch in $categories varibel ,   inside the category variable we have everything inside , we need, we have the category id and category name, so now we can use the specific argument/specific variable to call the custom wp_query  with the just category and post per page limited to 1 to the specific category id , now copy-paste entire  wp_query loop as below and patse inside the category loop, after the below code we are looping through the three categories that we fetch from above code, as we decided we just wanna one blog post per category , in we set the 'posts_per_page' => 1, and the category has to be inside just the current catergory , we are looping in , to do that we have to call the variable 

<div class="row">
		
		<?php 
			
			$args_cat = array(
				'include' => '1, 9, 8'
			);
			
			$categories = get_categories($args_cat);
			foreach($categories as $category):
				
				$args = array( 
					'type' => 'post',
					'posts_per_page' => 1,
					'category__in' => $category->term_id,// now we are looping through the three categories as we said we want just one blog post , in our argument we have to mention one post per page and category has be inside just the current category we are looping in , to do that we have to call variable $category , by accessing this variable we are inside the object array that is inside this inside the vategory varibel and i am looking for the_term_id,  term_id is containing the id of the category , so i m actually in current  loop , i m creating three different sepertaed wp_queries, here everytime , i call just one post for the specific category and ofcousre its gonna be latest post , we did not change the order, now see front end

				'category__not_in' => array( 10 ),
				);
				
				$lastBlog = new WP_Query( $args );
				
				if( $lastBlog->have_posts() ):
					
					while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>
						
						<div class="col-xs-12 col-sm-4">
						
							<?php get_template_part('content','featured'); ?>
						
						</div>
					
					<?php endwhile;
					
				endif;
				
				wp_reset_postdata();
				
			endforeach;
		
		?>




 <!--$argss = array(
	'type' => 'post',
	'posts_per_page' => 1, 
	'category__in' => array(13,14,15),  
	                   // the syntax is simple as a string as ususal category, there will be the arrya of id of those categories that we want to include in this loop , 
    'category__not__in'=> array(129)); // this parameter with an array to specify the multiple the categories , in our case we have to select one category, although this parameter have array but we have to mention only one value for now , that is why we will use single value not the array of values, but always put an array , you never you gonna have multiple categories  you do not want to include in the print of last posts, it can more more managable ,you can easly expand the functionality of the function
    $lastthreepost = new WP_Query($argss);

 if($lastthreepost->have_posts()):
 	while($lastthreepost->have_posts()):

 		$lastthreepost->the_post();
 		$lastthreepost->the_post_thumbnail('small');
 		$lastthreepost->the_title();
 		$lastthreepost->the_content();?>
<div class="col-xs-4 col-xs-4">
 	<?php get_template_part('content', 'featured'); ?>
 </div>

 after implementing the BS feature, we will have three latest blog post nicely aligned in one line and three coloum because we use BS to align them, in a seperated row, we have our home content and our side bar and our footer in three different rows, if we notice we did not insert the structure , the seperation of the coloum inside a content feature because if you wanna use the content-featured in other pages of your wp theme, if you want the same exact structure for this  content-featured.php ,having the thumbnail and the title in two coloums page or single column page ,you can use it just calling the template part content-featured and not worring about the actual mark up HTML  inside, this is a logic like a component based logic, they give us the ability  to recall the specific part of template  without worrying about the structure, that is too tide and we can pretty much print whatever ,whereever we want , Now we  have three nicely align blogs post , i have pretty much last blog post of every category , we have the lastest blog post with three different catergories. if i want exactly same structure every time publihs a blog post , i mean if want for the first row just the latest blog post of each catergory of these three main categories , how can i do it ? for example if i publish a new blog post in category in self-respect ,for now our latest blog post is on category self-respect, now out of the three last blog post , two of them are of same catergory like  same category self-respect, if we reload, we will see we will have three blog post with two categories same "self respect "because wp grab the latest three blog post without caring the category, wp will filter through the latest three from the blog loop it will  not filter  according to the catergory,  but i want always keep the structure to have latest blog post with each different category , how can i do that ?

I can do it in two ways 

First I have to limit the categories , i want those blog post to be printed , for example if i create a new category and new post in  new category , on refresh we will get the newly generatd post with new category because WP grab the latest three posts. but if i wanna limit the three post to  those just  three category , we will create another argument and use an array of value for those specific categories  ,-(- see in the array)  after adding the paramter category__in(), on refresh we will notice that we set our code to print last post from each categotry including the newly added category but not add the category that is in the parameter 'category__in' => array(13,14,15); ,  a post with new category is printed althoug we did not enter the id of the new post in the parameter why it is so ?

Basically wp gives you the ability to put on single blog post in multiple categories, if we call a specific category no matter which other category is our post in to , it gonna print , so to avoid this , we can do two things, 

remove the one category out of two categories , now we  will not have the most recent post but , we have the most recent  post with the categories id mention in the parameter 

but it can happen that we have specific post inside multiple categories and this happenes , we wanna limit the visualization of this kind of post , just saying that this post , first row has to contain just post in three different categories not other random categories we can use another argument inside our loop to specificy in which category our post have to be, on adding the Category__not__in and refresh the page, we will have our required results, we have excluded the additional category now.


NExt thing, what if we edit some post , change the category , will the edited post consider the latest post ? Yes edited post will be considered as the lat post we gonna see in our front end the two  post with same category, Now again  out of three post we have two post with same category

what i wanna do now?

i want the last blog post of each categories , so if there is any repetition in creation of the  post , i wanna skip the second category and just call single post per each category , 

to do that , we will invert the logic of wp_query(), so now we will use wp_query to filter the category that are inverted  in two , in our case our post is in the center of the loop, so i m calling the post inside the category,

 what i have to do ? 

i have to switch it to inverted, so i have to call category before and i have to call just three specific categories and then i have to call a post inside the specific category ,

 so i have to loop through the categories  and not loop throgh the post , let's do it step by step without getting confused 
 lets start to create an array of arguments for our category filter 


 ->
 <?php endwhile;
       endif; 
wp_reset_postdata();
        ?>
</div>        


How to implent your own style beyound built-in templates

Now most recent three post have been printed, now we need to style, change Mark up, change template part that wp is calling to geneate this content in HTML , to do that  we can do two things,

we can write inline styling code instead of this  code of line  	<php get_template_part('content', get_post_format()); ?>
or we can use specific template,

just for the get_post_format() part and oveeride the get_post_formate(), like I do not use the get_post_format() to select the post format but use my custom post format,  if we override, we will not use post_format to select a template but select our own template, because just above code is the last blog post, its kind of featured content in top part at our home page, 

	   <php get_template_part('content', get_post_format()); ?> 

we can create this template part called content featured/second  parameter and apply specific style for just this kind of post. 


Let's do that , Let's included the second parameter as features, 
	   	   <php get_template_part('content', 'featured'); ?> 

now what we have to do ? we have to create a new file content-featured.php
in this case, we created content featured template part and i am calling  dynamically just on the first section , now we move to new file content-featured.php



=============================

in chapter 10 , we have actually ordering the categories through in a  name order (alphabaticlally) in adminpanel  and in front end, if we delete the last post, we will have last three availeble categories with each post per categetory, now we have achive our goal, to get the blog post from each category , the three categories that we specified 
, This is everything to understand little bit more and editing more the wp-query 

Check documentation to know  more about the wp-query 
-->



<?php get_sidebar(); ?>   

<?php get_footer(); ?>  

