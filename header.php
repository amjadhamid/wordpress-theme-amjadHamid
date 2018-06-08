<!--header.php-->
<?php
$tu = get_template_directory_uri();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ($sep , $display , $seplocation) -->
    <title>
    <?php wp_title('|','true','right') ?>
    <?= get_title(); ?>
    
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    
     <!-- for navbar -->
     <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>



    <link href="<?= $tu ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?= $tu ?>/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?= $tu ?>/js/html5shiv.min.js"></script>
    <script src="<?= $tu ?>/js/respond.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>

<body>



<div class="top-bar" id="example-menu">
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <li class="menu-text">
      <a href="index.php">
      <?php bloginfo('name') ?>
         </a>
     </li>
      <li class="has-submenu is-dropdown-submenu-parent">
        <!-- <a href="#0">One</a> -->
        <?php amjad_boostrap_menu()?>

      </li>

    </ul>
<!-- <ul class="dropdown menu" data-dropdown-menu>
  <li class="is-dropdown-submenu-parent">
    <a href="#">Item 1</a>
    <ul class="menu">
      <li><a href="#">Item 1A</a></li>
      
    </ul>
  </li> -->

</ul>
  </div>
  <div class="top-bar-right">
    <ul class="menu">
      <li><input type="search" placeholder="Search"></li>
      <li><button type="button" class="button">Search</button></li>
    </ul>
  </div>
</div>

