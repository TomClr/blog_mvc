<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Modification d'un commentaire</title>
    </head>
    <body>
        <h1>Modifier un commentaire</h1>
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <form action="index.php?action=update&postId=<?= $_GET['postId'] ?>&id=<?= $_GET['id'] ?>" method="post">
            <div>
                <label for="author">Auteur</label><br>
                <input type="text" id="author" name="author">
            </div>
            <div>
                <label for="comment">Commentaire</label><br>
                <textarea name="comment" id="comment"></textarea>
            </div>
            <div>
                <input type="submit">
            </div>
            
        </form>
    </body>
</html>