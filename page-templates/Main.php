<?php
/**
 * Template Name: Main page
 */
?>

<?php get_header() ?>

<?php Display::GetTemplatePart( 'main/intro' ) ?>
<?php Display::GetTemplatePart( 'main/about' ) ?>
<?php Display::GetTemplatePart( 'main/our-work' ) ?>
<?php Display::GetTemplatePart( 'main/find-your-position' ) ?>
<?php Display::GetTemplatePart( 'main/our-partners-and-clients' ) ?>
<?php Display::GetTemplatePart( 'main/news-and-media' ) ?>
<?php Display::GetTemplatePart( 'main/join-us' ) ?>

<?php get_footer() ?>