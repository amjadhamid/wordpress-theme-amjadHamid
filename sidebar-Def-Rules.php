<?php
      if(is_active_sidebar('sidebar-1')){
         dynamic_sidebar('sidebar-1');
      }
   ?>

      <div class="row">
     
   <!-- 1 widget -->
   <div class="col-md-12">
          <div class="widget panel panel-default ">
           <div class="widget-title panel-heading ">
           <?php single_cat_title()   ?>
           Statistcs
            </div>
           <div class="widget-content panel-body ">
            <ul class="list-unstyled">
               <li> 
                 <span>Comment Count</span> 
                 : <?php   amjad_cat_comment_count() ?>
               </li>  
            
               <li> 
                 <span>Post Count</span> 
                 : <?php   amjad_cat_post_count() ?>
               </li>  
            </ul>
           </div>
     </div>
 
    </div>  <!-- col -->


<!-- 1 widget -->
<div class="col-md-12">
          <div class="widget panel panel-default ">
           <div class="widget-title panel-heading ">
                Hotest Posts
            </div>
           <div class="widget-content panel-body ">
           <ul class="list-unstyled">
               <li> 
                 <?php
                   $posts_args = array (
                       'post_per_page' => 5 ,
                       ' cat '         => 1   
                   )  ; 

                    $query = new WP_Query($posts_args);

                    if  ($query->have_posts()){

                        while ($query->have_posts()){
                            $query->the_post();
                            ?>
                              <li>
                                <h5><a target="_blank" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                              </li>
                            <?php
                        }
                    }
                 ?>
               </li>  
                  <?php
                    wp_reset_postdata();
                  ?>
                
            </ul>
           </div>
     </div>
 
    </div>  <!-- col -->


<!-- 1 widget -->
<div class="col-md-12">
          <div class="widget panel panel-default ">
           <div class="widget-title panel-heading ">
           Hot Post By Comment
            </div>
           <div class="widget-content panel-body ">
           
           <ul class="list-unstyled">
               <li> 
                 <?php
                   $hotposts_args = array (
                       'post_per_page' => 1 ,
                       'orderby'       => 'comment_count',
                   )  ; 

                    $hotquery = new WP_Query($hotposts_args);

                    if  ($hotquery->have_posts()){

                        while ($hotquery->have_posts()){
                            $hotquery->the_post();
                            ?>
                              <li>
                                <h5><a target="_blank" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                             
                                <hr> This post has :
                              <span class="post_comment"><?php comments_popup_link('No Coments','one comment','%comments','post-comment2', 'coments disabled'); ?></span> 


                              </li>
                             
                            <?php
                        }
                    }
                 ?>
               </li>  
                  <?php
                    wp_reset_postdata();
                  ?>
                
           </div>
     </div>
 
    </div>  <!-- col -->

</div>  <!-- row -->
