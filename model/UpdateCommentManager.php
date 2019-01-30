<?php
namespace Tom\Blog\Model;

require_once('model/Manager.php');

class UpdateCommentManager extends Manager
{
    public function updateComment($commentId, $author, $comment) {
        $db = $this->dbConnect();
        $updateComment = $db->prepare('UPDATE comments SET author = $author, comment = $comment, comment_date = NOW() WHERE id = ?');
        $newComment = $updateComment->execute(array($commentId));

        return $newComment;
    }
}