<?php $title = 'Mon blog' ?>

<?php ob_start(); ?>

    <h2>Ma page home</h2>


<?php $content = ob_get_clean(); ?>

<?php require "template.php"; ?>