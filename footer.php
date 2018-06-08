<!--footer.php-->
<?php
$tu = get_template_directory_uri();
?>

<div id="footer"  >
 <div class='footer text-center text-color'>
 <br><br>
 Copyright &copy; <?php echo date('Y') ?>  <?php bloginfo('name')?>
 </div>
 
 </div>

<?php wp_footer(); ?>

<script src="<?= $tu ?>/js/jquery.js"></script>
<script src="<?= $tu ?>/js/bootstrap.js"></script>
</body>
</html>