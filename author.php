<!DOCTYPE html>
<!--archive.php-->
<html lang="en">
<?php get_header(); ?>
<body>
<div class="header-avatar">
  <!-- the header of the page -->
<h2 class="author-header text-center"><?php the_author_meta('nickname') ?>   Page</h2>

  <!-- the avatar -->
<?php
//    avtar argument
   $avatararg = array( 
       'class'  =>  'img-responsive img-thumbnail center-block author-avatar'
   );
//    get avatar(id or email , size , default url , alt , args)
   echo get_avatar(get_the_author_meta('ID') , 150 , ' ' , 'User avatar' ,  $avatararg ); 
  ?>
<div>

  <!-- start row -->
<div class="container author-main-info">

<div class="row">
  <div class="col-md-6 col-sm-3">
   <div class="padding-normal">
     <ul class="list-unstiled ">
        <li>The First Name : <?php the_author_meta('first_name') ?> </li> 
        <li>The Last Name<?php the_author_meta('last_name') ?> </li>
        <li>The Nickname :<?php the_author_meta('nickname') ?> </li> 
     </ul>
   </div>
  </div>
  
  <div class="col-md-6 col-sm-9">
 
  <h4>This is the description.</h4>
    <p><?php the_author_meta('description') ?>.</p>
    <?php
    // this function do not return any value 
    if(!get_the_author_meta('description')){
        echo'There are No description';
    }
    ?>
  </div>
</div>

</div>
  <!-- end row -->
  <!-- the box -->
<div class="container">  
<div class="row  author-stat">
  <div class="col-md-3">
    <div class=" stats">
    <div class="panel panel-default">
      <div class="panel-heading">Post count</div>
      <div class="panel-body">
      <span> 
      <?php echo count_user_posts(get_the_author_meta('ID') ,'' )  ?>
      </span>
      </div>
    </div>
    </div>
  </div>

  <div class="col-md-3">
  
  <div class=" stats">
         <div class="panel panel-default">
           <div class="panel-heading">  
             Commont count
          </div>
         <div class="panel-body">
           <span>
              <?php
                $commentargs = array(
                  'author_email' => '',
                  'author__in' => '',
                  'author__not_in' => '',
                  'include_unapproved' => '',
                  'fields' => '',
                  'ID' => '',
                  'comment__in' => '',
                  'comment__not_in' => '',
                  'karma' => '',
                  'number' => '',
                  'offset' => '',
                  'orderby' => '',
                  'order' => 'DESC',
                  'parent' => '',
                  'post_author__in' => '',
                  'post_author__not_in' => '',
                  'post_ID' => '', // ignored (use post_id instead)
                  'post_id' => 0,
                  'post__in' => '',
                  'post__not_in' => '',
                  'post_author' => '',
                  'post_name' => '',
                  'post_parent' => '',
                  'post_status' => '',
                  'post_type' => '',
                  'status' => 'all',
                  'type' => '',
                        'type__in' => '',
                        'type__not_in' => '',
                  'user_id' => get_the_author_meta('ID'),   /// the ID
                  'search' => '',
                  'count' => true,   // the count of commetn in true
                  'meta_key' => '',
                  'meta_value' => '',
                  'meta_query' => '',
                  'date_query' => null, // See WP_Date_Query
                ); 
              

                // what you can do in this function fron the document for example
                /*
                    * Get comments from last 4 weeks:
                    * Show comments of a user:
                    * Show last 5 unapproved comments:

                */
              
              
                 echo  get_comments( $commentargs );

                 ?>
           </span>
         </div>
    </div>
    </div>
  </div>

  <div class="col-md-3">
    
  <div class=" stats">
  
          <div class="panel panel-default">
      <div class="panel-heading"> Total posts view</div>
      <div class="panel-body">Panel Content</div>
    </div>
    </div>
  </div>

  <div class="col-md-3">
     
    <div class=" stats">
            
            <div class="panel panel-default">
      <div class="panel-heading">Testing</div>
      <div class="panel-body">Panel Content</div>
    </div>
    </div>
  </div>

</div>
</div>

  <!-- the query -->
  <?php

$author_post_per_page = 6 ;   // all the posts [-1]

$autorquery =   array(
  'author'          =>   get_the_author_meta('ID') ,
  'posts_per_page'  => $author_post_per_page  ,  
  ''

);


 $author_posts = new WP_Query($autorquery);


 ?>
  <!--  end the box -->

   <!-- the post -->
   <div class="container">
   <h5 class="comment-count text-center">
   Latest
   
   <?php 
   $numper_of_user_post =  count_user_posts(get_the_author_meta('ID') ,'' ) ;
    if (   $numper_of_user_post >=6){
      echo '[' . $author_post_per_page . ']';
   }else{
     echo '';
   }

   ?>
   
    Posts of <?php the_author_meta('nickname') ?> Posts
    </h5> 
    <div class="row">
         <!-- Start the Loop. -->
 <?php if ($author_posts->have_posts() ) : while ( $author_posts->have_posts() ) : $author_posts->the_post(); ?>

           <div id="main-content" >

