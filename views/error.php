<?php ob_start(); ?>

<aside></aside>
<div>
    <div>
        <h1><i class="fas fa-times"></i> ERREUR</h1>
        <h4><?= $error ?></h4>
    </div>
</div>
<aside></aside>

<?php
$title = "Page d'erreur";
$content = ob_get_clean();
ob_start();
?>

<link rel="stylesheet" href="<?=URL?>styles/projet.css">
<link rel="stylesheet" href="<?=URL?>styles/header.css">
<link rel="stylesheet" href="<?=URL?>styles/anim.css">

<?php
$style = ob_get_clean();
require_once("template.php");