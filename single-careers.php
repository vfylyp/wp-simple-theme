


<?php get_header() ?>

<?php Display::getTemplatePart( 'page-careers/single/body-of-position' ) ?>
<?php Display::getTemplatePart( 'modals/send-cv' ) ?>
<?php Display::getTemplatePart( 'modals/message', ['message' => ContactFormFilter::getMessage() ] ) ?>
<?php get_footer() ?>