<?php
require('./controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == "addComment") {
            if (isset($_GET['id']) AND $_GET['id'] > 0) {
                if (!empty($_POST['author']) AND !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } 
                else {
                    throw new Exception('Erreur : tous les champs ne sont pas remplis');
                }
            } 
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }
        elseif($_GET['action'] == "display") {
            if (isset($_GET['id']) AND $_GET['id'] > 0) {
                displayComment($_GET['id']);
            }
            else {
                throw new Exception('Le commentaire est introuvable');
            }
        }
        elseif($_GET['action'] == "update") {
            
            if (isset($_GET['id']) AND $_GET['id'] > 0) {
                if (!empty($_POST['author']) AND !empty($_POST['comment'])) {
                    upComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Erreur, tous les champs ne sont pas remplis');
                }
            }
            else {
                throw new Exception('Erreur : votre commentaire est introuvable');
            }
        }
    }
    else {
        listPosts();
    }
} 
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

