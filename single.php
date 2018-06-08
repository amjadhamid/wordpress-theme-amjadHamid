<!DOCTYPE html>
<!--single.php-->
<html lang="en">
<?php get_header(); ?>
<body>
<?php if(have_posts())
{
    while(have_posts()) : the_post(); ?>
        <!-- <h1 class="text-center single-title"><?php the_title(); ?></h1> -->
        <!--  -->
        <div class="container  single ">
        <div class=" col-lg">
    <div class="post  main-post single-post">
<?php edit_post_link('Edit <i class="fa fa-pencil  text-color"></i>  ', '','','','button primary button float-right')?>

<div class='text-center'>
<!-- Display the Title as a link to the Post's permalink. -->

<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>


<!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->

<span class="post_user"><i class =" fa fa-user fa-fw"></i><?php the_author_posts_link(); ?>|</span> 
<span class="post_date"><i class =" fa fa-calendar fa-fw"></i><?php the_time('F J ,Y'); ?> |</span> 
<span class="post_comment"><i class =" fa fa-comment-o fa-fw"></i><?php comments_popup_link('No Coments','one comment','%comments','post-comment2', 'coments disabled'); ?></span> 
</div>
<hr>
                 
<div class="row">
<div class="col-md-6 text-center">
<!-- Display  the Post's thumbnail. -->

        <?php the_post_thumbnail() ?>

</div>
<!-- Display the Post's content in a div box. -->

<div class="col-md-6">

<div class="entry">

 <!-- the_content -->
<?php the_content('Read the full article..') ?>

</div>
</div>
</div>


     <hr>
    <p><i class =" fa fa-tags fa-fw"></i>
<!-- Display a comma separated list of the Post's Categories. -->
<p class="post-categories">
<?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?>
</p>


<!-- Display  the tags. -->

<p class="the-tags">
<?php  
if(has_tag()){
the_tags() ;
}else{
    echo 'There is no tags' ;
    // you can add a form to add a tags from the users here
}
?>
</p>

<hr>
<?php wp_reset_query(); ?>



</div> <!-- closes the first div box -->

</div> <!-- closes the second div box -->

</div> <!-- closes the col-lg div box -->


</div> <!-- closes the container div box -->

        <!--  -->
    <?php endwhile;
}
wp_reset_query(); ?>

<!-- to remove the pagination from the previous row -->

<div class="clearfix"></div>





  <!-- the author meta -->
  <div class="container">
  <div class="card myCard" style="width: 100%;">
  <div class="card-divider">
  
  <h4> 
  The Author :
<?php the_author_meta('first_name') ?> 
<?php the_author_meta('last_name') ?> 
(<?php the_author_meta('nickname') ?> )
</h4>
    </div>
 
    <div class="columns medium-6">
    
  <?php
//    avtar argument
   $avatararg = array( 
       'class'  =>  'img-responsive img-thumbnail center-block'
   );
//    get avatar(id or email , size , default url , alt , args)
   echo get_avatar(get_the_author_meta('ID') , 100 , ' ' , 'User avatar' ,  $avatararg ); 
  ?>

   
     </div>
     <div class="columns medium-6">
 
  <div class="card-section">
    <h4>This is the description.</h4>
    <p><?php the_author_meta('description') ?>.</p>
    <?php
    // this function do not return any value 
    if(!get_the_author_meta('description')){
        echo'There are No description';
    }

    ?>
    <hr>
    <p class="author-stats">
    User Posts Count : <span class="posts-count">
     <?php echo count_user_posts(get_the_author_meta('ID') ,'' )  ?>
     , </span>
  
    User Profile Link : 
    <span class="posts-link">
    <?php the_author_posts_link()?>
    </span>
   </div>
  </div>
</div>

</div>


  <!--  -->
   <!-- equery -->



<?php
 
// Retrieve the id of the post
  // global $postID =  get_queried_object_id();
  // Retrieve the list of categories for a psot
   // list = array()
 $postCategories = wp_get_post_categories(get_queried_object_id());

  $author_post_per_page = 6 ;   // all the posts [-1]


 // The $args
 $autorquery2 =   array(
  'posts_per_page'  => $author_post_per_page  ,  

  'post_count'     =>     5 ,
  'category__in' => $postCategories,   // this variable return array
  $args = array(
    'orderby' => 'rand ',
    'order'   => 'DESC',
  ),

  'post__not_in'  =>  array(get_queried_object_id() ) , // he want array

);


 // The Query
 $the_query = new WP_Query(  $autorquery2 );
  ?>
   <div class="container">
   <h5 class="comment-count text-center">
   
   
   <?php 
    if (   $numper_of_user_post <=1){
      echo 'Same psot in this categories';
   }else{
     echo 'There are no Same posts';
   }

   ?>
   
    </h5> 
 <!-- Start the Loop. -->
<?php if ($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

   <div id="main-content" >
<!-- Test if the current post is in category 3. -->
<!-- If it is, the div box is given the CSS class "post-cat-three". -->
<!-- Otherwise, the div box is given the CSS class "post". -->

<?php if ( in_category( '3' ) ) : ?>
<div class="post-cat-three">
<?php else : ?>
<div class=" stats col-md-3 ">
<?php endif; ?>

   <!-- 
      <div class="row padding-normal">
   

          <div class="col-md-3">
    
             <div class=" stats">
    
            <div class="panel panel-default">
                <div class="panel-heading">
                
    -->

<!-- display the tag -->
<div class="  text-center>">
<div class="panel panel-default">
                <div class="panel-heading">
                

<!-- Display the Title as a link to the Post's permalink. -->
<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

</div> <!-- closes the second div box -->

</div> <!-- closes the thired div box -->

</div> <!-- closes the second div box -->

</div> <!-- closes the thired div box -->

<!-- Stop The Loop (but note the "else:" - see next line). -->

<?php endwhile; else : ?>


<!-- The very first "if" tested to see if there were any Posts to -->
<!-- display.  This "else" part tells what do if there weren't any. -->
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>


<!-- REALLY stop The Loop. -->
<?php endif; ?>

<!-- end of all wp_query to restore the the orginal post data -->
<?php        
/* Restore original Post Data 
* NB: Because we are using new WP_Query we aren't stomping on the 
* original $wp_query and it does not need to be reset with 
* wp_reset_query(). We just need to set the post data back up with
* wp_reset_postdata().
*/
wp_reset_postdata();
?>          

    <!--end query  -->


<!-- to remove the pagination from the previous row -->
<div class="clearfix"></div>






<!-- displa the Pagination  -->


<nav  aria-label="Pagination text-center" style="text-align: center;">
<ul class="pagination text-center">
<li class="pagination-previous ">
<?php

if (get_previous_post_link()){
previous_post_link('%link' ); 
}else{
  echo '<span>No prev post</span>';
}
?>
</li>
<li class="pagination-next">
<?php
if (get_next_post_link()){
next_post_link( '%link'); 
}else{
  echo ' <span>  No next post</span>';
}
?>
  
  </li>
 </ul>
</nav>



  <!-- the comment -->
<div class="container">
  <?php comments_template('', true); ?>
</div>



<?php get_sidebar(); ?>
<?php get_footer(); ?>

</body>
</html>
