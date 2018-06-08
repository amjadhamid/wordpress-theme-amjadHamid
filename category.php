<!DOCTYPE html>
<!--index.php-->
<html lang="en">
<?php get_header(); ?>

<body>

     <div class="container">

 <div class="panel panel-default text-center padding-normal margine-top">
  <div class="panel-heading "><h5> <?php single_cat_title() ?></h5></div>
  <div class="panel-body ">
  <div class="cat-desc col-md-6">
  <?php echo category_description() ?>
   </div>
  <div class="cat-stat col-md-6">
    <span> Article Count : 40 </span>

    <span> Comment Count : 500 </span>
   </div>

  </div>
</div>



        <div class="row">
         <!-- Start the Loop. -->
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

           <div id="main-content" >

<!-- Test if the current post is in category 3. -->
<!-- If it is, the div box is given the CSS class "post-cat-three". -->
<!-- Otherwise, the div box is given the CSS class "post". -->

<?php if ( in_category( '3' ) ) : ?>
    <div class="post-cat-three">
<?php else : ?>
<div class=" col-lg-6">
    <div class="post  main-post ">
<?php endif; ?>


<!-- Display the Title as a link to the Post's permalink. -->

<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>


<!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->

<span class="post_user"><i class =" fa fa-user fa-fw"></i><?php the_author_posts_link(); ?>|</span> 
<span class="post_date"><i class =" fa fa-calendar fa-fw"></i><?php the_time('F J ,Y'); ?> |</span> 
<span class="post_comment"><i class =" fa fa-comment-o fa-fw"></i><?php comments_popup_link('No Coments','one comment','%comments','post-comment2', 'coments disabled'); ?></span> 
<hr>
                 

<!-- Display  the Post's thumbnail. -->

        <?php the_post_thumbnail() ?>


<!-- Display the Post's content in a div box. -->

<div class="entry">

 <!--  if function to chenge bettween excpet and content -->
<?php 
        //  <!-- the excerpt egnore the fotos and html tags -->

    the_excerpt();
    ?>
    <a href="<?php echo get_permalink(); ?>"> Read More...</a>


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
                  
             

<!-- to remove the pagination from the previous row -->
<div class="clearfix"></div>


<!-- displa the Pagination  -->

<div class="text-center">
   <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#"><?php  echo num_pag() ?></a></li>
    
  </ul>
</nav>
</div>

            <div class="col-md-12">
                <?php get_sidebar(); ?>
            </div>
        </div>



        <div class="row">
            <div class="col-md-12">
                <?php get_footer(); ?>
            </div>
        </div>
    </div>

</body>
</html>
