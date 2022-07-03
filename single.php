<?php get_header(); ?>
<?php the_content(); ?> 
<?php
/*
** function cptr()
** So, for example, if you wanted all the default options, you would just call:
** cptr();
** If you wanted to return a max of 3 relations you would call:
** cptr(false, 3);
** And if you wanted everything to be default, but display the thumb, you would call:
** cptr(null, null, null, null, true);
** docs: comes from https://wordpress.org/plugins/custom-post-types-relationships-cptr/
*/
// $book_author = cptr();
?>
<a href="<?php echo get_site_url() . sanitize_title($book_author); ?>"><? echo $book_author; ?></a>
<?php get_footer(); ?>