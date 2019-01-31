<?php
namespace Tom\Blog\Model;

require_once('model/Manager.php');

class DisplayCommentManager extends Manager
{
    public function getComment($commentId) {
        $db = $this-> dbConnect();
        $displayComment = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?');
        $displayComment->execute(array($commentId));
        $comment = $displayComment->fetch();

        return $comment;
    }
}