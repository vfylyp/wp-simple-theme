<?php
/**
 * Template Name: Main page
 */
?>

<?php get_header() ?>

<?php Display::GetTemplatePart( 'page-main/intro' ) ?>
<?php Display::GetTemplatePart( 'page-main/about' ) ?>
<?php Display::GetTemplatePart( 'page-main/our-work' ) ?>
<?php Display::GetTemplatePart( 'page-main/find-your-position' ) ?>
<?php Display::GetTemplatePart( 'page-main/our-partners-and-clients' ) ?>
<?php Display::GetTemplatePart( 'page-main/news-and-media' ) ?>
<?php Display::GetTemplatePart( 'page-main/join-us' ) ?>

<?php get_footer() ?>