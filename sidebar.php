<!--sidebar.php-->

<!-- <div id="sidebar">
    <ul>
        <?php 
        // dynamic_sidebar('Sidebar');
         ?>
        <?php 
        // dynamic_sidebar('sidebar-1');
         ?>
        
    </ul>
</div> -->

<?php
if ( is_home() ) :
  get_sidebar( 'home' );
elseif ( is_404() ) :
  get_sidebar( '404' );
  elseif ( is_404() ) :
    get_sidebar( '404' );
else :
  get_sidebar();
endif;
?>