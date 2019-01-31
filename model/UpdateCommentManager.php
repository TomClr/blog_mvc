<?php
namespace Tom\Blog\Model;

require_once('model/Manager.php');

class UpdateCommentManager extends Manager
{
    public function updateComment($commentId, $author, $comment) {
        $db = $this->dbConnect();
        $updateComment = $db->prepare('UPDATE comments SET author = :new_author, comment = :new_comment WHERE id = :id_comment');
        $newComment = $updateComment->execute(array(
            'new_author' => $author,
            'new_comment' => $comment,
            'id_comment' => $commentId
        ));

        return $newComment;
    }
}