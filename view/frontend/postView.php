<?php $title = $post->title; ?>

<?php ob_start(); ?>

<h2><?= $post->title ?></h2>
<em>le <?= $post->creation_date ?></em>
<a href="index.php?action=listPost">Retour</a>
<div>
    <?= nl2br($post->content) ?>
</div>
<h4>Les commentaires</h4>
<?php foreach($comments as $comment): ?>

    <div class="comments">
        <div class="info"><strong><?= $comment->author ?></strong> à <?= $comment->mydate ?></div>
        <div class="content">
            <?= nl2br($comment->comment) ?>
        </div>
    </div>
<?php endforeach; ?>
<h5>Ajouter un commentaire</h5>
<form action="index.php?action=addcomment&id=<?= $post->id ?>" method="POST">
    <div>
        <label for="author">Auteur: </label>
        <input type="text" name="author" id="author">
    </div>
    <div>
        <label for="comment">Commentaire: </label><br>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
    </div>
    <div>
        <input type="submit" value="Envoyer">
    </div>
</form>


<?php $content = ob_get_clean() ?>

<?php require "template.php"  ?>