<!-- Test if the current post is in category 3. -->
<!-- If it is, the div box is given the CSS class "post-cat-three". -->
<!-- Otherwise, the div box is given the CSS class "post". -->

<?php if ( in_category( '3' ) ) : ?>
    <div class="post-cat-three">
<?php else : ?>
<div class=" col-lg-12">
    <div class="post  main-post ">
<?php endif; ?>



   <!-- display the tag -->
   <div class="  text-center>">
<!-- Display a comma separated list of the Post's Categories. -->
<p class="post-categories ">
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
   </div>



<div class="row">
<div class="col-md-3 img-responsive img-thumbnail center-block "> 
<!-- Display  the Post's thumbnail. -->

        <?php the_post_thumbnail() ?>
</div>   <!-- closes the col-md-6 div box -->



<!-- Display the Title as a link to the Post's permalink. -->
<div class="col-md-9">
<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>


<!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->

<span class="post_date"><i class =" fa fa-calendar fa-fw"></i><?php the_time('F J ,Y'); ?> |</span> 
<span class="post_comment"><i class =" fa fa-comment-o fa-fw"></i><?php comments_popup_link('No Coments','one comment','%comments','post-comment2', 'coments disabled'); ?></span> 
                 



<!-- Display the Post's content in a div box. -->

<div class="entry">

 <!--  if function to chenge bettween excpet and content -->
          <!-- the excerpt egnore the fotos and html tags -->
<?php
    the_excerpt();
    ?>
    <a href="<?php echo get_permalink(); ?>"> Read More...</a>


</div>    <!-- closes the col-md-6 div box -->

 



</div> <!-- closes the first div box -->

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

  <?php

            // 1- first thing you chose the query from the array  
       
            $comment_per_page = 6 ;
                $commentargs5 = array(
            
                  'number' =>   $comment_per_page,
                  'post_status' => 'publish',  // the default is empty
                  'post_type' => 'post',
                  'status' => 'approve',  // hold approve all
                  'user_id' => get_the_author_meta('ID'),   /// the ID
            
                ); 
              

             
              // 2- write the function with that args
              
                 $comments =  get_comments( $commentargs5 );
              // 3- chose the returns from this object 
              if($comments){

             
              ?>
      

        <div class="row padding-normal">
   
         <?php   foreach ($comments as $comment) {?>
          <div class="col-md-3">
    
             <div class=" stats">
    
            <div class="panel panel-default">
                <div class="panel-heading">
                
                <a href="<?php  echo get_permalink($comment-> comment_post_ID) ?> " >
                       <?php echo get_the_title($comment-> comment_post_ID)  ?>
                 </a>
                  
                <?php echo $comment-> comment_date  ?>                  
                 </div>
                   <div class="panel-body">
                   
                   <?php echo $comment-> comment_content  ?>                  

                                       
                   </div>
                 </div>
                </div>
            </div>

                  <?php 
                   }  // end the foreach
                  }else{
                     echo 'There are no comment in this author ' ;
                  }
                   ?>

                 </div>     <!-- end the row of the comment -->



<!-- to remove the pagination from the previous row -->
<div class="clearfix"></div>
 
      


    </div> 
   <!-- end the post -->


<!-- displa the Pagination  -->


<nav  aria-label="Pagination text-center" style="text-align: center;">
<ul class="pagination text-center">
<li class="pagination-previous ">
<?php

// if (get_previous_post_link()){
// previous_post_link('%link' ); 
// }else{
//   echo '<span>No prev post</span>';
// }
?>
</li>
<li class="pagination-next">
<?php
// if (get_next_post_link()){
// next_post_link( '%link'); 
// }else{
//   echo ' <span>  No next post</span>';
// }
?>
  
  </li>
 </ul>
</nav>

 <!-- another Pagination

// <?php if($wp_query->max_num_pages > 1) : ?>
//     <div class="prev">
//         <?php next_posts_link(__('&larr; Older posts')); ?>
//     </div>
//     <div class="next">
//         <?php previous_posts_link(__('Newer posts &rarr;')); ?>
//     </div>
// <?php endif; ?> -->



<?php get_sidebar(); ?>
<?php get_footer(); ?>
</body>
</html>