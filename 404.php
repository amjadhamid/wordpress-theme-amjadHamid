<!DOCTYPE html>
<!--404.php-->
<html lang="en">
<?php get_header(); ?>
<body>
<h1>Page Not Found</h1>
<img class="text-center" alt="page not fond"
     src="<?php echo get_template_directory_uri() . '/img/page.jpg' ?>"
<p>
    <strong>Did you type the URL?</strong><br/>
    You may have typed the address (URL) incorrectly. Check it to make sure you've got
    the exact right spelling, capitalization, etc.
</p>
<p>
    <strong>Did you follow a link from somewhere else at this site?</strong><br/>
    If you reached this page from another part of this site.
</p>
<p>
    <strong>Did you follow a link from another site?</strong><br/>
    Links from other sites can sometimes be outdated or misspelled.
</p>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
</body>
</html>
