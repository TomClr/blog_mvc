<?php
use \Tom\Blog\Model\Manager;
use \Tom\Blog\Model\CommentManager;
use \Tom\Blog\Model\PostManager;
use \Tom\Blog\Model\DisplayCommentManager;
use \Tom\Blog\Model\UpdateCommentManager;


//chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UpdateCommentManager.php');
require_once('model/DisplayCommentManager.php');
require_once('model/UpdateCommentManager.php');

function listPosts()
{
    $postManager = new PostManager(); // création d'un objet
    $posts = $postManager->getPosts(); // appel d'une fonction de cet objet

    require('./view/frontend/listPostView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('./view/frontend/postView.php');
}

function addComment($postId, $author, $comment) 
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } 
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function displayComment($commentId)
{
    $displayComment = new DisplayCommentManager();
    $comment = $displayComment->getComment($commentId);

    require('./view/frontend/displayCommentView.php');
}

function upComment($commentId, $author, $comment) {
    $upComment = new UpdateCommentManager();
    $newComment = $upComment->updateComment($commentId, $author, $comment);
    if ($newComment === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $_GET['postId']);
    }

    require('.view/frontend/displayCommentView.php');
}