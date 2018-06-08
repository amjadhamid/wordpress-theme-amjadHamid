<!-- displa the Pagination  -->


   <nav  aria-label="Pagination text-center" style="text-align: center;">
    <ul class="pagination text-center">
    <li class="pagination-previous ">
     <?php

    if (get_previous_posts_link()){
    previous_posts_link('prev'); 
   }else{
     echo '<span>No prev page</span>';
    }
    ?>
    </li>
    <li class="pagination-next">
    <?php
    if (get_next_posts_link()){
   next_posts_link('next'); 
   }else{
    echo ' <span>  No next page</span>';
  }
  ?>
  
  </li>
 </ul>
</nav>