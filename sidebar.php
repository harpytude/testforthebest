<!-- lets create the simple mark up to wrape up our widget area , so lets open a simple div -->
<div id="sidebar" class="widgets-area" style="background-color:pink;">

<!-- inside the div , we have to call our custom sidebar, a specific hook , a specific built-in function to call our dynamic sidebar and this function is called dynamic_sidebar()  and to call this funciton , we need specific side bar id , the same id we use , when we register  our side bar in function.php file -->
<h1> This is Sidebar </h1>

<?php dynamic_sidebar('sidebar-1') ?>   <!-- this function to print the sidebar-->

	</div>	
	